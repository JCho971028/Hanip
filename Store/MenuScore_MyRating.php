<?php
    require_once('/home/hanip/public_html/Android/hanip/php/dbcon.php');

    mysqli_set_charset($con, "utf8");

    $UserID = mysqli_real_escape_string($con, $_POST["UserID"]);
    $MenuID = mysqli_real_escape_string($con, $_POST["MenuID"]);

    $sql = "SELECT Score FROM MenuScore WHERE UserID='$UserID' AND MenuID='$MenuID'";

    $result = mysqli_query($con, $sql);

    $data = array();

    if($result) {
        while($row = mysqli_fetch_array($result)) {
            array_push($data, array(
                "Score"     =>$row[0]   ));
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
