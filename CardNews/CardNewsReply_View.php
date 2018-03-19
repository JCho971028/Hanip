<?php
    require_once('/home/hanip/public_html/Android/hanip/php/dbcon.php');

    mysqli_set_charset($con, "utf8");

    $CardNewsID = mysqli_real_escape_string($con, $_POST["CardNewsID"]);

    $sql = "SELECT CardNewsReplyID, UserID, Date, Mention FROM CardNewsReply WHERE CardNewsID='$CardNewsID' ORDER BY Date ASC";

    $result = mysqli_query($con, $sql);

    if(!$result) {
        die('mysqli error : '.mysqli_error($con));
    }

    $data = array();

    while($row = mysqli_fetch_array($result)) {
        array_push($data, array(
            "CardNewsReplyID"   =>$row[0],
            "UserID"            =>$row[1],
            "Date"              =>$row[2],
            "Mention"           =>$row[3]       ));
    }
    header('Content-Type: application/json; charset=utf-8');
    $json = json_encode(array("result"=>$data));
    echo $json;

    mysqli_close($con);
?>
