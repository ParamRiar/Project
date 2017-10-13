<?php
include 'database.php'; 
?>  
<?php
//always start the session before anything else!!!!!! 
session_start(); 
//connect to the db 
$username = $_SESSION['username'];
?> 

<html>
<head>
 
<link rel="stylesheet" type="text/css" href="libstyle.css"></link>
</head>
<body>
<h1>Future Hold Request for a Book</h1>

<form action="futureholdrqrslt.php" method="post">
<table>
<tr>
    <td><label>ISBN:</label></td>
    <td><input type="text" name="isbn" required/></td>
</tr>
</table><br><br>
<input type="submit" value="Request"/>
</form>

<form action="userhistroy.php" method="post">
<input type="submit" value="Back"/>
</form>


</body>
</html>