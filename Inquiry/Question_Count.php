<?php
    require_once('/home/hanip/public_html/Android/hanip/php/dbcon.php');

    $sql = "SELECT COUNT(*) AS success FROM Question";

    $result = mysqli_query($con, $sql);

    $arr = mysqli_fetch_assoc($result);
    $json = $arr["success"];

    echo $json;

    mysqli_close($con);
?>
