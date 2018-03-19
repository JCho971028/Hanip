<?php
    require_once('/home/hanip/public_html/php/dbcon.php');

    mysqli_set_charset($con, "utf8");

    $StoreID = mysqli_real_escape_string($con, $_POST["StoreID"]);

	$sql = "SELECT MenuID, MenuName, MenuPrice, MenuImg FROM Menu WHERE StoreID='$StoreID' ORDER BY MenuName ASC";

	$result = mysqli_query($con, $sql);

    $data = array();

    if($result) {
	    while($row = mysqli_fetch_array($result)){
		    array_push($data, array(
            "MenuID"        =>$row[0],
            "MenuName"      =>$row[1],
            "MenuPrice"     =>$row[2],
            "MenuImg"     =>$row[3]      ));
        }	
	    
        header('Content-Type: application/json; charset=utf-8');
        //$json = json_encode(array("result"=>$data),JSON_UNESCAPED_UNICODE);
        $json = json_encode(array("result"=>$data));
	    echo $json;	
    }
    
    else {
        die('mysql error : '.mysqli_error($con));
    }

    mysqli_close($con);
?>
