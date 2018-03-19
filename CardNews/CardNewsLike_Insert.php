<?php
    require_once('/home/hanip/public_html/Android/hanip/php/dbcon.php');

    mysqli_set_charset($con, "utf8");

    $CardNewsID = mysqli_real_escape_string($con, $_POST["CardNewsID"]);
    $UserID = mysqli_real_escape_string($con, $_POST["UserID"]);

    $sql = "INSERT INTO CardNewsLike VALUES (?, ?)";

    $statement = mysqli_prepare($con, $sql);
    if(!$statement) {
        die('prepare error : '.mysqli_error($con));
    }

    mysqli_stmt_bind_param($statement, "ss", $CardNewsID, $UserID);

    $result = mysqli_stmt_execute($statement);
   
    $response = array();
    $response["success"] = false;
   
    if($result) {
        $response["success"] = true;
    }

    echo json_encode($response);

    mysqli_close($con);
?>
