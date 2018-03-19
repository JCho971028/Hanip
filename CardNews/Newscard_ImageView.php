<?php
	require_once('/home/hanip/public_html/Android/hanip/php/dbcon.php');

	mysqli_set_charset($con, "utf8");

    $CardNewsID = mysqli_real_escape_string($con, $_POST["CardNewsID"]);

	$sql = "SELECT NewsCardID, CardNo, CardAddress FROM NewsCard WHERE CardNewsID='$CardNewsID'";

	$result = mysqli_query($con, $sql);

    $data = array();

    if($result) {
	    while($row = mysqli_fetch_array($result)){
		    array_push($data, array(
                "NewsCardID"    =>$row[0],
                "CardNo"        =>$row[1],
                "CardAddress"   =>$row[2]   ));
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
