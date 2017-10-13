<?php
include 'database.php'; 
?>  

<?php
session_start(); 
$link = mysqli_connect($servername,$user,$pass) or die( "Unable to connect");
mysqli_select_db($link, $database) or die( "Unable to select database");
if(isset($_POST['firstname']) and isset($_POST['lastname']) and isset($_POST['email']))  {
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$name = "$firstname $lastname";
	$email = $_POST['email'];
	$DOB = $_POST['DOB'];
	$address = $_POST['address'];
	$gender = $_POST['gender'];
	$isfaculty = $_POST['isfaculty'];
	
	$username = $_SESSION['username'];
	
	if($isfaculty == "1") {
		$dept = $_POST['dept'];
	} else {
		$dept = null;
	}
	$insertStatement = "INSERT INTO student_faculty (Username, Name, DOB, Email, Gender, Address,
	IsFaculty, Dept) VALUES ('$username', '$name', '$DOB', '$email', '$gender', '$address', '$isfaculty',
	'$dept')";
	
	$result = mysqli_query ($link, $insertStatement)  or die(mysqli_error($link)); 
	if($result == false) {
		echo 'The query failed.';
		exit();
	} else {
		header('Location: login.php');
	}
} 
?>

<html>
<head>
<style>
body{background-color:lightgray;}
h1{margin-left:100px;font-size:50px;color:red;}
label{font-size:30px;}
form{padding:30px;width:50%;margin-left:100px;border:1px solid black}
input[type=button], input[type=submit], input[type=text],input[type=date]{
    background-color:white;
    border: 2px solid white;
    color: black;
    padding: 5px;
    font-size:20px;
	text-align:center;
    margin: 20px 2px;
    cursor: pointer;
	font-weight:bold;
	
}
select{
	 background-color:white;
    border: 2px solid white;
    color: black;
    padding: 5px;
    font-size:20px;
	text-align:center;
    margin: 20px 2px;
    cursor: pointer;
	font-weight:bold;
}
</style>
</head>
<body>
<h1>Create Profile</h1>

<form action="" method="post">
<table>
<tr>
    <td><label>First Name:</label></td>
    <td><input type="text" name="firstname" required/></td>
</tr>
<tr>
    <td><label>Last Name:</label></td>
    <td><input type="text" name="lastname" required/></td>
</tr>

<tr>
    <td><label>D.O.B:</label></td>
    <td><input type="date" name="DOB"/></td>
</tr>

<tr>
    <td><label>Email:</label></td>
    <td><input type="text" name="email" required/></td>
</tr>

<tr>
    <td><label>Address:</label></td>
    <td><textarea name="address" rows="5" cols="30"></textarea></td>
</tr>

</table>


<tr>
    <td><label>Gender:</label></td>

</tr>


<select name="gender">
  <option value="M">Male</option>
  <option value="F">Female</option>
</select>


<tr>
    <td><label>Are you a faculty:</label></td>

</tr>

<table>
<select name="isfaculty">
  <option value="1">Yes</option>
  <option value="0">No</option>
</select>
</table>


<tr>
    <td><label>Associate Department:</label></td>

</tr>
</table>
<table>
<select name="dept">
  <option value="School of Electrical & Computer Engineering">Electrical Engineering</option>
  <option value="College of Computing">Computer Science</option>
  <option value="School of Industrial & Systems Engineering">Industrial & Systems Engineering</option>
  <option value="Medical college">Medical Science</option>
</select>
</table>


<input type="submit" value="submit"/>
</form>
</body>
</html>