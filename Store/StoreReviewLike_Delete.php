<?php
    require_once('/home/hanip/public_html/Android/hanip/php/dbcon.php');

    $StoreReviewID = mysqli_real_escape_string($con, $_POST["StoreReviewID"]);
    $UserID = mysqli_real_escape_string($con, $_POST["UserID"]);

    $sql = "DELETE FROM StoreReviewLike WHERE StoreReviewID='$StoreReviewID' AND UserID='$UserID'";

    $result = mysqli_query($con, $sql);

    if(!$result) {
        die('MYSQL DELET ERROR : '.mysqli_error($con));
    }

    $response = array();
    $response["success"] = true;

    echo json_encode($response);

    mysqli_close($con);
?>
