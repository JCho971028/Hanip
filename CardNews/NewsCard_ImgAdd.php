<?php
    include('/home/hanip/public_html/Android/hanip/php/dbcon.php');
    
    $NewsCardID = mysqli_real_escape_string($con, $_POST['NewsCardID']);
    $CardNewsID = mysqli_real_escape_string($con, $_POST['CardNewsID']);
    $CardNo = mysqli_real_escape_string($con, $_POST['CardNo']);
    $CardAddress = mysqli_real_escape_string($con, $_POST['CardAddress']);
    
    $sql = "INSERT INTO NewsCard VALUES (?, ?, ?, ?)";
    
    $statement = mysqli_prepare($con, $sql);
    if(!$statement) {
        die('prepare error : '.mysqli_error($con));
    }

    mysqli_stmt_bind_param($statement, "ssis",
        $NewsCardID, $CardNews, $CardNo, $CardAddress);

    $result = mysqli_stmt_execute($statement);
    if(!$result) {
        die('execute error : '.mysqli_error($con));
    }

    $response = array();
    $response["success"] = false;

    while(mysqli_stmt_fetch($statement)) {
        $response["success"] = true;
    }

    echo json_encode($response);

    mysqli_close($con);
?>
