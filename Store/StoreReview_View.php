<?php
	require_once("/home/hanip/public_html/Android/hanip/php/dbcon.php");
	mysqli_set_charset($con, "utf8");

	$sql = "SELECT StoreID, StoreReviewID, UserID, Date, Mention, LikeCount, SReviewImg, ReplyCount FROM StoreReview ORDER BY Date DESC";

	$result = mysqli_query($con, $sql);

    $data = array();

    if($result){
	    while($row = mysqli_fetch_array($result)){
		    array_push($data, array(
                'StoreID'       =>$row[0],
                'StoreReviewID' =>$row[1],
                'UserID'        =>$row[2],
                'Date'          =>$row[3],
                'Mention'       =>$row[4],
                'LikeCount'     =>$row[5],
                'SReviewImg'    =>$row[6],
                'ReplyCount'    =>$row[7]   ));
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
