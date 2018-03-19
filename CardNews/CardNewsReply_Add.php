<?php
    include('/home/hanip/public_html/Android/hanip/php/dbcon.php');

    $CardNewsReplyID = mysqli_real_escape_string($con, $_POST['CardNewsReplyID']);
    $CardNewsID = mysqli_real_escape_string($con, $_POST['CardNewsID']);
    $UserID = mysqli_real_escape_string($con, $_POST['UserID']);
    $Date = mysqli_real_escape_string($con, $_POST['Date']);
    $Mention = mysqli_real_escape_string($con, $_POST['Mention']);

    $sql = "INSERT INTO CardNewsReply VALUES (?, ?, ?, ?, ?);";

    $statement = mysqli_prepare($con, $sql);
    if(!$statement) {
        die('prepare error : '.mysqli_error($con));
    }

    mysqli_stmt_bind_param($statement, "sssss", $CardNewsReplyID, $CardNewsID, $UserID, $Date, $Mention);

    $result = mysqli_stmt_execute($statement);
    $response = array();
    $response["success"] = false;

    if($result) {
        $response["success"] = true;
    }
    else {
        die('MYSQL ERROR : '.mysqli_error($con));
    }

    echo json_encode($response);

    mysqli_close($con);
?>
