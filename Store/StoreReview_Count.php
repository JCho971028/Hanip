<?php
    include('/home/hanip/public_html/Android/hanip/php/dbcon.php');

    $sql = "SELECT COUNT(*) AS result FROM StoreReview;";

    $result = mysqli_query($con, $sql);

    if($result) {
        $arr = mysqli_fetch_assoc($result);

        echo $arr["result"];
    }

    else{
        die('mysql error : '.mysqli_error($con));
    }

    mysqli_close($con);
?>
