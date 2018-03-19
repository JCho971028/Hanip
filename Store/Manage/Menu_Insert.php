<?php
    require_once('/home/hanip/public_html/Android/hanip/php/dbcon.php');

    mysqli_set_charset($con, "utf8");

    $MenuID = mysqli_real_escape_string($con, $_POST["MenuID"]);
    $StoreID = mysqli_real_escape_string($con, $_POST["StoreID"]);
    $MenuName = mysqli_real_escape_string($con, $_POST["MenuName"]);
    $MenuPrice = mysqli_real_escape_string($con, $_POST["MenuPrice"]);

    $sql = "INSERT INTO Menu VALUES (?, ?, ?, ?)";

    $statement = mysqli_prepare($con, $sql);

    mysqli_stmt_bind_param($statement, "sssi", $MenuID, $StoreID, $MenuName, $MenuPrice);

    $result = mysqli_stmt_execute($statement);

    $response = array();
    $response["success"] = false;

    if($result) {
        $response["success"] = true;
    }

    echo json_encode($response);

    mysqli_close($con);
?>
