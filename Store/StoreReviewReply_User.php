<?php
	include('/home/hnaip/public_html/Android/hanip/php/dbcon.php');

	$UserID = mysqli_real_escape_string($con, $_POST["UserID"]);
	$UserName = mysqli_real_escape_string($con, $_POST["UserName"]);
	$ProfileP = mysqli_real_escape_string($con, $_POST["ProfileP"]);

	$sql = "SELECT UserID, UserName, ProfileP FROM User WHERE UserID='$UserID' AND UserName='$UserName' AND ProfileP='$ProfileP';";

	$result = mysqli_query($con, $sql);

    if($result === FALSE) {
        die(mysqli_error($con));
    }

	while($row = mysqli_fetch_array($result)){
		array_push($arr, array("UserID"=>$row[0], "UserName"=>$row[1], "ProfileP"=>$row[2]));
	}
	
	echo json_encode(array("result"=>$arr));
	mysqli_close($con);
?>
