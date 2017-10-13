<?php
include 'database.php'; 
?> 
 

<html>
<head>
 <link rel="stylesheet" type="text/css" href="libstyle.css"></link>
<style>
input[type=button], input[type=submit], input[type=text] ,input[type=password]{
    background-color:skyblue;
     border: 2px solid white;
	 border-radius: 15px;
    color: black;
    padding: 10px;
    font-size:20px;
	text-align:center;
    margin: 4px 2px;
    cursor: pointer;
	font-weight: bold;
	
}
</style>
</head>

<body>
<header>
<h1 id="h">LIBRARY MANAGEMENT SYSTEM</h1>
</header>



<?php
//always start the session before anything else!!!!!! 
session_start(); 
if(isset($_POST['username']) and isset($_POST['password']))  { //check null
	$username = $_POST['username']; // text field for username 
	$password = $_POST['password']; // text field for password
	
// store session data
$_SESSION['username']=$username;
//connect to the db 
$link = mysqli_connect($servername,$user,$pass) or die( "Unable to connect");
mysqli_select_db($link, $database) or die( "Unable to select database");
         //Our SQL Query
           $sql_query = "Select U.Username From user AS U, admin AS A Where U.Username = '$username' AND U.Password = '$password' AND U.Username = A.Username";  
         //Run our sql query
           $result = mysqli_query ($link, $sql_query)  or die(mysqli_error($link));  
			if($result == false)
				{
				echo 'The query failed.';
				exit();
			}
			if(mysqli_num_rows($result) == 1){ 
			//the username and password matches the database 
			//move them to the page to which they need to go 
				header('Location: adminhistroy.php');	
				break;
			//Our SQL Query
			}
			
           $sql_query = "Select Username From user Where Username = '$username' AND Password = '$password'";  
            //Run our sql query
           $result = mysqli_query ($link, $sql_query)  or die(mysqli_error($link));  
			if($result == false)
				{
				echo 'The query failed.';
				exit();
			}
			//this is where the actual verification happens 
			if(mysqli_num_rows($result) == 1){ 
			//the username and password matches the database 
			//move them to the page to which they need to go 
				header('Location: userhistroy.php');
			   
			}else{ 
			$err = 'Incorrect username or password' ; 
			} 
			//then just above your login form or where ever you want the error to be displayed you just put in 
			echo "$err";
    } 
	
?>	

<form action="" method="post" id="f1">
<h1>Login</h1>
<table>
<tr>
    <td><label>Username:</label></td>
    <td><input type="text" name="username" required/></td>
</tr>
<tr>
    <td><label>Password:</label></td>
    <td><input type="password" name="password" required/></td>
</tr>
</table>

<input type="Submit" value="Login"/>
</form>
<form action="newuserregister.php" method="post">
<input type="Submit" value="Create Account"/>
</form>


</body>
</html>