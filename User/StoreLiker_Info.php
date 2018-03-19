<?php
    include('/home/hanip/public_html/Android/hanip/php/dbcon.php');

    $sql = "SELECT UserID, UserName, JoinDate, Gender, School FROM User WHERE UserID='$UserID' AND UserName='$UserName' AND JoinDate='$JoinDate' AND Gender='$Gender' AND School='$School' AND ProfileP='$ProfileP';";

    $result = mysqli_query($con, $sql);
    if(!$result) {
        die('mysql error : '.mysqli_error($con));
    }

    $arr = array();

    while($row = mysqli_fetch_array($result)) {
        array_push($arr, array('UserID'=>$row[0], 'ProfileP'=>$row[1], 'UserName'=>$row[2], 'JoinDate'=>$row[3], 'Gender'=>$row[4], 'School'=>$row[5]));
    }

    echo json_encode(array("result"=>$arr));

    mysqli_close($con);
?>
