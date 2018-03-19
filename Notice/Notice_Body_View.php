<?php
	require_once('/home/hanip/public_html/Android/hanip/php/dbcon.php');

    $NoticeID = mysqli_real_escape_string($con, $_POST["NoticeID"]);

	$sql = "SELECT NoticeText, NoticeImg FROM Notice WHERE NoticeID='$NoticeID'";

	$result = mysqli_query($con, $sql);
    $data = array();

    if($result) {
	    while($row = mysqli_fetch_array($result)){
		    array_push($data, array(
                "NoticeText"    =>$row[0],
                "NoticeImg"     =>$row[1]   ));
    	}
        header('Content-Type: application/json; charset=utf-8');
        $json = json_encode(array("result"=>$data));
        echo $json;
    }
    else {
        die('MYSQL ERROR :'.mysqli_error($con));
    }

	mysqli_close($con);
?>
