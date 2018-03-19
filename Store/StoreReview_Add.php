<?php
	require_once('/home/hanip/public_html/Android/hanip/php/dbcon.php');

    mysqli_set_charset($con, "utf8");

	$StoreReviewID = mysqli_real_escape_string($con, $_POST["StoreReviewID"]);
	$StoreID = mysqli_real_escape_string($con, $_POST["StoreID"]);
	$UserID = mysqli_real_escape_string($con, $_POST["UserID"]);
	$Date = mysqli_real_escape_string($con, $_POST["Date"]);
	$Mention = mysqli_real_escape_string($con, $_POST["Mention"]);
	$LikeCount = mysqli_real_escape_string($con, $_POST["LikeCount"]);
	$ReplyCount = mysqli_real_escape_string($con, $_POST["ReplyCount"]);
	$SReviewImg = mysqli_real_escape_string($con, $_POST["SReviewImg"]);

	$sql = "INSERT INTO StoreReview VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

	$statement = mysqli_prepare($con, $sql);
    if(!$statement) {
        die('mysqli error : '.mysqli_error($con));
    }

	mysqli_stmt_bind_param($statement, "sssssiis",
		$StoreReviewID, $StoreID, $UserID, $Date, $Mention, $LikeCount, $ReplyCount, $SReviewImg);
	mysqli_stmt_execute($statement);

	$result = array();
	$result["success"] = false;

	if($statement) {
		$result["success"] = true;
	}

    echo json_encode($result);
	
	mysqli_close($con);
?>
