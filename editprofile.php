
<?php
$servername = "localhost";
$user = "root";
$pass = "";
$database="library_management_system";
// Create connection
$conn = new mysqli($servername, $user, $pass,$database);
// Check connection

if(isset($_POST['update'])) {	
	
	$username =  mysqli_real_escape_string($conn, $_GET['username']);
	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$DOB = mysqli_real_escape_string($conn, $_POST['DOB']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$gender = mysqli_real_escape_string($conn, $_POST['gender']);
	$address = mysqli_real_escape_string($conn, $_POST['address']);
	$dept = mysqli_real_escape_string($conn, $_POST['dept']);
	
	// checking empty fields
	if (empty($username) || empty($name) || empty($DOB)|| empty($email)
		|| empty($gender) || empty($address) || empty($dept)) {
				
				
		if(empty($username)) {
			echo "<font color='red'>username field is empty.</font><br/>";
		}
		
		if(empty($name)) {
			echo "<font color='red'>name field is empty.</font><br/>";
		}
		
		if(empty($DOB)) {
			echo "<font color='red'>DOB field is empty.</font><br/>";
		}
		
		
		if(empty($address)) {
			echo "<font color='red'>Address field is empty.</font><br/>";
		}
		
		if(empty($email)) {
			echo "<font color='red'>email field is empty.</font><br/>";
		}
		
		if(empty($gender)) {
			echo "<font color='red'>gender field is empty.</font><br/>";
		}
		
		if(empty($dept)) {
			echo "<font color='red'>dept field is empty.</font><br/>";
		}
		
		
		//link to the previous page
		//echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database
		$query ="UPDATE student_faculty SET username='$username', name='$name', DOB='$DOB'
		,address='$address',email='$email',gender='$gender',dept='$dept' WHERE username='$username'";
		
		//echo $query;
		$result = mysqli_query($conn, $query);

		//display success message
		echo "<font color='green'>Edit  Data successfully.";
		header("Location: data.php");
	}
}
?>
<?php
//getting id from url
$username = $_GET['username'];
$radiobtn=$rd1=$rd2="";

//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM student_faculty WHERE username='$username'");

while($res = mysqli_fetch_array($result))
{
	$username = $res['Username'];
	$name = $res['Name'];
	$DOB = $res['DOB'];
	$address = $res['Address'];
	$email = $res['Email'];
	$gender = $res['Gender'];
	
	$dept = $res['Dept'];
	}
?>
<html>
<head>	
	<title>Edit Data</title>
	
</head>


<body>
<h2> Edit Profile</h2>
	
	<br/><br/>
	
	<form action="" method="post" name="form1">
		<table border="0">
			<tr> 
				<td> <label for="username"> UserName:</label></td>
				<td><input type="text" name="username" value="<?php echo $username;?>"></td>
			</tr>
			<tr> 
				<td>  <label for="name">Name:</label></td>
				<td><input type="text" name="name" value="<?php echo $name;?>"></td>
			</tr>
			<tr> 
				<td><label for="gender"> Gender:</label></td>
				
            <td> <input type="radio" name="gender" value="Male"
<?php echo $rd1;?>><label> Male</label><br /></td>
            <td> <input type="radio" name="gender" value="Female"<?php echo $rd2;?>><label> Female</label><br /></td>
				
			</tr>
			<tr> 
				<td><label for="DOB">DOB:</label></td>
				<td><input type="text" name="DOB" value="<?php echo $DOB;?>"></td>
			</tr>
			<tr> 
				<td><label for="address">Address:</label></td>
				<td><input type="text" name="address" value="<?php echo $address;?>"></td>
			</tr>
			<tr> 
				<td> <label for="email">Email:</label></td>
				<td><input type="text" name="email" value="<?php echo $email;?>"></td>
			</tr>
			<tr> 
				<td><label for="dept">Dept:</label></td>
				<td><input type="text" name="dept" value="<?php echo $dept;?>"></td>
			</tr>
			
			
			<tr>
				<td><input type="hidden" name="username" value=<?php echo $_GET['username'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
