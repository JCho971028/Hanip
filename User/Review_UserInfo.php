<?php
	require_once('/home/hanip/public_html/Android/hanip/php/dbcon.php');
    
    mysqli_set_charset($con, "utf8");

	$sql = "SELECT UserID, UserName, ProfileP, UserType, Email FROM User";

	$result = mysqli_query($con, $sql);

    $data = array();

    if($result) {
	    while($row = mysqli_fetch_array($result)) {
		    array_push($data, array(
            "UserID"        =>$row[0],
            "UserName"      =>$row[1],
            "ProfileP"      =>$row[2],
            "UserType"      =>$row[3],
            "Email"         =>$row[4]       ));
	    }
	
        header('Content-Type: application/json; charset=utf-8');
        $json = json_encode(array("result"=>$data));
	    echo $json;	
    }

    else {
        die('mysql error : '.mysqli_error($con));
    }

	mysqli_close($con);
?>
