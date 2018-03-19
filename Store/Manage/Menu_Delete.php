<?php
    require_once('/home/hanip/public_html/Android/hanip/php/dbcon.php');

    $MenuID = mysqli_real_escape_string($con, $_POST["MenuID"]);
    $StoreID = mysqli_real_escape_string($con, $_POST["StoreID"]);

    $sql = "DELETE FROM Menu WHERE MenuID='$MenuID' AND StoreID='$StoreID'";

    $result = mysqli_query($con, $sql);
    $response = array();

    if($result) {
        $response["success"] = true;
    }
    else {
        die('DELETE ERROR : '.mysqli_error($con));
    }

    echo json_encode($response);

    mysqli_close($con);        
?>
