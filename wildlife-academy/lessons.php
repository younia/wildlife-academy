<?php require_once 'functions.php'; ?><!DOCTYPE html>
<html>
<head>
	<title>Wildlife Academy</title>
	<link rel="stylesheet" href="style.css" />
</head>
<body>
	
	<div class="list">
		
		<h2><a title="Go Back" href="index.php"><img src="images/back.png"/></a>&nbsp;&nbsp;Sessions</h2>
		
		<ul>
			<?php
			
			$course_id = $_GET['course_id'];
			
			$lessons = getLessons($course_id);
			
			while( $lesson = mysql_fetch_array( $lessons ) ):
			
			?>
			<li>
				<a href="lesson.php?lesson_id=<?php echo $lesson['id']; ?>&course_id=<?php echo $lesson['course_id']; ?>"><h3><?php echo $lesson['lesson_name']; ?><a href="edit.php?lesson_id=<?php echo $lesson['id']; ?>&course_id=<?php echo $lesson['course_id']; ?>"><img src="images/edit.png" title="Edit" /></a>
				<a href="deleteLesson.php?lesson_id=<?php echo $lesson['id']; ?>&course_id=<?php echo $lesson['course_id']; ?>"><img src="images/cancel.png" title="Remove" /></a></h3></a>
				<p><?php echo $lesson['lesson_description']; ?></p>
	
			</li>
			<hr/>
			<?php endwhile; ?>
			<li><a href="edit.php?course_id=<?php echo $course_id; ?>">New</a></li> 
			
		</ul>
	</div>

</body>
</html>