<?php
    require_once('/home/hanip/public_html/Android/hanip/php/dbcon.php');

    mysqli_set_charset($con, "utf8");

    $CardNewsID = mysqli_real_escape_string($con, $_POST["CardNewsID"]);
    $UserID = mysqli_real_escape_string($con, $_POST["UserID"]);

    $sql = "SELECT EXISTS (SELECT * FROM CardNewsLike WHERE CardNewsID='$CardNewsID' AND UserID='$UserID') AS success";

    $result = mysqli_query($con, $sql);

    if($result) {
        $data = mysqli_fetch_assoc($result);

        $arr = array();

        $json = $data["success"];

        if($json == 1) {
            $arr["result"] = true;
        }
        else {
            $arr["result"] = false;
        }

        echo json_encode($arr);
    }
    else {
        die('MYSQL ERROR : '.mysqli_error($con));
    }

    mysqli_close($con);
?>
