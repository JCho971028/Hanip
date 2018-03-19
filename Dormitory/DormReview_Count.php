<?php
    require_once('/home/hanip/public_html/Android/hanip/php/dbcon.php');

    $sql =  "SELECT COUNT(*) AS result FROM DormReview";

    $result = mysqli_query($con, $sql);

    if($result) {
        $data = mysqli_fetch_assoc($result);
        $json = $data["result"];

        echo $json;
    }
    else {
        die('MYSQL ERROR : '.mysqli_error($con));
    }

    mysqli_close($con);
?>
