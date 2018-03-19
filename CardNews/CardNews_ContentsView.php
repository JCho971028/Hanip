<?php
	require_once('/home/hanip/public_html/Android/hanip/php/dbcon.php');

    mysqli_set_charset($con, "utf8");

    $CardNewsID = mysqli_real_escape_string($con, $_POST["CardNewsID"]);

	$sql = "SELECT Author, CardNewsDate, CardNewsText FROM CardNews WHERE CardNewsID='$CardNewsID' ORDER BY CardNewsDate ASC";

	$result = mysqli_query($con, $sql);

    $data = array();

    if($result) {
        while($row = mysqli_fetch_array($result)){
		    array_push($data, array(
                "Author"        =>$row[0],
                "CardNewsDate"  =>$row[1],
                "CardNewsText"  =>$row[2]       ));
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
