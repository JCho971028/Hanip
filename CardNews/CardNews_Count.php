<?php
    include('/home/hanip/public_html/Android/hanip/php/dbcon.php');

    $sql = "SELECT COUNT(*) AS result FROM CardNews";

    $result = mysqli_query($con, $sql);
    if(!$result) {
        die('mysqli error : '.mysqli_error($con));
    }

    $arr = mysqli_fetch_assoc($result);

    echo $arr["result"];

    mysqli_close($con);
?>
