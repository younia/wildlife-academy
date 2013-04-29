<?php

require_once 'functions.php';

$course_id = $_REQUEST['course_id'];

deleteCourse();

redirect("index.php");

?>