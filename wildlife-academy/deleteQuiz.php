<?php

require_once 'functions.php';
$lesson_id = $_REQUEST['lesson_id'];
$course_id = $_REQUEST['course_id'];
$quiz_id = $_REQUEST['quiz_id'];

deleteQuiz( $_REQUEST['quiz_id'] );

redirect("lesson.php?lesson_id=$lesson_id&course_id=$course_id");

?>