<?php 
define("MYSITE", "205.178.146.111");
define("MYUSER", "newc1234");
define("MYPSWD", "1234Newc");
define("MYDB", "wildlifetrivia");
$mysqli = NULL;

function sqlOpen(){
	global $mysqli;//making local var global
	if(!$mysqli){
		//$mysqli = mysql_connect(MYSITE, MYUSER, MYPSWD);
		$mysqli = new mysqli(MYSITE, MYUSER, MYPSWD, MYDB);
		
		if($mysqli->connect_error){
			die("Connect Error: ".$mysqli->connect_errno." ".$mysqli->connect_error);
			}
		}
	return true;
}
	
function sqlClose(){
		global $mysqli;
		$mysqli->close();
		$mysqli = NULL;
		return true;
	}
	
function sqlInsert($qry){
		global $mysqli;
		if (!sqlOpen())
			return false;
			
			
		$result = $mysqli->query($qry);
		if ($result)
			return $mysqli->insert_id;
		else
			return $result;
	}
function sqlUpdate($qry){
		global $mysqli;
		if (!sqlOpen())
			return false;
			
			
		return $mysqli->query($qry);
	}
	
function sqlExecQrySingle($qry){
		global $mysqli;
		if (!sqlOpen())
			return false;
		$result = $mysqli->query($qry);
		if ($result){
			$row = $result->fetch_array(MYSQLI_ASSOC);//MYSQLI_ASSOC means give me just names of columns and values
			return $row;
			}
		else
			return $result;
	}
function sqlExecQryMulti($qry){
		global $mysqli;
		if (!sqlOpen())
			return false;
		return $mysqli->query($qry);
	}
	
function sqlCleanValue($val){
	global $msqli;
	return(htmlspecialchars(stripslashes(strip_tags($val))));
	//return($msqli->real_escape_string(htmlspecialchars(stripslashes(strip_tags($val)))));
	}

?>