
<?php
$servername = "localhost";
$user = "root";
$pass = "";
$database="library_management_system";
// Create connection
$conn = new mysqli($servername, $user, $pass,$database);
// Check connection

if(isset($_POST['update'])) {	
	
	$ISBN =  mysqli_real_escape_string($conn, $_GET['ISBN']);
	$Title = mysqli_real_escape_string($conn, $_POST['Title']);
	$Cost = mysqli_real_escape_string($conn, $_POST['Cost']);
	$Edition = mysqli_real_escape_string($conn, $_POST['Edition']);
	$Publisher = mysqli_real_escape_string($conn, $_POST['Publisher']);
	$CopyYr = mysqli_real_escape_string($conn, $_POST['CopyYr']);
	$ShelfID = mysqli_real_escape_string($conn, $_POST['ShelfID']);
    $SubName = mysqli_real_escape_string($conn, $_POST['SubName']);
	
	// checking empty fields
	if (empty($ISBN) || empty($Title) || empty($Cost)|| empty($Edition)
		|| empty($Publisher) || empty($CopyYr) || empty($ShelfID) || empty($SubName)) {
				
				
		if(empty($ISBN)) {
			echo "<font color='red'>ISBN field is empty.</font><br/>";
		}
		
		if(empty($Title)) {
			echo "<font color='red'>Title field is empty.</font><br/>";
		}
		
		if(empty($Cost)) {
			echo "<font color='red'>Cost field is empty.</font><br/>";
		}
		
		
		if(empty($Edition)) {
			echo "<font color='red'>Edition field is empty.</font><br/>";
		}
		
		if(empty($Publisher)) {
			echo "<font color='red'>Publisher field is empty.</font><br/>";
		}
		
		if(empty($CopyYr)) {
			echo "<font color='red'>CopyYr field is empty.</font><br/>";
		}
		
		if(empty($ShelfID)) {
			echo "<font color='red'>ShelfID field is empty.</font><br/>";
		}
		if(empty($SubName)) {
			echo "<font color='red'>SubName field is empty.</font><br/>";
		}
		
		
		//link to the previous page
		//echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database
		$query ="UPDATE book SET ISBN='$ISBN', Title='$Title', Cost='$Cost'
		,Edition='$Edition',Publisher='$Publisher',CopyYr='$CopyYr',ShelfID='$ShelfID',SubName='$SubName' WHERE ISBN='$ISBN'";
		
		//echo $query;
		$result = mysqli_query($conn, $query);

		//display success message
		echo "<font color='green'>Edit  Data successfully.";
		header("Location: showbook.php");
	}
}
?>
<?php
//getting id from url
$ISBN = $_GET['ISBN'];


//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM book WHERE ISBN='$ISBN'");

while($res = mysqli_fetch_array($result))
{
	$ISBN = $res['ISBN'];
	$Title = $res['Title'];
	$Cost = $res['Cost'];
	$Edition = $res['Edition'];
	$Publisher = $res['Publisher'];
	$CopyYr = $res['CopyYr'];
	$ShelfID = $res['ShelfID'];
	$SubName = $res['SubName'];
	}
?>
<html>
<head>	
	<title>Edit Data</title>
	<link rel="stylesheet" type="text/css" href="libstyle.css"></link>
</head>


<body>
<h2> Edit Books Detail</h2>
	
	<br/><br/>
	
	<form action="" method="post" name="form1">
		<table border="0">
			<tr> 
				<td> <label for="ISBN"> ISBN:</label></td>
				<td><input type="text" name="ISBN" value="<?php echo $ISBN;?>"></td>
			</tr>
			<tr> 
				<td>  <label for="Title">Title:</label></td>
				<td><input type="text" name="Title" value="<?php echo $Title;?>"></td>
			</tr>
		
			<tr> 
				<td><label for="Cost">Cost:</label></td>
				<td><input type="text" name="Cost" value="<?php echo $Cost;?>"></td>
			</tr>
			<tr> 
				<td><label for="Edition">Edition:</label></td>
				<td><input type="text" name="Edition" value="<?php echo $Edition;?>"></td>
			</tr>
			<tr> 
				<td> <label for="Publisher">Publisher:</label></td>
				<td><input type="text" name="Publisher" value="<?php echo $Publisher;?>"></td>
			</tr>
			<tr> 
				<td><label for="CopyYr">CopyYr:</label></td>
				<td><input type="text" name="CopyYr" value="<?php echo $CopyYr;?>"></td>
			</tr>
			<tr> 
				<td><label for="ShelfID">ShelfID:</label></td>
				<td><input type="text" name="ShelfID" value="<?php echo $ShelfID;?>"></td>
			</tr>
			<tr> 
				<td><label for="SubName">SubName:</label></td>
				<td><input type="text" name="SubName" value="<?php echo $SubName;?>"></td>
			</tr>
			
			
			<tr>
				<td><input type="hidden" name="ISBN" value="<?php echo $_GET['ISBN'];?>"></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
