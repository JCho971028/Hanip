<?php
    require_once('/home/hanip/public_html/Android/hanip/php/dbcon.php');

    mysqli_set_charset($con, "utf8");

    $MasterID = mysqli_real_escape_string($con, $_POST["StoreID"]);

    $sql = "SELECT StoreName, AddressText, ToiletType, 3DPic, StorePhoneNum, BasicFoodP, NoticeText, MapPic, ThumbnailPic FROM Store WHERE StoreID='$MasterID'";

    $response = mysqli_query($con, $sql);
    $data = array();

    if($response) {
        while($row = mysqli_fetch_array($response)) {
            array_push($data, array(
                "StoreName"         =>$row[0],
                "AddressText"       =>$row[1],
                "ToiletType"        =>$row[2],
                "3DPic"             =>$row[3],
                "StorePhoneNum"     =>$row[4],
                "BasicFoodP"        =>$row[5],
                "NoticeText"        =>$row[6],
                "MapPic"            =>$row[7],
                "ThumbnailPic"      =>$row[8]       ));
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
