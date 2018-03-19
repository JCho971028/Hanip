<?php
	require_once('/home/hanip/public_html/Android/hanip/php/dbcon.php');

	$NoticeID = mysqli_real_escape_string($con, $_POST["NoticeID"]);
	$Type = mysqli_real_escape_string($con, $_POST["Type"]);
	$NoticeDate = mysqli_real_escape_string($con, $_POST["NoticeDate"]);
	$NoticeImg = mysqli_real_escape_string($con, $_POST["NoticeImg"]);
	$NoticeTitle = mysqli_real_escape_string($con, $_POST["NoticeTitle"]);
	$NoticeText = mysqli_real_escape_string($con, $_POST["NoticeText"]);
	$UserID = mysqli_real_escape_string($con, $_POST["UserID"]);

	$sql = "INSERT INTO Notice VALUES (?, ?, ?, ?, ?, ?, ?,?,?)";

	$statement = mysqli_prepare($con, $sql);
    if(!$statement) {
        die('mysqli error : '.mysqli_error($con));
    }

	$var = NULL;

	mysqli_stmt_bind_param($statement, "sssssssss",
		$NoticeID, $Type, $NoticeDate, $NoticeImg, $NoticeTitle,  $NoticeText, $UserID, $var, $var);
	$result = mysqli_stmt_execute($statement);

	$data = array();
	$data["success"] = false;

	if($result) {
		$data["success"] = true;
	}

    echo json_encode($data);
	
	mysqli_close($con);
?>
