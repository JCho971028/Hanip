<?php
    require_once('/home/hanip/public_html/Android/hanip/php/dbcon.php');

    mysqli_set_charset($con, "utf8");

    $UserID = mysqli_real_escape_string($con, $_POST["UserID"]);
    $MenuID = mysqli_real_escape_string($con, $_POST["MenuID"]);
    $Score = mysqli_real_escape_string($con, $_POST["Score"]);

    $sql = "UPDATE MenuScore SET Score='$Score' WHERE UserID='$UserID' AND MenuID='$MenuID'";

    $statement = mysqli_query($con, $sql);

    $response = array();
    $respnse["success"] = false;

    if($statement) {
        $response["success"] = true;
    }
    else {
        die('MYSQL ERROR : '.mysqli_error($con));
    }

    echo json_encode($response);

    mysqli_close($con);
?>
