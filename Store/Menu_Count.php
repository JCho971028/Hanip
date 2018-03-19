<?php
    require_once('/home/hanip/public_html/Android/hanip/php/dbcon.php');

    mysqli_set_charset($con, "utf8");

    $StoreID = mysqli_real_escape_string($con, $_POST["StoreID"]);

    $sql = "SELECT COUNT(*) AS result FROM Menu WHERE StoreID='$StoreID'";

    $result = mysqli_query($con, $sql);

    if($result) {
        $data = mysqli_fetch_assoc($result);     
        
        $json = $data["result"];
        echo $json;
    }

    else {
        die('mysql error : '.mysqli_error($con));
    }

    mysqli_close($con);
?>
