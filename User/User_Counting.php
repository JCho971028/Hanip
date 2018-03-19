<?php
    include('/home/hanip/public_html/Android/hanip/php/dbcon.php');

    $sql = "SELECT COUNT(*) AS result FROM User;";

    $result = mysqli_query($con, $sql);

    $arr = mysqli_fetch_assoc($result);

    echo json_encode($arr['result']);

    mysqli_close($con);
?>
