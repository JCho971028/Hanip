<?php
    require_once('/home/hanip/public_html/Android/hanip/php/dbcon.php');

    mysqli_set_charset($con, "utf8");
    
    $MenuID = mysqli_real_escape_string($con, $_POST["MenuID"]);

    $sql = "SELECT COUNT(*) AS success FROM MenuScore WHERE MenuID='$MenuID'";

    $result = mysqli_query($con, $sql);

    if($result) {
        $data = mysqli_fetch_assoc($result);
        $json = $data["success"];
        $arr = array();
        $arr["result"] = $json;

        echo json_encode($arr);
    }

    else {
        die('mysql error : '.mysqli_error($con));
    }

    mysqli_close($con);
?>
