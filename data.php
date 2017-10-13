<!DOCTYPE html>
<html>
<head>
 <link rel="stylesheet" type="text/css" href="libstyle.css"></link>
</head>
<body>
<h1>User Profile</h1>
<table>
<?php
//including the database connection file
include_once("database.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
//$result = "SELECT * FROM student_faculty ORDER BY username DESC"; // using mysqli_query instead
//echo "$result";
?>

<?php
	
	session_start();
	//require ("database.php") 
//connect to the db 
$link = mysqli_connect($servername,$user,$pass) or die( "Unable to connect");


mysqli_select_db($link, $database) or die( "Unable to select database");
	
	// if session is not set this will redirect to login page
	if( !isset($_SESSION['username']) ) {
		header("Location: newprofile.php");
		exit;
	}
	
	$conn = mysqli_connect("localhost","root","","library_management_system");
	
	if ($conn){
		//echo "Connected";
	
	// select loggedin users detail
	$que='SELECT * FROM student_faculty WHERE username="'.$_SESSION['username'].'"';
	$result=$conn->query($que);
	//$result=$conn->query("Select * from student_faculty");
	//echo $que;
	if (mysqli_num_rows($result)>0){
		//echo "got rows";
		while ($row=mysqli_fetch_array($result)){
			//$name = $row['Name'];
	
	echo"<tr>";
	
	echo "<th>" ."Username:"."<br>";
			echo"<td>". $row[0] . "<br/>";
			echo"</tr>";
			
			echo"<tr>";
			echo "<th>" ."Name:"."<br/>";
			echo "<td>".$row[1] . "<br/>";
			echo"</tr>";
				echo"<tr>";
			echo "<th>" ."DOB:"."<br/>";
			
			echo "<td>".$row[2]."<br>";
				echo"</tr>";
				echo"<tr>";
			echo "<th>" ."Email:"."<br/>";
			echo "<td>".$row[3] . "<br>";
			echo"</tr>";
				echo"<tr>";
			echo "<th>" ."Gender:"."<br/>";
			echo "<td>".$row[4]."<br>";
			echo"</tr>";
				echo"<tr>";
			echo "<th>" ."Address:"."<br/>";
			echo "<td>".$row[5] . "<br>";
			echo"</tr>";
				echo"<tr>";
			echo "<th>" ."Department:"."<br/>";
			echo "<td>".$row[6]."<br>";
			
		echo"	</tr>";
		echo "<td><a href=\"editprofile.php?username=$row[0]\">Edit</a></td>";
			
		}
	}
	
}
?>	
		
</table>
<form action="userhistroy.php" method="post">
<input type="submit" value="Back"/>
</form>
</body>
</html>