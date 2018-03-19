<?php
    require_once('/home/hanip/public_html/Android/hanip/php/dbcon.php');

    mysqli_set_charset($con, "utf8");

    $NewsCardID = mysqli_real_escape_string($con, $_POST["CardNewsID"]);
    $CardNewsID = mysqli_real_escape_string($con, $_POST["NewsCardID"]);
    $ImgNum = mysqli_real_escape_string($con, $_POST["CardNo"]);
    $ImgAddress = mysqli_real_escape_string($con, $_POST["CardAddress"]);

    $sql = "INSERT INTO NewsCard VALUES (?, ?, ?, ?)";

    $statement = mysqli_prepare($con, $sql);
    if(!$statement) {
        die('PREPARE ERROR : '.mysqli_error($con));
    }

    mysqli_stmt_bind_param($statement, "ssis", $NewsCardID, $CardNewsID, $ImgNum, $ImgAddress);
    
    $response = mysqli_stmt_execute($statement);

    $result = array();
    $result["success"] = false;

    if($response) {
        $result["success"] = true;
    }

    echo json_encode($result);

    mysqli_close($con);
?>
