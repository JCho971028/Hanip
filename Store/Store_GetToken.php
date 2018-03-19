<?php
    require_once('/home/hanip/public_html/Android/hanip/php/dbcon.php');

    mysqli_set_charset($con, "utf8");

    $StoreID = mysqli_real_escape_string($con, $_POST["StoreID"]);

    $sql = "SELECT Topic FROM Store WHERE StoreID='$StoreID'";

    $result = mysqli_query($con, $sql);
    if(!$result) {
        die('mysql error : '.mysqli_error($con));
    }

    $arr = array();

    while($row = mysqli_fetch_array($result)) {
        array_push($arr, array(
            "Topic" =>$row[0]   ));
    }
    header('Content-Type: application/json; charset=utf-8');

    echo json_encode(array("result"=>$arr));

    mysqli_close($con);
?>
