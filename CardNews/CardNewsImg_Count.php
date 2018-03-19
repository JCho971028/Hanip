<?php
    require_once('/home/hanip/public_html/Android/hanip/php/dbcon.php');

    $sql = "SELECT COUNT(*) AS result FROM NewsCard";

    $result = mysqli_query($con, $sql);
    if(!$result) {
        die('MYSQL ERROR : '.mysqli_error($con));
    }

    $data = mysqli_fetch_assoc($result);

    echo $data["result"];

    mysqli_close($con);
?>
