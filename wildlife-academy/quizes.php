<?php require_once 'functions.php'; ?><!DOCTYPE html>
<html>
<head>
	<title>Wildlife Academy</title>
	<link rel="stylesheet" href="style.css" />
</head>
<body>
	
	<div class="list">
		<h2>Quizes</h2>
		
		<ul>
			<?php
			
			$quizes = getQuizes();
			
			while( $quiz = mysql_fetch_array( $quizes ) ):
			
			?>
			<li>
				<a href="quiz.php?quiz_id=<?php echo $quiz['id']; ?>"><?php echo $quiz['name']; ?></a>
				<a href="edit.php?quiz_id=<?php echo $quiz['id']; ?>"><img src="images/edit.png" title="Edit" /></a>
				<a href="deleteQuiz.php?quiz_id=<?php echo $quiz['id']; ?>"><img src="images/cancel.png" title="Remove" /></a>
			</li>
			<?php endwhile; ?>
			<li><a href="edit.php">New</a></li>
		</ul>
		
	</div>

</body>
</html>