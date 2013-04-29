<?php

require_once 'functions.php';

// Find a lesson in the database from the id in the URL
$lesson = getLesson( $_GET['lesson_id'] );
$lesson_id = $_GET['lesson_id'];


?><!DOCTYPE html>
<html>
<head>
	<title>Wildlife Academy</title>
	<link rel="stylesheet" href="style.css" />
</head>
<body>

	<div class="list">
		<h2><a title="Go Back" href="lessons.php?course_id=<?php echo $lesson['course_id']; ?>"><img src="images/back.png"/></a>&nbsp;&nbsp;
		<?php echo $lesson['lesson_name']; ?> Text</h2>
		<p><?php echo $lesson['lesson_description']; ?></p>
		<p><?php echo $lesson['lesson_content']; ?>
		<a href="edit.php?lesson_id=<?php echo $lesson_id; ?>&course_id=<?php echo $lesson['course_id']; ?>"><img src="images/edit.png" title="Edit" /></a>		
		</p>
	</div>
	
	<div class="list">
	
		<h2>Quiz</h2>
		<ul>
			<?php
			
			$quizes = getQuizes($_GET['lesson_id']);
			
			while( $quiz = mysql_fetch_array( $quizes ) ):
			
			?>
			<li>
				<a href="quiz.php?quiz_id=<?php echo $quiz['id']; ?>&lesson_id=<?php echo $lesson_id; ?>&course_id=<?php echo $lesson['course_id']; ?>"><?php echo $quiz['quiz_name']; ?></a>
				<a href="edit.php?quiz_id=<?php echo $quiz['id']; ?>&lesson_id=<?php echo $lesson_id; ?>&course_id=<?php echo $lesson['course_id']; ?>"><img src="images/edit.png" title="Edit" /></a>
				<a href="deleteQuiz.php?quiz_id=<?php echo $quiz['id']; ?>&lesson_id=<?php echo $lesson_id; ?>&course_id=<?php echo $lesson['course_id']; ?>"><img src="images/cancel.png" title="Remove" /></a>
			</li>
			<?php endwhile; ?>
			<li><a href="edit.php?lesson_id=<?php echo $lesson_id; ?>&course_id=<?php echo $lesson['course_id']; ?>">New</a></li>
		</ul>
		</div>

</body>
</html>