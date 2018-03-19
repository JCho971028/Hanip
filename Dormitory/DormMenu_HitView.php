<?php
    require_once('/home/hanip/public_html/Android/hanip/php/dbcon.php');

    mysqli_set_charset($con, "utf8");

    $ID = mysqli_real_escape_string($con, $_POST["DateTimeType"]);
    $data = array();
    $data["success"] = false;

    if(!empty($ID) && empty($_COOKIE["DormMenu_".$ID])) {
        $sql = "UPDATE DormMenu SET Hit=Hit+1 WHERE DateTimeType='$ID'";
        $response = mysqli_query($con, $sql);
        
        if($response) {
            setcookie("DormMenu_".$ID, TRUE, time()+(60*60*24), '/');
            $data["success"] = true;
        }
        else {
            die('MYSQL ERROR : '.mysqli_error($con));
        }
    }

    echo json_encode($data);
   
    mysqli_close($con);
?>
