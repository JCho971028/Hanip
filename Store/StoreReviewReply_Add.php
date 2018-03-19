<?php
	require_once('/home/hanip/public_html/Android/hanip/php/dbcon.php');

    mysqli_set_charset($con, "utf8");

	$StoreReviewID = mysqli_real_escape_string($con, $_POST["StoreReviewID"]);
	$StoreReviewReplyID = mysqli_real_escape_string($con, $_POST["StoreReviewReplyID"]);
	$UserID = mysqli_real_escape_string($con, $_POST["UserID"]);
	$Date = mysqli_real_escape_string($con, $_POST["Date"]);
	$Mention = mysqli_real_escape_string($con, $_POST["Mention"]);

	$sql = "INSERT INTO StoreReviewReply VALUES (?, ?, ?, ?, ?)";

	$statement = mysqli_prepare($con, $sql);    
    mysqli_stmt_bind_param($statement, "sssss", $StoreReviewReplyID, $StoreReviewID, $UserID, $Date, $Mention);
	$response = mysqli_stmt_execute($statement);
    
    $result = array();
	$result["success"] = false;

    if($response) {
        $result["success"] = true;
    }

    header('Content-Type: application/json; charset=utf-8');

    echo json_encode($result);
	
	mysqli_close($con);
?>
