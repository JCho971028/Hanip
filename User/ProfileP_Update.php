<?php
    require_once('/home/hanip/public_html/Android/hanip/php/dbcon.php');

    mysqli_set_charset($con, "utf8");

    $UserID = mysqli_real_escape_string($con, $_POST["UserID"]);
    $ProfileP = mysqli_real_escape_string($con, $_POST["ProfileP"]);

    $sql = "UPDATE User SET ProfileP='$ProfileP' WHERE UserID='$UserID'";

    $statement = mysqli_query($con, $sql);

    $response = array();
    $response["success"] = false;

    if($statement) {
        $response["success"] = true;
    }
    else {
        die('MYSQL ERROR : '.mysqli_error($con));
    }

    echo json_encode($response);

    mysqli_close($con);
?>
