<?php
	include('/home/hanip/public_html/Android/hanip/php/dbcon.php');

	$UserName = mysqli_real_escape_string($con, $_POST["UserName"]);
	
	$statement = mysqli_prepare($con, "SELECT UserName FROM User WHERE UserName = ?");
    if (!$statement) {
        die('mysqli error : '.mysqli_error($con));
    }

	mysqli_stmt_bind_param($statement, "s", $UserName);
	if (!mysqli_stmt_execute($statement)) {
        die ('stmt error : '.mysqli_stmt_error($con));
    }

	mysqli_stmt_store_result($statement);
	mysqli_stmt_bind_result($statement, $UserName);
	
	$response = array();
	$response["success"] = true;
	
	while(mysqli_stmt_fetch($statement)){
		$response["success"] = false;
		$response["UserName"] = $UserName;
	}
	
	echo json_encode($response);
?>
