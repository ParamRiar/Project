<?php
include 'database.php'; 
?>  
<?php
//always start the session before anything else!!!!!! 
session_start(); 
//connect to the db 
$username = $_SESSION['username'];
unset($_SESSION['isbn']);
unset($_SESSION['copyid']);	
?> 
<html>
<head>
 <link rel="stylesheet" type="text/css" href="libstyle.css"></link>
</head>
<body>
<h1>Library Management System</h1>
<table>
<tr>
<form action="data.php" method="post">
<input type="submit" value="View Profile"/>
</form>
</tr>
<tr>
<form action="searchbook.php" method="post">
<input type="submit" value="Search Books"/>
</form>
</tr>
<tr>
<form action="booklocation.php" method="post">
<input type="submit" value=" Book Location"/>
</form>
</tr>
<tr>
<form action="bookcheckout.php" method="post">
<input type="submit" value="Checkout Book"/>
</form>
</tr>
<tr>
<form action="futureholdrq.php" method="post">
<input type="submit" value="Future Hold Request"/>
</form>
</tr>
<tr>
<form action="rqsextonbook.php" method="post">
<input type="submit" value="Extension Request"/>
</form>
</tr>
<tr>
<form action="returnbook.php" method="post">
<input type="submit" value="Return Book"/>
</form>
</tr>
<tr>
<form action="login.php" method="post">
<input type="submit" value="Close"/>
</form>
</tr>
</table>
<img src="images\top5.png" width="100%">
</body>
</html>