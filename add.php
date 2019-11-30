<html>
<head>
<title>Add Data</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
		
</head>
<style type="text/css">
	a {
    color: #00549c;
    text-decoration: none;
    font-size: 30px;
    text-align: center;
    padding-left: 800px;
    font-family: 'Sigmar One', cursive;
}

	h1 {
    color: #009814;
    text-decoration: none;
    font-size: 30px;
    text-align: center;
    padding-left: 0.1px;
    font-family: 'Sigmar One', cursive;
}
.navbar-inverse .navbar-nav>li>a {
    color: #f10000;
    font-family: initial;
    font-size: x-large;
}
body{
	background-image:url(wall22.jpg);
	background-size: cover;
}
</style>
</style>



<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {	
	$studentid = $_POST['studentid'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$gender = $_POST['gender'];
	$birthdate = $_POST['birthdate'];
	$address = $_POST['address'];
	$contact = $_POST['contact'];
		
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
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database		
		$sql = "INSERT INTO tbl_student(fname, lname, gender, birthdate, address, contact) VALUES(:fname, :lname, :gender, :birthdate, :address, :contact)";
		$query = $dbConn->prepare($sql);
				
		$query->bindparam(':fname', $fname);
		$query->bindparam(':lname', $lname);
		$query->bindparam(':gender', $gender);
		$query->bindparam(':birthdate', $birthdate);
		$query->bindparam(':address', $address);
		$query->bindparam(':contact', $contact);
		$query->execute(array(':fname' => $fname, ':lname' => $lname, ':gender' => $gender, ':birthdate' => $birthdate,':address' => $address, ':contact' => $contact));
		
		// Alternative to above bindparam and execute
		// $query->execute(array(':name' => $name, ':email' => $email, ':age' => $age));
		
		//display success message
		echo "<font color='green'><a>Data added successfully.</a>";
		echo "<br/><a href='index.php'>View Result</a>";
	}
}
?>
</body>
</html>
