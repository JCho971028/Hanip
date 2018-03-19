<?php
    require_once('/home/hanip/public_html/Android/hanip/php/dbcon.php');

    mysqli_set_charset($con, "utf8");

    $Token = mysqli_real_escape_string($con, $_POST["Token"]);
    $UserID = mysqli_real_escape_string($con, $_POST["UserID"]);

    $sql = "UPDATE User SET Token='$Token' WHERE UserID='$UserID'";

    $response = mysqli_query($con, $sql);
    
    if($response) {
        $data = array();
        $data["success"] = true;
    }
    else {
        die('MYSQL ERROR : '.mysqli_error($con));
    }
    
    echo json_encode($data);

    mysqli_close($con);
?>
