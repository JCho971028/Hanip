<?php
    require_once('/home/hanip/public_html/Android/hanip/php/dbcon.php');

    mysqli_set_charset($con, "utf8");

    $StoreName = mysqli_real_escape_string($con, $_POST["StoreName"]);
    $ToiletType = mysqli_real_escape_string($con, $_POST["ToiletType"]);
    $ThumbnailPic = mysqli_real_escape_string($con, $_POST["ThumbnailPic"]);
    $InfoPic = mysqli_real_escape_string($con, $_POST["3DPic"]);
    $StorePhoneNum = mysqli_real_escape_string($con, $_POST["StorePhoneNum"]);
    $BasicFoodP = mysqli_real_escape_string($con, $_POST["BasicFoodP"]);
    $AddressText = mysqli_real_escape_string($con, $_POST["AddressText"]);
    $NoticeText = mysqli_real_escape_string($con, $_POST["NoticeText"]);
    $MapPic = mysqli_real_escape_string($con, $_POST["MapPic"]);
    $StoreID = mysqli_real_escape_string($con, $_POST["StoreID"]);

    $sql = "UPDATE Store SET StoreName='$StoreName', ToiletType='$ToiletType', ThumbnailPic='$ThumbnailPic', 3DPic='$InfoPic', StorePhoneNum='$StorePhoneNum', BasicFoodP='$BasicFoodP', AddressText='$AddressText', NoticeText='$NoticeText', MapPic='$MapPic' WHERE StoreID='$StoreID'";
    
    $response = mysqli_query($con, $sql);
    
    $result = array();
    $result["success"] = false;

    if($response) {
        $result["success"] = true;
    }
    else {
        die('MYSQL ERROR : '.mysqli_error($con));
    }

    echo json_encode($result);

    mysqli_close($con);
?>
