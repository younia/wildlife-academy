<?php
// Connect to the database
//mysql_connect('localhost','root','root') or die(mysql_error());
mysql_connect('mysql.myweborchard.com','younia','357834') or die(mysql_error());

//mysql_select_db('homework') or die(mysql_error());
mysql_select_db('newc_academy') or die(mysql_error());

session_start();

require_once 'fixMagicQuotes.php';

/*
 * Redirects the browser to a certain URL
 * @param string The URL to which the URL will be redirected
 */
function redirect($url)
{
	header("Location: $url");
}

/*
 * Returns all courses
 * @return mysql_result A result set containing zero or more courses
 */
function getCourses()
{
	return mysql_query("SELECT * FROM courses");
}


/*
 * Returns a specific course 
 * @return array An array containing one course, or null
 */
function getCourse($course_id)
{
	$result = mysql_query("SELECT * FROM courses WHERE id = $course_id LIMIT 1");
	
	if( mysql_num_rows( $result ) )
	{
		return mysql_fetch_array( $result );
	}
	
	return null;
}


/*
 * Returns all lessons 
 * @return mysql_result A result set containing zero or more lessons
 */
function getLessons($course_id)
{
	return mysql_query("SELECT * FROM lessons WHERE course_id = $course_id");
}

/*
 * Returns a specific lesson 
 * @return array An array containing one lesson, or null
 */
function getLesson($lesson_id)
{
	$result = mysql_query("SELECT * FROM lessons WHERE id = $lesson_id LIMIT 1");
	
	if( mysql_num_rows( $result ) )
	{
		return mysql_fetch_array( $result );
	}
	
	return null;
}

/*
 * Returns all quizes in alphabetical order
 * @return mysql_result A result set containing zero or more quizes
 */
function getQuizes($lesson_id)
{
	return mysql_query("SELECT * FROM quizes WHERE lesson_id = $lesson_id");
}

/*
 * Returns a single quiz from the database
 * @param int The quiz's id
 * @return array An array containing that quiz's properties, or null
 */
function getQuiz($quiz_id)
{
	$result = mysql_query("SELECT * FROM quizes WHERE id = $quiz_id LIMIT 1");
	
	
	if( mysql_num_rows( $result ) )
	{
		return mysql_fetch_array( $result );
	}
	
	return null;
}

/*
 * Returns any questions associated with a single quiz
 * @param int The quiz's id
 * @return mysql_result A result set containing zero or more questions beloning to a quiz
 */
function getQuestions($quiz_id)
{
	return mysql_query("SELECT * FROM questions WHERE quiz_id = $quiz_id");
}

/*
 * Returns a single quiz from the database
 * @param int The quiz's id
 * @param int The question's index (order, not id)
 * @return array An array containing that quiz's properties, or null
 */
function getQuestion($quiz_id, $question)
{
	$result = mysql_query("SELECT * FROM questions WHERE quiz_id = $quiz_id LIMIT $question,1");
	
	if( mysql_num_rows( $result ) )
	{
		return mysql_fetch_array( $result );
	}
	
	return null;
}

/*
 * Returns all answers for a single question
 * @param int The questions's id
 * @return array An array containing that quiz's properties, or null
 */
function getAnswers($question_id)
{
	
	return mysql_query("SELECT * FROM answers WHERE question_id = $question_id");
	
}

/*
 * Returns the value of an answer
 * @param int The answers's id
 * @return string The value of the answer
 */
function getAnswerValue( $answer_id )
{
	$result = mysql_query("SELECT value FROM answers WHERE id = $answer_id LIMIT 1");
	
	$answer = mysql_fetch_array( $result );
	
	return $answer['value'];
}


// Data Entry Methods
////////////////////////////////not finished deleting everything.. not sure if deleting a course also should include deleteing all lessons, quizzes, questions and answers in it... and how to do it... 
function createCourse()
{
	$course_name = addslashes($_POST['course_name']);
	$course_description = addslashes($_POST['course_description']);
	
	$query = "INSERT INTO courses (course_name, course_description) VALUES ('$course_name', '$course_description')";
	
	if( mysql_query( $query ) or die( mysql_error() ) )
	{
		return mysql_insert_id();
	}
	
	return 0;
}

function updateCourse()
{
	$course_id = $_POST['course_id'];
	$course_name = addslashes($_POST['course_name']);
	$course_description = addslashes($_POST['course_description']);
	
	$query = "UPDATE courses SET course_name = '$course_name', course_description = '$course_description' WHERE id = $course_id LIMIT 1";
	
	return mysql_query( $query ) or die( mysql_error() );
}

/*

	- Courses contain lessons
	- Lessons contain quizes
	- Quizes contain questions
	- Questions contain answers
	
 */

function deleteCourse( )
{
	$course_id = $_REQUEST['course_id'];
	
	$query = "DELETE FROM courses WHERE id = $course_id LIMIT 1";
	
	if( mysql_query( $query ) or die( mysql_error() ) )
	{
		// Delete all lessons in the course
		$query = <<<SQL
		SELECT id FROM
			lessons
		WHERE
			course_id = $course_id
SQL;
		$result = mysql_query( $query );
		
		while( $lesson = mysql_fetch_object( $result ))
		{
			deleteLesson( $lesson->id );
		}
	}
}

function createLesson()
{
	$lesson_name = addslashes($_POST['lesson_name']);
	$course_id = addslashes($_POST['course_id']);
	$lesson_description = addslashes($_POST['lesson_description']);
	$lesson_content = addslashes($_POST['lesson_content']);
	
	$query = "INSERT INTO lessons (lesson_name, lesson_content, lesson_description, course_id) VALUES ('$lesson_name', '$lesson_content', '$lesson_description', '$course_id' )";
	
	if( mysql_query( $query ) or die( mysql_error() ) )
	{
		return mysql_insert_id();
	}
	
	return 0;
}

