<?php
    require_once('/home/hanip/public_html/Android/hanip/php/dbcon.php');

    mysqli_set_charset($con, "utf8");

    $CardNewsID = mysqli_real_escape_string($con, $_POST["CardNewsID"]);
    $UserID = mysqli_real_escape_string($con, $_POST["UserID"]);

    $sql = "DELETE FROM CardNewsLike WHERE CardNewsID='$CardNewsID' AND UserID='$UserID'";

    $result = mysqli_query($con, $sql);
    if(!$result) {
        die('delete error : '.mysqli_error($con));
    }

    $response = array();
    $response["success"] = false;

    if($result) {
        $response["success"] = true;
    }

    echo json_encode($response);

    mysqli_close($con);
?>
