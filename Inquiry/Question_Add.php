<?php
    include('/home/hanip/public_html/Android/hanip/php/dbcon.php');

    $QuestionID = mysqli_real_escape_string($con, $_POST['QuestionID']);
    $Author = mysqli_real_escape_string($con, $_POST['Author']);
    $DateTime = mysqli_real_escape_string($con, $_POST['DateTime']);
    $Title = mysqli_real_escape_string($con, $_POST['Title']);
    $Mention = mysqli_real_escape_string($con, $_POST['Mention']);
    $IsSolved = mysqli_real_escape_string($con, $_POST['IsSolved']);
$var = NULL;

    $sql = "INSERT INTO Question VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $statement = mysqli_prepare($con, $sql);
    if(!$statement) {
        die('prepare error : '.mysqli_error($con));
    }

    mysqli_stmt_bind_param($statement, "sssssisss", 
        $QuestionID, $Author, $DateTime, $Title, $Mention, $IsSolved, $var, $var, $var);

    $result = mysqli_stmt_execute($statement);
    if(!$result) {
        die('execute error : '.mysqli_error($con));
    }

    $response = array();
    $response["success"] = true;

    echo json_encode($response);

    mysqli_close($con);
?>
