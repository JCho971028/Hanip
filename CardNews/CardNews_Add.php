<?php
    require_once('/home/hanip/public_html/Android/hanip/php/dbcon.php');

    mysqli_set_charset($con, "utf8");

    $CardNewsID = mysqli_real_escape_string($con, $_POST["CardNewsID"]);
    $CardNewsDate = mysqli_real_escape_string($con, $_POST["CardNewsDate"]);
    $Author = mysqli_real_escape_string($con, $_POST["Author"]);
    $CardNewsText = mysqli_real_escape_string($con, $_POST["CardNewsText"]);
    $CardNewsReplyCount = mysqli_real_escape_string($con, $_POST["CardNewsReplyCount"]);
    $CardNewsLikeCount = mysqli_real_escape_string($con, $_POST["CardNewsLikeCount"]);
    $Hit = mysqli_real_escape_string($con, $_POST["Hit"]);

    $sql = "INSERT INTO CardNews VALUES (?, ?, ?, ?, ?, ?, ?)";

    $statement = mysqli_prepare($con, $sql);
    if(!$statement) {
        die('prepare error : '.mysqli_error($con));
    }

    mysqli_stmt_bind_param($statement, "ssssiii",
    $CardNewsID, $CardNewsDate, $Author, $CardNewsText, $CardNewsReplyCount, $CardNewsLikeCount, $Hit);
    
    $result = mysqli_stmt_execute($statement);
    if(!$result) {
        die('execute error : '.mysqli_error($con));
    }

    $response = array();
    $response["success"] = false;

    if($result) {
        $response["success"] = true;
    }

    echo json_encode($response);

    mysqli_close($con);
?>
