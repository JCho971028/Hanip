<?php
	include('/home/hanip/public_html/Android/hanip/php/dbcon.php');

	$sql = "SELECT MenuID, Score FROM MenuScore";

	$result = mysqli_query($con, $sql);

    if (!$result) {
        die('MYSQL ERROR : '.mysqli_error($con));
    }

    $arr = array();

	while($row = mysqli_fetch_array($result)){
		array_push($arr, array(
            "MenuID"    =>$row[0],
            "Score"     =>$row[1]   ));
	}
	header('Content-Type: application/json; charset=utf8');
	echo json_encode(array("result"=>$arr));
	mysqli_close($con);
?>
