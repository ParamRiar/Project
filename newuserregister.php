<?php
include 'database.php'; 
?>  

<?php
session_start(); 
$link = mysqli_connect($servername,$user,$pass) or die( "Unable to connect");
mysqli_select_db($link, $database) or die( "Unable to select database");
if(isset($_POST['username']) and isset($_POST['password']) and isset($_POST['confirmpassword']))  {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$confirmpassword = $_POST['confirmpassword'];
	
	$_SESSION['username']=$username;
	$_SESSION['password']=$password;
	$_SESSION['confirmpassword']=$confirmpassword;
	
	if($password == $confirmpassword) {
		$insertStatement = "INSERT INTO user (Username, Password) VALUES ('$username', '$password')";
		$result = mysqli_query ($link, $insertStatement)  or die(mysqli_error($link)); 
		if($result == false) {
			echo 'The query failed.';
			exit();
		} else {
			header('Location: profile.php');
		}
	} else {
		echo 'password not consistent';
	}
}
?>

<html>
<head>
 
 <style>
body{background-color:lightgray;}
h1{margin-left:100px;font-size:50px;color:red;}
label{font-size:30px;}
#f1{padding:30px;width:50%;margin-left:100px;border:1px solid black;}
form{padding:30px;width:50%;margin-left:100px;}
input[type=button], input[type=submit], input[type=text],input[type=password]{
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
<h1>New User Registration</h1>

<form action="" method="post" id="f1">
<table>
<tr>
    <td><label>Username:</label></td>
    <td><input type="text" name="username" required/></td>
</tr>
<tr>
    <td><label>Password:</label></td>
    <td><input type="password" name="password" required/></td>
</tr>

<tr>
    <td><label>Confirm Password:</label></td>
    <td><input type="password" name="confirmpassword" required/></td>
</tr>
</table>

<input type="submit" value="Register"/>
</form>

<form action="userhistroy.php" method="post">
<input type="submit" value="Back"/>
</form>

</body>
</html>