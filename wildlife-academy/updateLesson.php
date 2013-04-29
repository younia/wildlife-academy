<?php

require_once 'functions.php';


$lesson_id = $_POST['lesson_id'];
$course_id = $_POST['course_id'];


if( $lesson_id > 0 )
{
	updateLesson();
}
else
{
	$lesson_id = createLesson();
}

redirect("edit.php?lesson_id=$lesson_id&course_id=$course_id");

?>