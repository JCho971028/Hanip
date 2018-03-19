<?php
   include('/home/hanip/public_html/Android/hanip/php/dbcon.php');
   
   $sql = "SELECT PhoneNum FROM User WHERE PhonNum='$PhoneNum';";
   
   $result = mysqli_query($con, $sql);
   if(!$result) {
       die('mysql error : '.mysqli_error($con));
   }

   $arr = array();

   while($row = mysqli_fetch_array($result)) {
       array_push($arr, array('PhoneNum'=>$row[0]));
   }

   echo json_encode(array("result"=>$arr));

   mysqli_close($con);
?>
