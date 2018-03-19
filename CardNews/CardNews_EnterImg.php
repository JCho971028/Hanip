<?php
    include('/home/hanip/public_html/Android/hanip/php/dbcon.php');

    mysqli_set_charset($con, "utf8");

    $sql = "SELECT CardNewsID, CardNo, CardAddress FROM NewsCard ORDER BY CardNewsID";

    $response = mysqli_query($con, $sql);
    $data = array();
	//echo "1";

    if($response) {
	//echo "2";
        while($row = mysqli_fetch_array($response)) {
            array_push($data, array(
                "CardNewsID"      =>$row[0],
                "CardNo"          =>$row[1],
                "CardAddress"     =>$row[2]     ));
        }
        header('Content-Type: application/json; charset=utf-8');
        $json = json_encode(array("result"=>$data));
        //echo $json;
	echo json_encode(array("result"=>$data));

    }
    else {
        die('MYSQL ERROR : '.mysqli_error($con));
    }
    mysqli_close($con);
?>
