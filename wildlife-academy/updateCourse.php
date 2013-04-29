<?php

require_once 'functions.php';

$course_id = $_POST['course_id'];


if( $course_id > 0 )
{
	updateCourse();
}
else
{
	$course_id = createCourse();
}

redirect("edit.php?course_id=$course_id");

?>