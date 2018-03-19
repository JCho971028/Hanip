<?php
	require_once("/home/hanip/public_html/Android/hanip/php/dbcon.php");

    mysqli_set_charset($con, "utf8");

	$sql = "SELECT StoreID, StoreName, ThumbnailPic, Latitude, Longtitude, AddressText FROM Store";

	$result = mysqli_query($con, $sql);

    $data = array();

    if($result) {
	    while($row = mysqli_fetch_array($result)){
		    array_push($data, array(
                "StoreID"       =>$row[0],
                "StoreName"     =>$row[1],
                "ThumbnailPic"  =>$row[2],
                "Latitude"      =>$row[3],
                "Longtitude"    =>$row[4],
                "AddressText"   =>$row[5]   ));
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
