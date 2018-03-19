<?php
    require_once('/home/hanip/public_html/Android/hanip/php/dbcon.php');

    mysqli_set_charset($con, "utf8");

    $StoreReviewID = mysqli_real_escape_string($con, $_POST["StoreReviewID"]);

    $sql = "SELECT LikeCount FROM StoreReview WHERE StoreReviewID='$StoreReviewID'";

    $result = mysqli_query($con, $sql);

    $data = array();

    if($result) {
        while($row = mysqli_fetch_array($result)) {
            array_push($data, array(
                "LikeCount"     =>$row[0]   ));
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
