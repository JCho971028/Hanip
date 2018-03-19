<?php
	include('/home/hanip/public_html/Android/hanip/php/dbcon.php');
   
    header('Content-type=application/json; charset=utf-8');
	
	$UserID = mysqli_real_escape_string($con, $_POST["UserID"]);
	$UserName = mysqli_real_escape_string($con, $_POST["UserName"]);
	$Password = mysqli_real_escape_string($con, $_POST["Password"]);
	$Email = mysqli_real_escape_string($con, $_POST["Email"]);
	$UserType = mysqli_real_escape_string($con, $_POST["UserType"]);
	$JoinDate = mysqli_real_escape_string($con, $_POST["JoinDate"]);
	$PhoneNum = mysqli_real_escape_string($con, $_POST["PhoneNum"]);
	$ProfileP = mysqli_real_escape_string($con, $_POST["ProfileP"]);
	$Gender = mysqli_real_escape_string($con, $_POST["Gender"]);
	$School = mysqli_real_escape_string($con, $_POST["School"]);
	$Token = mysqli_real_escape_string($con, $_POST["Token"]);
	$isLogined = mysqli_real_escape_string($con, $_POST["isLogined"]);
	
	$sql = "INSERT INTO User VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
	
	$statement = mysqli_prepare($con, $sql);

    mysqli_stmt_bind_param($statement, "ssisssssssis",
    $UserID, $UserName, $UserType, $JoinDate, $PhoneNum, $ProfileP,
    $Gender, $School, $Token, $Password, $isLogined, $Email);
    
    $result = mysqli_stmt_execute($statement);

    $response = array();
    $response["success"] = false;

    if ($result) {
        $response["success"] = true;
    }
    	
	echo json_encode($response);
?>
