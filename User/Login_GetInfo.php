<?php
    require_once('/home/hanip/public_html/Android/hanip/php/dbcon.php');

    mysqli_set_charset($con, "utf8");

    $sql = "SELECT Email, UserID, UserType, UserName, ProfileP, Token FROM User";

    $result = mysqli_query($con, $sql);

    $data = array();

    if($result) {
        while($row = mysqli_fetch_array($result)) {
            array_push($data, array(
                "Email"         =>$row[0],
                "UserID"        =>$row[1],
                "UserType"      =>$row[2],
                "UserName"      =>$row[3],
                "ProfileP"      =>$row[4],
                "Token"         =>$row[5]       ));
        }
        header('Content-Type: application/json; charset=utf-8');
        $json = json_encode(array("result"=>$data));
        echo $json;
    }
    else {
        die('mysql error : '.mysqli_error($con));
    }

    mysqli_close($con);
?>
