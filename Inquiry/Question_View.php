<?php
    require_once("/home/hanip/public_html/Android/hanip/php/dbcon.php");

    mysqli_set_charset($con, "utf8");

    $ID = mysqli_real_escape_string($con, $_POST["UserID"]);

    $sql = "SELECT QuestionID, DateTime, Title, Mention, IsSolved FROM Question WHERE Author='$ID' ORDER BY DateTime ASC";

    $result = mysqli_query($con, $sql);
    if(!$result) {
        die("MYSQL ERROR : ".mysqli_error($con));
    }

    $arr = array();

    while($row = mysqli_fetch_array($result)) {
        array_push($arr, array(
            "QuestionID"    =>$row[0],
            "DateTime"      =>$row[1],
            "Title"         =>$row[2],
            "Mention"       =>$row[3],
            "IsSolved"      =>$row[4]   ));
    }
    header("Content-Type: application/json; charset=utf-8");
    $json = json_encode(array("result"=>$arr));
    echo $json;

    mysqli_close($con);
?>
