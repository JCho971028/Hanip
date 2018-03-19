<?php
   require_once('/home/hanip/public_html/Android/hanip/php/dbcon.php');
   
   $MenuID = mysqli_real_escape_string($con, $_POST["MenuID"]);

   $sql = "SELECT UserID FROM MenuScore WHERE MenuID='$MenuID'";
   
   $result = mysqli_query($con, $sql);

   $data = array();

   if($result) {
       while($row = mysqli_fetch_array($result)) {
           array_push($data, array(
            "UserID"        =>$row[0]       ));
       }

       header('Content-Type: application/json; charset=utf-8');
       $json = json_encode(array("result"=>$data));
       echo $json;
   }

   else {
       die('mysql error : '.mysqli_error($con));
   }

   mysqli_close($con);
?>
