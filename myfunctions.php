<?php

function authenticate($username, $password)
{
	global $db;
	$s = "select * from users where username = '$username' and password = '$password' " ;
	echo "<br>SQL select: $s" ;
	($t = mysqli_query($db, $s) ) or die(mysqli_error($db)) ;
	$num = mysqli_num_rows ($t) ;

	if ($num == 0 ) {return false;}
	else 			{return true ;}
}

function safe ($fieldname)
{
	global $db;
	$temp = $_GET[$fieldname] ;
	$temp = trim ($temp) ;
	$temp = mysqli_real_escape_string($db, $temp) ;
	echo "<br>$fieldname is: $temp" ;
	return $temp ;	
}

function adduser ($username, $password)
{
	global $db;
	$s = "select * from users where username = '$username'";
	$result = mysql_query($SQL) or die (mysql_error());
	$num = mysql_numrows($result);
	if ($num > 0) {return false;} 
	else {
		$SQL = "insert into users (username, password) values ('$username', '$password')";
		mysql_query($SQL) or die (mysql_error());
		return true;
		}
}
?>
