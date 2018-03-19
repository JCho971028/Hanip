<?php
    include('/home/hanip/public_html/Android/hanip/php/dbcon.php');

    $sql = "SELECT COUNT(*) AS result FROM Notice";

    $result = mysqli_query($con, $sql);

    $arr = mysqli_fetch_assoc($result);

    echo $arr['result'];

    mysqli_close($con);
?>
