<?php
    require_once('/home/hanip/public_html/Android/hanip/php/dbcon.php');

    mysqli_set_charset($con, "utf8");

    $StoreID = mysqli_real_escape_string($con, $_POST["StoreID"]);

    $sql = "SELECT StoreName, Latitude, Longtitude, AddressText, ThumbnailPic FROM Store WHERE StoreID='$StoreID'";

    $result = mysqli_query($con, $sql);

    $data = array();

    if($result) {
        while($row = mysqli_fetch_array($result)) {
            array_push($data, array(
                "StoreName"     =>$row[0],
                "Latitude"      =>$row[1],
                "Longtitude"    =>$row[2],
                "AddressText"   =>$row[3],
                "ThumbnailPic"  =>$row[4]       ));
        }
        header('Content-Type: application/json, charset=utf-8');
        $json = json_encode(array("result"=>$data));
        echo $json;
    }
    else {
        die('mysql error : '.mysqli_error($con));
    }

    mysqli_close($con);
?>
