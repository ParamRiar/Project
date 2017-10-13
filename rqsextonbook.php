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
<h1>Request Extension On a Book</h1>

<form action="extresult.php" method="post">
<table>
<tr>
    <td><label>Enter your issue ID:</label></td>
    <td><input type="text" name="issueid" required/></td>
</tr>
</table><br>
<br>
<input type="submit" value="submit"/>

</form>
<form action="userhistroy.php" method="post">
<input type="submit" value="Back"/>
</form>
</body>
</html>