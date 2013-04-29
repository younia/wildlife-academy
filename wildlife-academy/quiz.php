<?php

require_once 'functions.php';

// Find a quiz in the database from the id in the URL
$quiz = getQuiz( $_GET['quiz_id'] );


// Determine which question index is selected
$index = 0;
if( isset( $_GET['index'] ) )
	$index = $_GET['index'];
	
$question = getQuestion( $quiz['id'], $index );

$answer = 0;
if( isset( $_POST['answer'] ) )
{
	$answer = $_POST['answer'];
	
	if( $answer == $question['correct'] )
	{
		$response = 'Correct!';
	}
	else
	{
		$correct = getAnswerValue( $question['correct'] );
		$response = "Your answer was incorrect. The correct answer was $correct.";
	}
}
?><!DOCTYPE html>
<html>
<head>
	<title>Quiz Engine</title>
	<link rel="stylesheet" href="style.css" />
</head>
<body>
	
	<div class="list">
		<h2><?php echo $quiz['quiz_name']; ?></h2>
		
		<?php
		
		
		if( $answer > 0 ):
		
			if( getQuestion( $quiz['id'], ($index+1) ) )
				$next = 'Go to the <a href="quiz.php?quiz_id='.$quiz['id'].'&index='.($index+1).'">next</a> question.';
			else
				$next = 'You have completed all questions in this quiz. Return to the <a href="index.php">main page</a>.';
			echo <<<HTML
			<p>$response</p>
			<p>$next</p>
HTML;
		else:
		?>
		
		<p><?php echo $question['question']; ?></p>
		
		<form action="" method="post">
		<?php
		$answers = getAnswers( $question['id'] );
		
		while( $answer = mysql_fetch_array( $answers ) ):
		?>
			<div>
				<input type="radio"
					value="<?php echo $answer['id']; ?>"
					name="answer"
					<?php if( $answer == $answer['id'] ) echo 'checked="checked"' ?> />
				<?php echo $answer['value']; ?>
				
			</div>
		<?php endwhile; ?>
			<div><input type="submit" value="Submit" /></div>
		</form>
		<?php endif; // $answer > 0 ?>
	</div>

</body>
</html>