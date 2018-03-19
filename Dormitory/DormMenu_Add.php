<?php
	require_once('/home/hanip/public_html/Android/hanip/php/dbcon.php');

	$Date = mysqli_real_escape_string($con, $_POST["DateTimeType"]);
	$Type = mysqli_real_escape_string($con, $_POST["Type"]);
	$UserID = mysqli_real_escape_string($con, $_POST["UserID"]);
	$Menu = mysqli_real_escape_string($con, $_POST["Menu"]);
    $Hit = mysqli_real_escape_string($con, $_POST["Hit"]);

	$sql = "INSERT INTO DormMenu VALUES (?, ?, ?, ?, ?)";

	$statement = mysqli_prepare($con, $sql);
    if (!$statement) {
        die('MYSQL ERROR : '.mysqli_error($con));
    }

	mysqli_stmt_bind_param($statement, "ssssi",
		$Date, $Type, $UserID, $Menu, $Hit);
	$execute = mysqli_stmt_execute($statement);

	$result = array();
	$result["success"] = false;

	if($execute) {
		$result["success"] = true;
	}

    echo json_encode($result);
	
	mysqli_close($con);
?>
