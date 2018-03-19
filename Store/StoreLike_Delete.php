<?php
    include('/home/hanip/public_html/Android/hanip/php/dbcon.php');

    $StoreID = mysqli_real_escape_string($con, $_POST['StoreID']);
    $UserID = mysqli_real_escape_string($con, $_POST['UserID']);

    $sql = "DELETE FROM StoreLike WHERE StoreID='$StoreID' AND UserID='$UserID';";

    $result = mysqli_query($con, $sql);
    if(!$result) {
        die('delete error : '.mysqli_error($con));
    }

    $response = array();
    $response["success"] = true;

    echo json_encode($response);

    mysqli_close($con);
?>
