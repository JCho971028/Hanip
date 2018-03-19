<?php
    require_once('/home/hanip/public_html/Android/hanip/php/dbcon.php');

    mysqli_set_charset($con, "utf8");

    $StoreID = mysqli_real_escape_string($con, $_POST["StoreID"]);
    $UserID = mysqli_real_escape_string($con, $_POST["UserID"]);
    $Date = mysqli_real_escape_String($con, $_POST["Date"]);

    $sql = "INSERT INTO StoreLike VALUES (?, ?, ?)";

    $statement = mysqli_prepare($con, $sql);
    if(!$statement) {
        die('MYSQL ERROR : '.mysqli_error($con));
    }

    mysqli_stmt_bind_param($statement, "sss", $StoreID, $UserID, $Date);

    $response = mysqli_stmt_execute($statement);

    $result = array();
    $result["success"] = false;

    if($response) {
        $result["success"] = true;
    }

    echo json_encode($result);
?>
