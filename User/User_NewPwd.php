<?php
    include('/home/hanip/public_html/Android/hanip/php/dbcon.php');

    mysqli_set_charset($con, "utf8");

    $Password = mysqli_real_escape_string($con, $_POST["Password"]);
    $ID = mysqli_real_escape_string($con, $_POST["UserID"]);

    $sql = "UPDATE User SET Password='$Password' WHERE UserID='$ID'";

    $response = mysqli_query($con, $sql);

     $data = array();
     $data["success"] = false;

     if($response) {
         $data["success"] = true;
     }
     else {
         die('MYSQL ERROR : '.mysqli_error($con));
     }

     echo json_encode($data);

     mysqli_close($con);
?>
