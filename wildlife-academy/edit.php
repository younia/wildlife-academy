<?php

require_once 'functions.php';

// Set default course properties
$course = array(
	'course_id' => 0,
	'course_name' => 'New Course Name ',
	'course_description' => 'New Course Description',
);

// Set default lesson properties
$lesson = array(
	'lesson_id' => 0,
	'lesson_name' => 'New Lesson Name ',
	'lesson_description' => 'New Lesson Description',
	'lesson_content' => 'New Lesson Content '
);

// Set default quiz properties
$quiz = array(
	'id' => 0,
	'quiz_name' => 'New Quiz Name'
);

// If an existing course id is present in the URL..
if( isset( $_GET['course_id'] ) )
	// ..locate that course in the database
	$course = getCourse( $_GET['course_id'] );	
	
// If an existing lesson id is present in the URL..
	if( isset( $_GET['lesson_id'] ) )
	// ..locate that lesson in the database
	$lesson = getLesson( $_GET['lesson_id'] );
	
// If an existing quiz id is present in the URL..
	if( isset( $_GET['quiz_id'] ) )
	// ..locate that quiz in the database
	$quiz = getQuiz( $_GET['quiz_id'] );	
	
?><!DOCTYPE html>
<html>
<head>
	<title>Wildlife Academy</title>
	<link rel="stylesheet" href="style.css" />
</head>
<body>

	<?php //if ($course['id'] > 0): ?>
	<!--div class="editor">
		<select name="course_id">
		<?php 

		//$courses = getCourses();

		//while( $row = mysql_fetch_array( $courses ) )
		//{
			//echo <<<HTML
			//<option value="{$row['id']}">{$row['course_name']}</option>
