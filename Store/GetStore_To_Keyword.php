<?php
    require_once('/home/hanip/public_html/Android/hanip/php/dbcon.php');

    mysqli_set_charset($con, "utf8");

    $Keyword = mysqli_real_escape_string($con, $_POST["Keyword"]);

    $sql = "SELECT StoreID FROM StoreKeyword WHERE Keyword='$Keyword'";

    $result = mysqli_query($con, $sql);

    $data = array();

    if($result) {
        while($row = mysqli_fetch_array($result)) {
            array_push($data, array(
            "StoreID"   =>$row[0]       ));
        }

        header('Content-Type: application/json; charset=utf-8');
        $json = json_encode(array("result"=>$data));
        echo $json;
    }
    else{
        die('mysql error : '.mysqli_error($con));
    }

    mysqli_close($con);
?>
