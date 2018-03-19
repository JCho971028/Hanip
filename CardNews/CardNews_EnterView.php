<?php
    require_once('/home/hanip/public_html/Android/hanip/php/dbcon.php');

    mysqli_set_charset($con, "utf8");

    $sql = "SELECT * FROM CardNews ORDER BY CardNewsDate ASC";

    $result = mysqli_query($con, $sql);

    $data = array();

    if($result) {
        while($row = mysqli_fetch_array($result)) {
            array_push($data, array(
                "CardNewsID"            =>$row[0],
                "CardNewsDate"          =>$row[1],
                "Author"                =>$row[2],
                "CardNewsText"          =>$row[3],
                "CardNewsReplyCount"    =>$row[4],
                "CardNewsLikeCount"     =>$row[5],
                "Hit"                   =>$row[6]       ));
        }
    
        header('Content-Type: application/json; charset=uft-8');
        //$json = json_encode(array("result"=>$data),JSON_UNESCAPED_UNICODE);
        //echo $json;
	echo json_encode(array("result"=>$data));
    }

    else {
        die('mysql error : '.mysqli_error($con));
    }

    mysqli_close($con);
?>
