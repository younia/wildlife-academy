<?php

require_once 'functions.php';

$quiz_id = $_REQUEST['quiz_id'];
$lesson_id = $_REQUEST['lesson_id'];
$course_id = $_REQUEST['course_id'];
$question_id = $_REQUEST['question_id'];

deleteQuestion();

redirect("edit.php?quiz_id=$quiz_id&lesson_id=$lesson_id&course_id=$course_id");

?>