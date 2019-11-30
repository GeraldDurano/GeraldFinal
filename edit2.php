<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	
	$id=$_POST['id'];
	$classcode=$_POST['classcode'];
	$subjectcode=$_POST['subjectcode'];
	$time=$_POST['time'];
	$teacher=$_POST['teacher'];
	
	// checking empty fields
	if(empty($classcode) || empty($subjectcode) || empty($time) || empty($teacher)) {
				
		if(empty($classcode)) {
			echo "<font color='red'>Class Code field is empty.</font><br/>";
		}
		
		if(empty($subjectcode)) {
			echo "<font color='red'>Subject Code field is empty.</font><br/>";
		}
		if(empty($time)) {
			echo "<font color='red'>Time field is empty.</font><br/>";
		}
		
		if(empty($teacher)) {
			echo "<font color='red'>Teacher field is empty.</font><br/>";
		}

	} else {	
		//updating the table
		$sql = "UPDATE tbl_class SET classcode=:classcode, subjectcode=:subjectcode, time=:time, teacher=:teacher WHERE id=:id";
		$query = $dbConn->prepare($sql);
		
		$query->bindparam(':id', $id);
		$query->bindparam(':classcode', $classcode);
		$query->bindparam(':subjectcode', $subjectcode);
		$query->bindparam(':time', $time);
		$query->bindparam(':teacher', $teacher);
		$query->execute(array(':id' => $id, ':classcode' => $classcode, ':subjectcode' => $subjectcode, ':time' => $time, ':teacher' => $teacher));
		
		// Alternative to above bindparam and execute
		// $query->execute(array(':id' => $id, ':name' => $name, ':email' => $email, ':age' => $age));
				
		//redirectig to the display page. In our case, it is index.php
		header("Location: index2.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$sql = "SELECT * FROM tbl_class WHERE id=:id";
$query = $dbConn->prepare($sql);
$query->execute(array(':id ' => $id));

while($row = $query->fetch(PDO::FETCH_ASSOC))
{
	$classcode = $row['classcode'];
	$subjectcode = $row['subjectcode'];
	$time = $row['time'];
	$teacher = $row['teacher'];
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
	<a href="index2.php">Home</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit2.php">
		<table border="0">
			<tr> 
				<td>Class Code</td>
				<td><input type="text" name="classcode" value="<?php echo $classcode;?>"></td>
			</tr>
			<tr> 
				<td>Subject Code</td>
				<td><input type="text" name="subjectcode" value="<?php echo $subjectcode;?>"></td>
			</tr>
			<tr> 
				<td>Time</td>
				<td><input type="text" name="time" value="<?php echo $time;?>"></td>
			</tr>
			<tr> 
				<td>Teacher</td>
				<td><input type="text" name="teacher" value="<?php echo $teacher;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
