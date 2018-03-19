<?php
	require_once('/home/hanip/public_html/Android/hanip/php/dbcon.php');

    mysqli_set_charset($con, "utf8");

	$DormReviewID = mysqli_real_escape_string($con, $_POST["DormReviewID"]);
	$Type = mysqli_real_escape_string($con, $_POST["Type"]);
	$UserID = mysqli_real_escape_string($con, $_POST["UserID"]);
	$DReviewDate = mysqli_real_escape_string($con, $_POST["DReviewDate"]);
	$DMention = mysqli_real_escape_string($con, $_POST["DMention"]);

	$sql = "INSERT INTO DormReview VALUES (?, ?, ?, ?, ?)";

	$statement = mysqli_prepare($con, $sql);
    if (!$statement) {
        die('mysqli error : '.mysqli_error($con));
    }

	mysqli_stmt_bind_param($statement, "sssss",
		$DormReviewID, $UserID, $DReviewDate, $DMention, $Type);
	$response = mysqli_stmt_execute($statement);

	$result = array();
	$result["success"] = false;

	if($response) {
		$result["success"] = true;
	}

    echo json_encode($result);
	
	mysqli_close($con);
?>
