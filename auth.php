<?php
session_start();

error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);  
ini_set('display_errors' , 1);

include (  "account.php"     ) ;
$db = mysqli_connect($hostname, $username, $password, $project);

if (mysqli_connect_errno())
  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  exit();
  }
print "Successfully connected to MySQL.<br><br><br>";
mysqli_select_db( $db, $project ); 

include "myfunctions.php";

$username = safe("username") ;
$password = safe("password") ;

if (! authenticate ($username, $password) ) 
{
	echo "<br>Invalid cred." ; 
	header ( "refresh: 2 ; url = login.html ");
	exit();
}
else 								
{
	echo "<br>Valid cred." ; 
	$_SESSION ["logged"] = true ;
	$_SESSION ["username"] = $username ;
	header ( "refresh: 2 ; url = landingpage.php ");
	exit();
}

print "<br>Bye" ;

?>
