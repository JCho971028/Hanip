<?php
    require_once('/home/hanip/public_html/Android/hanip/php/dbcon.php');

    mysqli_set_charset($con, "utf8");

    $Email = mysqli_real_escape_string($con, $_POST["Email"]);

    $sql = "SELECT UserID, UserName, UserType, ProfileP, Token FROM User WHERE Email = '$Email'";

    $result = mysqli_query($con, $sql);

    $data = array();

    if($result) {
        while($row = mysqli_fetch_array($result)) {
           array_push($data, array(
               "UserID"        =>$row[0],
               "UserName"      =>$row[1],
               "UserType"      =>$row[2],
               "ProfileP"      =>$row[3],
               "Token"         =>$row[4]       ));
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
