<?php
    require_once('/home/hanip/public_html/Android/hanip/php/dbcon.php');

    mysqli_set_charset($con, "utf8");

    $sql = "SELECT Keyword FROM KeyWord";

    $response = mysqli_query($con, $sql);
    $data = array();

    if($response) {
        while($row = mysqli_fetch_array($response)) {
            array_push($data, array(
                "Keyword"   =>$row[0]       ));
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
