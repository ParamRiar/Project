<html>
<?php
include 'database.php'; 
?>  
<?php
//always start the session before anything else!!!!!! 
session_start(); 
//connect to the db 
$username = $_SESSION['username'];
?> 
<head>
<link rel="stylesheet" type="text/css" href="libstyle.css"></link>
</head>
<body>
<?php
include "database.php"; 

$servername = "localhost";
$user = "root";
$pass = "";
$database="library_management_system";
// Create connection
$conn = new mysqli($servername, $user, $pass ,$database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
else{
echo "";
}
	mysql_select_db("library_management_system");
$sql = "SELECT * FROM book";
$result=$conn->query($sql);
//echo "$sql";
?>
<h1>Books Detail</h1>
<table border = 1;
 border-spacing: 5px;
    border-color: black;>

<tr>
<th>ISBN</th>
<th>Title</th>

<th>Edition</th>
<th>Publisher</th>
<th>CopyYr</th>

<th>SubName</th>

</tr>

<?php
if($result->num_rows>0){
	

	while($row =$result-> fetch_assoc()) {
        echo "<tr>";
		echo "<td>";
        	echo $row["ISBN"];
        echo "</td>";
        echo "<td>";
        	echo $row["Title"];
        echo "</td>";
        
        echo "<td>";
        echo $row['Edition'];
        echo "</td>";
        echo "<td>";
        echo $row['Publisher'];
        echo "</td>";
        echo "<td>";
        echo $row['CopyYr'];
        echo "</td>";
        
		echo "<td>";
        echo $row['SubName'];
        echo "</td>";
        
      
       
        echo "</tr>";
    
	}
	} else {
   	echo "0 results";
	} 
	
	
	
		
	//$stmt->close();
	//$conn->close();
?>
</table>



<h1>SearchBooks</h1>

<form action="holdbookrq.php" method="post">
<table>
<tr>
    <td>ISBN</td>
    <td><input type="text" name="isbn"/></td>
</tr>

<tr>
    <td>Title</td>
    <td><input type="text" name="title"/></td>
</tr>
</table>

<input type="submit" value="Search"/>
</form>
<table>
<tr>
<form action="userhistroy.php" method="post">
<input type="submit" value="Back"/>
</form>
</tr>
<tr>
<form action="login.php" method="post">
<input type="submit" value="Close"/>
</form>
</tr>
</table>






</body>
</html>