<?php
    require_once('/home/hanip/public_html/Android/hanip/php/dbcon.php');

    mysqli_set_charset($con, "utf8");

    $CardNewsID = mysqli_real_escape_string($con, $_POST["CardNewsID"]);

    $sql = "SELECT COUNT(*) AS result FROM CardNewsReply WHERE CardNewsID='$CardNewsID'";

    $result = mysqli_query($con, $sql);

    if($result) {
        $arr = mysqli_fetch_assoc($result);

        echo $arr["result"];
    }
    else {
        die('MYSQL ERROR : '.mysqli_error($con));
    }

    mysqli_close($con);
?>
