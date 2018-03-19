<?php
	include('/home/hanip/public_html/Android/hanip/php/dbcon.php');
	
	$PhoneNum = mysqli_real_escape_string($con, $_POST["PhoneNum"]);
	
	$statement = mysqli_prepare($con, "SELECT PhoneNum FROM User WHERE PhoneNum = ?");
	if (!$statement) {
        die('mysqli error : '.mysqli_error($con));
    }
    
    mysqli_stmt_bind_param($statement, "s", $PhoneNum);
	if (!mysqli_stmt_execute($statement)) {
        die ('stmt error : '.mysqli_stmt_error($con));
    }

	mysqli_stmt_store_result($statement);
	mysqli_stmt_bind_result($statement, $PhoneNum);

	$response = array();
	$response["success"] = true;
	
	while(mysqli_stmt_fetch($statement)){
		$response["success"] = false;
		$response["UserPhNum"] = $UserPhNum;
	}
	
	echo json_encode($response);

    mysqli_close($con);
?>