//HTML;
		//}
		?>
		</select>
	</div-->
	<?php// endif; ?>



	<div class="editor"><!--create or edit course-->
		<h2>
			<a title="Go Back" href="index.php"><img src="images/back.png"/></a>&nbsp;&nbsp;
			<?php echo $course['course_name']; ?>
		</h2>
		
		<form action="updateCourse.php" method="post">
			<input type="hidden" name="course_id" value="<?php echo $course['id']; ?>" />
			<input type="hidden" name="lesson_id" value="<?php echo $lesson['id']; ?>" />
			
			
		
			<div class="field">
				<label>Course Name</label>
				<input type="text" name="course_name" style="width:95%;" value="<?php echo $course['course_name']; ?>" placeholder="Course Name" autofocus />
				<br/>
				<label>Course Description</label>
				<textarea name="course_description" style="width:95%; height:60px;" placeholder="Course Description" autofocus ><?php echo $course['course_description']; ?></textarea>
			</div>
			
			
			<div class="field">
				<!--label>&nbsp;</label-->
				<input type="submit" value="Save" />
				<!--input type="reset" value="Reset" onclick="return confirm('Changes will be lost');" /-->
				<a href="index.php"><b>View Courses</b></a>
			</div>
		</form>
	</div>
	

	
	<div class="editor"><!--create or edit lesson-->

		<h2>
			<a title="Go Back" href="lessons.php?course_id=<?php echo $course['id']; ?>"><img src="images/back.png"/></a>&nbsp;&nbsp;
			<?php echo $lesson['lesson_name']; ?>
		</h2>
		
		<form action="updateLesson.php" method="post">
			<input type="hidden" name="lesson_id" value="<?php echo $lesson['id']; ?>" />
			<input type="hidden" name="course_id" value="<?php echo $course['id']; ?>" />
			
		
			<div class="field">
				<label>Lesson Name</label>
				<input type="text" name="lesson_name" style="width:95%;"value="<?php echo $lesson['lesson_name']; ?>" placeholder="Lesson Name" autofocus />
				<br/>
				<label>Lesson Description</label>
				<textarea name="lesson_description" style="width:95%; height:60px;" placeholder="Lesson Description" autofocus ><?php echo $lesson['lesson_description']; ?></textarea>
			</div>
			
			<div class="field">
				<label>Lesson Content</label>
				<textarea name="lesson_content" style="width:95%; height:200px;" placeholder="Lesson Content" autofocus ><?php echo $lesson['lesson_content']; ?></textarea>
			</div>
			
			<div class="field">
				<!--label>&nbsp;</label-->
				<input type="submit" value="Save" />
				<!--input type="reset" value="Reset" onclick="return confirm('Changes will be lost');" /-->
				<a href="lesson.php?course_id=<?php echo $course['id']; ?>&lesson_id=<?php echo $lesson['id']; ?>"><b>View Session</b></a>
			</div>
		</form>
	</div>


	
	<div class="editor">
		<h2>
			<a title="Go Back" href="index.php"><img src="images/back.png"/></a>&nbsp;&nbsp;
			<?php echo $quiz['quiz_name']; ?>
		</h2>
		
		<form action="updateQuiz.php" method="post">
			<input type="hidden" name="quiz_id" value="<?php echo $quiz['id']; ?>" />
			<input type="hidden" name="lesson_id" value="<?php echo $lesson['id']; ?>" />
			<input type="hidden" name="course_id" value="<?php echo $course['id']; ?>" />
			<input type="hidden" name="quiz_name" value="<?php echo $quiz['quiz_name']; ?>" />
			<input type="hidden" name="question_id" value="<?php echo $question['id']; ?>" />
			
		
			<div class="field">
				<label>Quiz Name</label>
				<input type="text" name="quiz_name" value="<?php echo $quiz['quiz_name']; ?>" placeholder="Quiz Name" autofocus />
			</div>
			
			
			<div class="field">
				<!--label>&nbsp;</label-->
				<input type="submit" value="Save" />
				<!--input type="reset" value="Reset" onclick="return confirm('Changes will be lost');" /-->
				
			</div>
		</form>
	</div>
	
	<?php 
	
	$questions = getQuestions( $quiz['id'] );
	
	while( $question = mysql_fetch_array( $questions ) ):
	
	?>
	
	<div class="editor">
		<h2>Question
			<a href="deleteQuestion.php?question_id=<?php echo $question['id']; ?>&quiz_id=<?php echo $quiz['id']; ?>&course_id=<?php echo $course['id']; ?>&lesson_id=<?php echo $lesson['id']; ?>"><img src="images/cancel.png" title="Remove this question" /></a>
		</h2>
		<form action="updateQuestion.php" method="post">
			<input type="hidden" name="question_id" value="<?php echo $question['id']; ?>" />
			<input type="hidden" name="quiz_id" value="<?php echo $quiz['id']; ?>" />
			<input type="hidden" name="course_id" value="<?php echo $course['id']; ?>" />
			<input type="hidden" name="lesson_id" value="<?php echo $lesson['id']; ?>" />
			<div class="field">
				<label>Question</label>
				<textarea name="question"><?php echo $question['question']; ?></textarea>
			</div>
			<?php
			
			$answers = getAnswers( $question['id'] );
			
			while( $answer = mysql_fetch_array( $answers ) ):
			?>
			<div class="field">
				<label>Answer</label>
				<input name="answers[<?php echo $answer['id']; ?>]" type="text" value="<?php echo $answer['value']; ?>" />
				<input type="radio"
					name="correct"
					value="<?php echo $answer['id']; ?>"
					title="Correct Answer"
					<?php if($question['correct'] == $answer['id']) echo ' checked="checked"'; ?>
					/>
			</div>
			<?php endwhile; ?>
			<div class="field">
				<label>Answer</label>
				<input type="text" name="answers[0]" placeholder="Add New" />
				<input type="radio" name="correct" title="Correct Answer" />
			</div>
			<div class="field">
				<label>&nbsp;</label>
				<input type="submit" value="Save" />
			</div>
		</form>
	</div>
	
	<?php endwhile; ?>
	
	<?php if( $quiz['id'] ): ?>
	<div class="editor">
		<h2>New Question</h2>
		<form action="updateQuestion.php" method="post">
			<input type="hidden" name="question_id" value="0" />
			<input type="hidden" name="quiz_id" value="<?php echo $quiz['id']; ?>" />
			<input type="hidden" name="course_id" value="<?php echo $course['id']; ?>" />
			<input type="hidden" name="lesson_id" value="<?php echo $lesson['id']; ?>" />
			<div class="field">
				<label>Question</label>
				<textarea name="question" placeholder="New Question"></textarea>
			</div>
			<div class="field">
				<label>Answer</label>
				<input type="text" name="answer" placeholder="New Answer" />
				<input type="radio" name="correct" checked title="Correct Answer" />
			</div>
			<div class="field">
				<label>&nbsp;</label>
				<input type="submit" value="Save" />
			</div>
		</form>
	</div>
	<?php endif; ?>

</body>
</html>