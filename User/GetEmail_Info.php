<?php
    require_once("/home/hanip/public_html/Android/hanip/php/dbcon.php");

    mysqli_set_charset($con, "utf8");

    $PhoneNum = mysqli_real_escape_string($con, $_POST["PhoneNum"]);

    $sql = "SELECT Email, UserID FROM User WHERE PhoneNum='$PhoneNum'";

    $response = mysqli_query($con, $sql);
    $data = array();

    if($response) {
        while($row = mysqli_fetch_array($response)) {
            array_push($data, array(
                "Email"     =>$row[0],
                "UserID"    =>$row[1]   ));
        }
        header('Content-Type: application/json; charset=utf-8');
        $json = json_encode(array("result"=>$data));
        echo $json;
    }
    else {
        die("MYSQL ERROR : ".mysqli_error($con));
    }
    mysqli_close($con);
?>
