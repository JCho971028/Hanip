<?php
	include('/home/hanip/public_html/Android/hanip/php/dbcon.php');

	$Email = mysqli_real_escape_string($con, $_POST['Email']);
	$Password = mysqli_real_escape_string($con, $_POST['Password']);
	
	$sql = "SELECT * FROM User WHERE Email = ?";

	$statement = mysqli_prepare($con, $sql);

    if($statement === FALSE) {
       die('mysqli error : '.mysqli_error($con));
    }

    mysqli_stmt_bind_param($statement, "s", $Email);
	mysqli_stmt_execute($statement);

    mysqli_stmt_store_result($statement);
    mysqli_stmt_bind_result($statement, $UserID, $UserName, $UserType, $JoinDate, $PhoneNum, $ProfileP, $Gender, $School, $Token, $Password, $isLogined, $Email);

    $response = array();
    $response["success"] = false;

    while(mysqli_stmt_fetch($statement)) {
        
            $response["success"] = true;
            $response["Email"] = $Email;
        
    }

    echo json_encode($response);

	mysqli_close($con);
?>
