<html>
<head>
<title>
Home Data
</title>
<link rel="stylesheet" type="text/css" href="libstyle.css">	
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
//echo "Connected successfully";
}
	mysql_select_db("library_management_system");
$sql = "SELECT * FROM book";
$result=$conn->query($sql);
//echo "$sql";
?>

<table border = 1;
 border-spacing: 5px;
    border-color: black;>
<form action="insertbook.php" method="post">
<input type="Submit" value="Add new Book"/>
</form>
<tr>
<th>ISBN</th>
<th>Title</th>
<th>Cost</th>
<th>IsReserved</th>
<th>Edition</th>
<th>Publisher</th>
<th>CopyYr</th>
<th>ShelfID</th>
<th>SubName</th>
<th>Edit </th>
<th>Delete</th>
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
        echo $row['Cost'];
        echo "</td>";
        
        echo "<td>";
        echo $row['IsReserved'];
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
        echo $row['ShelfID'];
        echo "</td>";
		echo "<td>";
        echo $row['SubName'];
        echo "</td>";
        
       echo "<td><a href=\"editbook.php?ISBN=$row[ISBN]\">Edit</a></td>";
	
         echo "<td><a href=\"deletebook.php?ISBN=$row[ISBN]\">Delete</a></td>";
       
        echo "</tr>";
    
	}
	} else {
   	echo "0 results";
	} 
	
	
	
		
	//$stmt->close();
	//$conn->close();
?>
</table>



</body>
</html>

