<?php
	require_once('/home/hanip/public_html/Android/hanip/php/dbcon.php');

	$sql = "SELECT NoticeID, Type, NoticeTitle, NoticeDate FROM Notice";

	$result = mysqli_query($con, $sql);

    $data = array();

    if($result) {
	    while($row = mysqli_fetch_array($result)) {
		    array_push($data, array(
                "NoticeID"      =>$row[0],
                "Type"          =>$row[1],
                "NoticeTitle"   =>$row[2],
                "NoticeDate"    =>$row[3]   ));
	    }
        header('Content-Type: application/json; charset=utf-8');
        $json = json_encode(array("result"=>$data));
        echo $json;
    }
    else {
        die('MYSQL ERROR : '.mysqli_error($con));
    }
	
	mysqli_close($con);
?>
