<?php

require_once 'functions.php';

$lesson_id = $_REQUEST['lesson_id'];
$course_id = $_REQUEST['course_id'];

deleteLesson();

redirect("lessons.php?course_id=$course_id");

?>