<?php
	require_once('/home/hanip/public_html/Android/hanip/php/dbcon.php');

	$sql = "SELECT DormReviewID, UserID, DReviewDate, DMention, Type FROM DormReview ORDER BY DReviewDate ASC";

	$result = mysqli_query($con, $sql);
	$data = array();

    if($result) {
        while($row = mysqli_fetch_array($result)) {
            array_push($data, array(
                "DormReviewID"  =>$row[0],
                "UserID"        =>$row[1],
                "DReviewDate"   =>$row[2],
                "DMention"      =>$row[3],
                "Type"          =>$row[4]       ));
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
