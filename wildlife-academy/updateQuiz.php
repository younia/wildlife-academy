<?php

require_once 'functions.php';

$quiz_id = $_POST['quiz_id'];
$quiz_name = $_POST['quiz_name'];
$lesson_id = $_POST['lesson_id'];
$course_id = $_POST['course_id'];
$question_id = $_POST['question_id'];


if( $quiz_id > 0 )
{
	updateQuiz();
}
else
{
	$quiz_id = createQuiz();
}

redirect("edit.php?quiz_id=$quiz_id&lesson_id=$lesson_id&question_id=$question_id&course_id=$course_id");

?>