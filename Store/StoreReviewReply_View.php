<?php
	require_once('/home/hanip/public_html/Android/hanip/php/dbcon.php');

    mysqli_set_charset($con, "utf8");

	$sql = "SELECT StoreReviewID, StoreReviewReplyID, UserID, Date, Mention FROM StoreReviewReply ORDER BY Date ASC";

	$result = mysqli_query($con, $sql);

    $data = array();

    if ($result) {  
	    while($row = mysqli_fetch_array($result)) {
		    array_push($data, array(
            "StoreReviewID"         =>$row[0],
            "StoreReviewReplyID"    =>$row[1],
            "UserID"                =>$row[2],
            "Date"                  =>$row[3],
            "Mention"               =>$row[4]       ));
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
