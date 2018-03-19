<?php
    require_once('/home/hanip/public_html/Android/hanip/php/dbcon.php');

    $StoreID = mysqli_real_escape_string($con, $_POST["StoreID"]);
    $UserID = mysqli_real_escape_string($con, $_POST["UserID"]);

    $sql = "DELETE FROM StoreLike WHERE StoreID='$StoreID' AND UserID='$UserID'";

    $response = mysqli_query($con, $sql);
    $data = array();
    $data["success"] = false;

    if($response) {
        $data["success"] = true;
    }

    else {
        die('MYSQL ERROR : '.mysqli_error($con));
    }

    echo json_encode($data);

    mysqli_close($con);
?>
