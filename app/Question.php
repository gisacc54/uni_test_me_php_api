<?php
class Question{
	public static function getQuestionAnswers($questionID,$conn)
	{
		$sql = "SELECT * FROM answers where 	question_id='$questionID'";
		$answers = array();
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
		    while ($row = mysqli_fetch_array($result)) {

		        $answer['id'] = $row['id'];
		        $answer['answer'] = $row['answer'];
						$answer['isAnswer'] = $row['isAnswer'];
		        $answer['question_id'] = $row['question_id'];
		        array_push($answers, $answer);
		    }
		    return $answers;
		}
		return $answers;
	}
}
