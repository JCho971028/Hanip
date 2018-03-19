<?php
    include('/home/hanip/public_html/Android/hanip/php/dbcon.php');

    $sql = "SELECT StoreID, StoreName, StoreReviewCount, StoreImg FROM Store WHERE StoreID='$StoreID' AND StoreName='$StoreName' AND StoreReviewCount='$StoreReviewCount' AND StoreImg='$StoreImg';";

    $result = mysqli_query($con, $sql);
    if(!$result) {
        die('mysql error : '.mysqli_error($con));
    }

    $arr = array();

    while($row = mysqli_fetch_array($result)) {
        array_push($arr, array('StoreID'=>$row[0], 'StoreName'=>$row[1], 'StoreReivewCount'=>$row[2], 'StoreImg'=>$row[3]));
    }

    echo json_encode(array("result"=>$arr));

    mysqli_close($con);
?>
