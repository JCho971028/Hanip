<?php
    require_once('/home/hanip/public_html/Android/hanip/php/dbcon.php');

    mysqli_set_charset($con, "utf8");

    $ID = mysqli_real_escape_string($con, $_POST["CardNewsID"]);
    $data = array();
    $data["success"] = false;

    if(!empty($ID) && empty($_COOKIE["CardNews_".$ID])) {
        $sql = "UPDATE CardNews SET Hit=Hit+1 WHERE CardNewsID='$ID'";
        $response = mysqli_query($con, $sql);

        if($response) {
            setcookie("CardNews_".$ID, TRUE, time(), '/');
            $data["success"] = true;
        }
        else {
            die('MYSQL ERROR : '.mysqli_error($con));
        }
    }
    
    echo json_encode($data);

    mysqli_close($con);
?>
