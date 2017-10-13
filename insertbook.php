<?php
include 'database.php'; 
?>  

<?php
//session_start(); 
$servername = "localhost";
$user = "root";
$pass = "";
$database="library_management_system";
// Create connection
$conn = new mysqli($servername, $user, $pass,$database);
if(isset($_POST['ISBN'])) {

	$ISBN =mysqli_real_escape_string($conn,$_POST['ISBN']);
	$Title = mysqli_real_escape_string($conn,$_POST['Title']);
	$Cost = mysqli_real_escape_string($conn,$_POST['Cost']);
	$IsReserved = mysqli_real_escape_string($conn,$_POST['IsReserved']);
	$Edition = mysqli_real_escape_string($conn,$_POST['Edition']);
	$Publisher = mysqli_real_escape_string($conn,$_POST['Publisher']);
	$CopyYr = mysqli_real_escape_string($conn,$_POST['CopyYr']);
	$ShelfID = mysqli_real_escape_string($conn,$_POST['ShelfID']);
	$SubName = mysqli_real_escape_string($conn,$_POST['SubName']);
	$result1 =mysqli_query($conn, "INSERT INTO book (ISBN, Title, Cost, IsReserved, Edition, Publisher,
	CopyYr, ShelfID,SubName) VALUES ('$ISBN', '$Title', '$Cost', '$IsReserved', '$Edition', '$Publisher', '$CopyYr',
	'$ShelfID','$SubName')");
	echo $result1;

	$result = mysqli_query ($conn, $result1)  or die(mysqli_error($conn)); 
	/*if($result == false) {
		echo 'The query failed.';
		exit();
	} else {
		header('Location: showbook.php');
	}*/
}
?>

<html>
<head>
<style>
body{background-color:lightgray;}
h1{margin-left:100px;font-size:50px;color:red;}
label{font-size:30px;}
form{padding:30px;width:50%;margin-left:100px;border:1px solid black}
input[type=button], input[type=submit], input[type=text]{
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
<h1>Add new Book</h1>

<form action="" method="post">
<table>
<tr>
    <td><label>ISBN:</label></td>
    <td><input type="text" name="ISBN" required/></td>
</tr>
<tr>
    <td><label>Title:</label></td>
    <td><input type="text" name="Title" required/></td>
</tr>

<tr>
    <td><label>Cost:</label></td>
    <td><input type="text" name="Cost"/></td>
</tr>

<tr>
    <td><label>IsReserved:</label></td>
    <td><input type="text" name="IsReserved" required/></td>
</tr>

<tr>
    <td><label>Edition:</label></td>
 <td><input type="text" name="Edition" required/></td>
 </tr>
 <tr>
    <td><label>Publisher:</label></td>
 <td><input type="text" name="Publisher" required/></td>
 </tr>
 <tr>
 
    <td><label>CopyYr:</label></td>
 <td><input type="text" name="CopyYr" required/></td>
 </tr>
 <tr>
    <td><label>ShelfID:</label></td>
 <td><input type="text" name="ShelfID" required/></td>
 </tr>
 <tr>
    <td><label>SubName:</label></td>
 <td><input type="text" name="SubName" required/></td>
 </tr>
  
	
</table>
<input type="submit" value="submit"/>
</form>
</body>
</html>