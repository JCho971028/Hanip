<?php
    require_once('/home/hanip/public_html/Android/hanip/php/dbcon.php');

    $MenuID = mysqli_real_escape_string($con, $_POST["MenuID"]);

    $sql = "DELETE FROM MenuScore WHERE MenuID='$MenuID'";

    $result = mysqli_query($con, $sql);

    if($result) {
        $response = array();
        $response["success"] = true;
    }
    else {
        die('DELETE ERROR : '.mysqli_close($con));
    }

    echo json_encode($response);

    mysqli_close($con);
?>
