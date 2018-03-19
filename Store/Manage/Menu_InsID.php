<?php
    require_once('/home/hanip/public_html/Android/hanip/php/dbcon.php');

    $StoreID = mysqli_real_escape_string($con, $_POST["StoreID"]);

    $sql = "SELECT COUNT(*) AS result FROM Menu WHERE StoreID='$StoreID'";

    $response = mysqli_query($con, $sql);

    if($response) {
        $data = mysqli_fetch_assoc($response);
        echo $data["result"];
    }
    else {
        die('MYSQL ERROR : '.mysqli_error($con));
    }

    mysqli_close($con);
?>
