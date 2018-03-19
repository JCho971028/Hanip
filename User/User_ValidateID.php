<?php
	
	include('/home/hanip/public_html/Android/hanip/php/dbcon.php');
	$Email = mysqli_real_escape_string($con, $_POST["Email"]);
	
	$statement = mysqli_prepare($con, "SELECT Email FROM User WHERE Email = ?");
	if (!$statement) {
        die('mysqli error : '.mysqli_error($con));
    }
    mysqli_stmt_bind_param($statement, "s", $Email);
	if (!mysqli_stmt_execute($statement)) {
        die ('stmt error : '.mysqli_stmt_error($con));
    }
	mysqli_stmt_store_result($statement);
	mysqli_stmt_bind_result($statement, $Email);
	
	$response = array();
	$response["success"] = true;
	
	while(mysqli_stmt_fetch($statement)){
		$response["success"] = false;
		$response["Email"] = $Email;
	}
	
	echo json_encode($response);
?>
