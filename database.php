<?php
$servername = "localhost";
$user = "root";
$pass = "";
$database="library_management_system";
// Create connection
$conn = new mysqli($servername, $user, $pass,$database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
else{
echo "";
}

// Create database
$sql = "CREATE DATABASE library_management_system";
if ($conn->query($sql) === TRUE) {
       echo "Database created successfully";
} 	

?>