<?php
    require_once('/home/hanip/public_html/Android/hanip/php/dbcon.php');

    mysqli_set_charset($con, "utf8");

    $sql = "SELECT UserID, UserName, Gender, ProfileP, School FROM User";

    $result = mysqli_query($con, $sql);

    $data = array();

    if($result) {
        while($row = mysqli_fetch_array($result)) {
            array_push($data, array(
                "UserID"        =>$row[0],
                "UserName"      =>$row[1],
                "Gender"        =>$row[2],
                "ProfileP"      =>$row[3],
                "School"        =>$row[4]   ));
        }
        header('Content-Type: application/json; charset=utf-8');
        $json = json_encode(array("result"=>$data));
        echo $json;
    }
    else {
        die('MYSQL ERROR : '.mysqli_error($con));
    }
    mysqli_close($con);
?>
