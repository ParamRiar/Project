<?php
/*
//including the database connection file
include("database.php");

//getting ISBN of the data from url
$ISBN = $_GET['ISBN'];

//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM book WHERE ISBN=$ISBN");
echo $result;
//redirecting to the display page (deletebook.php in our case)
//header("Location:deletebook.php");
?>
*/


	include_once("database.php");
	session_start();
	//require ("database.php") 
//connect to the db 
$link = mysqli_connect($servername,$user,$pass) or die( "Unable to connect");
mysqli_select_db($link, $database) or die( "Unable to select database");
	
	// if session is not set this will redirect to login page
	if( !isset($_SESSION['username']) ) {
		header("Location: showbook.php");
		exit;
	}
	$ISBN = $_GET['ISBN'];
	$conn = mysqli_connect("localhost","root","","library_management_system");
	
	if ($conn){
		//echo "Connected";
	
	// select loggedin users detail
	$que="DELETE FROM book WHERE ISBN=$ISBN";
	$result=$conn->query($que);
	echo "<font color='green'>Delete  Data successfully.";
		//header("Location: deletebook.php");
	//echo $que;
	
	
	}
	?>
	<html>
<body>

<form action="showbook.php" method="post">
<input type="submit" value="Back"/>
</form>
</body>
</html>
	
	

