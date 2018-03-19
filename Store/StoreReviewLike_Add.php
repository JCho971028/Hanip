<?php
    require_once('/home/hanip/public_html/Android/hanip/php/dbcon.php');

    mysqli_set_charset($con, "utf8");

    $StoreReviewID = mysqli_real_escape_string($con, $_POST["StoreReviewID"]);
    $UserID = mysqli_real_escape_string($con, $_POST["UserID"]);
$var=NULL;
    $sql = "INSERT INTO StoreReviewLike VALUES (?, ?,?,?)";

    $statement = mysqli_prepare($con, $sql);

    mysqli_stmt_bind_param($statement, "ssss", $StoreReviewID, $UserID,$var,$var);
    
    $result = mysqli_stmt_execute($statement);

    $response = array();
    $response["success"] = false;

    if($result) {
        $response["success"] = true;
    }

    echo json_encode($response);

    mysqli_close($con);
?>
