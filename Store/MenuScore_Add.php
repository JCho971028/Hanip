<?php
     include('/home/hanip/public_html/Android/hanip/php/dbcon.php');

    $UserID = mysqli_real_escape_string($con, $_POST['UserID']);
    $MenuID = mysqli_real_escape_string($con, $_POST['MenuID']);
    $Score = mysqli_real_escape_string($con, $_POST['Score']);

    $sql = "INSERT INTO MenuScore VALUES (?, ?, ?);";

    $statement = mysqli_prepare($con, $sql);
    if(!$statement) {
        die('prepare error : '.mysqli_error($con));
    }

    mysqli_stmt_bind_param($statement, "ssd", $UserID, $MenuID, $Score);

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
