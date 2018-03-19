<?php
    require_once("/home/hanip/public_html/Android/hanip/php/dbcon.php");

    mysqli_set_charset($con, "utf8");

    $sql = "SELECT StoreID, StoreName, Latitude, Longtitude, ToiletType, ThumbnailPic, LeftPush, LikeCount, CloseTime, OpenTime, MasterID, 3DPic, StorePhoneNum, BasicFoodP, Topic, AddressText, NoticeText, MapPic FROM Store";

    $result = mysqli_query($con, $sql);

    $data = array();

    if($result) {
        while($row = mysqli_fetch_array($result)) {
            array_push($data, array(
                "StoreID"               =>$row[0],
                "StoreName"             =>$row[1],
                "Latitude"              =>$row[2],
                "Longtitude"            =>$row[3],
                "ToiletType"            =>$row[4],
                "ThumbnailPic"          =>$row[5],
                "LeftPush"              =>$row[6],
                "LikeCount"             =>$row[7],
                "CloseTime"             =>$row[8],
                "OpenTime"              =>$row[9],
                "MasterID"              =>$row[10],
                "3DPic"                 =>$row[11],
                "StorePhoneNum"         =>$row[12],
                "BasicFoodP"            =>$row[13],
                "Topic"                 =>$row[14],
                "AddressText"           =>$row[15],
                "NoticeText"            =>$row[16],
                "MapPic"                =>$row[17]      ));
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
