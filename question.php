<?php
include_once 'db/db_connection.php';
include_once 'app/Question.php';
$diseaseId = $_GET['diseaseId'];
$sql = "SELECT * FROM questions where 	disease_id='$diseaseId'";
$questions = array();
$result = mysqli_query($conn, $sql);
header('Content-type: text/javascript');
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {

        $question['id'] = $row['id'];
        $question['question'] = $row['question'];
        $question['disease_id'] = $row['disease_id'];
        $question['answers'] = Question::getQuestionAnswers($row['id'],$conn);
        array_push($questions, $question);
    }
    echo json_encode(['success' => true, 'questions' => $questions]);
} else {
    echo json_encode(['success' => true, 'questions' => $questions]);
}
