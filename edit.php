<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	
	$studentid=$_POST['studentid'];
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$gender=$_POST['gender'];
	$birthdate=$_POST['birthdate'];
	$address=$_POST['address'];
	$contact=$_POST['contact'];
	
	// checking empty fields
	if(empty($fname) || empty($lname) || empty($gender) || empty($birthdate) || empty($address) || empty($contact)) {
				
		if(empty($fname)) {
			echo "<font color='red'>First Name field is empty.</font><br/>";
		}
		
		if(empty($lname)) {
			echo "<font color='red'>Last Name field is empty.</font><br/>";
		}
		if(empty($gender)) {
			echo "<font color='red'>Gender field is empty.</font><br/>";
		}
		
		if(empty($birthdate)) {
			echo "<font color='red'>Birth Date field is empty.</font><br/>";
		}
		
		if(empty($address)) {
			echo "<font color='red'>Address field is empty.</font><br/>";
		}
		if(empty($contact)) {
			echo "<font color='red'>Contact field is empty.</font><br/>";
		}
	} else {	
		//updating the table
		$sql = "UPDATE tbl_student SET fname=:fname, lname=:lname, gender=:gender, birthdate=:birthdate, address=:address, contact=:contact WHERE studentid=:studentid";
		$query = $dbConn->prepare($sql);
		
		$query->bindparam(':studentid', $studentid);
		$query->bindparam(':fname', $fname);
		$query->bindparam(':lname', $lname);
		$query->bindparam(':gender', $gender);
		$query->bindparam(':birthdate', $birthdate);
		$query->bindparam(':address', $address);
		$query->bindparam(':contact', $contact);
		$query->execute(array(':studentid' => $studentid, ':fname' => $fname, ':lname' => $lname, ':gender' => $gender, ':birthdate' => $birthdate, ':address' => $address, ':contact' => $contact));
		
		// Alternative to above bindparam and execute
		// $query->execute(array(':id' => $id, ':name' => $name, ':email' => $email, ':age' => $age));
				
		//redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['studentid'];

//selecting data associated with this particular id
$sql = "SELECT * FROM tbl_student WHERE studentid=:studentid";
$query = $dbConn->prepare($sql);
$query->execute(array(':studentid' => $studentid));

while($row = $query->fetch(PDO::FETCH_ASSOC))
{
	$fname = $row['fname'];
	$lname = $row['lname'];
	$gender = $row['gender'];
	$birthdate = $row['birthdate'];
	$address = $row['address'];
	$contact = $row['contact'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
		<nav class="navbar navbar-inverse">
  <ul class="nav navbar-nav">
    <li><a href="add.html">Student Table</a></li>
     <li><a href="add2.php">Class Table</a></li>
   
  </ul>

</nav>
	<a href="index.php">Home</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0" class="table table-bordered">
			<tr> 
				<td>First Name</td>
				<td><input type="text" name="fname" value="<?php echo $fname;?>"></td>
			</tr>
			<tr> 
				<td>Last Name</td>
				<td><input type="text" name="lname" value="<?php echo $lname;?>"></td>
			</tr>
			<tr> 
				<td>Gender</td>
				<td><input type="text" name="gender" value="<?php echo $gender;?>"></td>
			</tr>
			<tr> 
				<td>Birth Date</td>
				<td><input type="text" name="birthdate" value="<?php echo $birthdate;?>"></td>
			</tr>
			<tr> 
				<td>Address</td>
				<td><input type="text" name="address" value="<?php echo $address;?>"></td>
			</tr>
			<tr> 
				<td>Contact</td>
				<td><input type="text" name="contact" value="<?php echo $contact;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="studentid" value=<?php echo $_GET['studentid'];?>></td>
				<td><input type="submit" name="update" value="Update" class="btn btn-danger"></td>
			</tr>
		</table>
	</form>
</body>
</html>