function updateLesson()
{
	$lesson_id = $_POST['lesson_id'];
	$lesson_name = addslashes($_POST['lesson_name']);
	$lesson_description = addslashes($_POST['lesson_description']);
	$lesson_content = addslashes($_POST['lesson_content']);
	$course_id = $_POST['course_id'];
	
	$query = "UPDATE lessons SET lesson_name = '$lesson_name', lesson_content = '$lesson_content', lesson_description = '$lesson_description', course_id = $course_id WHERE id = $lesson_id LIMIT 1";
	
	return mysql_query( $query ) or die( mysql_error() );
}

function deleteLesson( $lesson_id )
{
	
	$query = "DELETE FROM lessons WHERE id = $lesson_id LIMIT 1";
	
	if( mysql_query( $query ) or die( mysql_error() ) )
	{
		// Delete all lessons in the course
		$query = <<<SQL
		SELECT id FROM
			quizes
		WHERE
			lesson_id = $lesson_id
SQL;
		$result = mysql_query( $query );
		
		while( $lesson = mysql_fetch_object( $result ))
		{
			deleteQuiz( $quiz->id );
		}
	}
}

//////////////////////////////




function createQuiz()
{
	$quiz_name = addslashes($_POST['quiz_name']);
	$lesson_id = $_POST['lesson_id'];
	
	$query = "INSERT INTO quizes (quiz_name, lesson_id) VALUES ('$quiz_name', $lesson_id)";
	
	if( mysql_query( $query ) or die( mysql_error() ) )
	{
		return mysql_insert_id();
	}
	
	return 0;
}

function updateQuiz()
{
	$quiz_id = $_POST['quiz_id'];
	$quiz_name = addslashes($_POST['quiz_name']);
	$lesson_id = $_POST['lesson_id'];
	
	$query = "UPDATE quizes SET quiz_name = '$quiz_name', lesson_id = $lesson_id WHERE id = $quiz_id LIMIT 1";
	
	return mysql_query( $query ) or die( mysql_error() );
}

function deleteQuiz( $quiz_id )
{
	$query = "DELETE FROM quizes WHERE id = $quiz_id LIMIT 1";
	
	if( mysql_query( $query ) or die( mysql_error() ) )
	{
		// Delete all answers to questions in this quiz
		$query = <<<SQL
		DELETE FROM
			answers
		WHERE
			question_id IN
				( SELECT id FROM questions WHERE quiz_id = $quiz_id )
SQL;
		mysql_query( $query ) or die( mysql_error() );
		
		// Delete all questions in this quiz
		$query = "DELETE FROM questions WHERE quiz_id = $quiz_id";
		
		return mysql_query( $query ) or die( mysql_error() );
	}
}



function createQuestion()
{
	$quiz_id = $_POST['quiz_id'];
	$question = addslashes($_POST['question']);
	$answer = addslashes($_POST['answer']);
	
	$query = "INSERT INTO questions (quiz_id, question) VALUES ($quiz_id, '$question')";
	
	if( mysql_query( $query ) or die( mysql_error() ) )
	{
		// Create first answer
		$id = mysql_insert_id();
		$query = "INSERT INTO answers (question_id, value) VALUES ($id, '$answer')";
		
		if( mysql_query( $query ) or die( mysql_error() ) )
		{
			// Set this as the correct answer
			$correct = mysql_insert_id();
			// Update the database
			$query = "UPDATE questions SET correct = $correct WHERE id = $id LIMIT 1";
			
			mysql_query( $query ) or die( mysql_error() );
			
			return $id;
		}
	}
	
	return 0;
}

function updateQuestion()
{
	$id = $_POST['question_id'];
	$question = addslashes($_POST['question']);
	$correct = $_POST['correct'];
	
	$query = <<<SQL
		UPDATE questions SET
			question = '$question',
			correct = '$correct'
		WHERE id = $id
		LIMIT 1
SQL;
	
	if( mysql_query( $query ) or die( mysql_error() ) )
	{
		// Update/create the answers
		foreach( $_POST['answers'] as $key => $value )
		{
			$value = addslashes( $value );
			if( $key == 0 )
			{
				// If no value was entered, continue to the next answer
				if( !$value )
					continue;
					
				// New answer, create
				$query = <<<SQL
				INSERT INTO answers
					( question_id, value )
				VALUES
					( $id, '$value' )
SQL;
				mysql_query( $query );
				
				// See if new answer is the correct answer
				if( $correct == 0 )
				{
					// Update the database with the new answer id
					$correct = mysql_insert_id();
					$query = <<<SQL
	UPDATE questions SET
		correct = '$correct'
	WHERE id = $id
	LIMIT 1
SQL;
					mysql_query( $query );
				}
			}
			else
			{
				$query = <<<SQL
				UPDATE answers SET
					value = '$value'
				WHERE id = $key
				LIMIT 1
SQL;
				mysql_query( $query );
			}
		}
	}
	
	return false;
}

function deleteQuestion()
{
	$id = $_REQUEST['question_id'];
	
	$query = "DELETE FROM questions WHERE id = $id LIMIT 1";
	
	if( mysql_query( $query ) or die( mysql_error() ) )
	{
		// Delete all answers to questions in this quiz
		$query = "DELETE FROM answers WHERE question_id = $id";
		
		return mysql_query( $query ) or die( mysql_error() );
	}
}

?>