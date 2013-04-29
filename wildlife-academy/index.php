<?php require_once 'functions.php'; ?><!DOCTYPE html>
<html>
<head>
	<title>Wildlife Academy</title>
	<link rel="stylesheet" href="style.css" />
</head>
<body>
	
	<div class="list">
		<h2>New England Wildlife Center On-line Courses</h2>
		<p>We have created and are outlining 5 on-line courses. We are at the beginning stages of creating each unit which includes a 3-4 minute video or a series of mini videos, a written description of the subject, a series of links for further reading and an end unit quiz.</p>
		
		<p>Courses are as follows:</p>
	</div>
	
	<div class="list">
		<h2>Courses</h2>
		
		<ul>
			<?php
			
			$courses = getCourses();
			
			while( $course = mysql_fetch_array( $courses ) ):
			
			?>
			<li>
				<a href="lessons.php?course_id=<?php echo $course['id']; ?>"><h3><?php echo $course['course_name']; ?><a href="edit.php?course_id=<?php echo $course['id']; ?>"><img src="images/edit.png" title="Edit" /></a>
				<a href="deleteCourse.php?course_id=<?php echo $course['id']; ?>"><img src="images/cancel.png" title="Remove" /></a></h3></a>
				<p><?php echo $course['course_description']; ?></p>		
			</li>
			<?php endwhile; ?>
			
			<li><a href="edit.php">New</a></li>
		</ul>
	</div>

</body>
</html>