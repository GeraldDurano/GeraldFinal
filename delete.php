<?php
//including the database connection file
include("config.php");

//getting id of the data from url
$studentid = $_GET['studentid'];

//deleting the row from table
$sql = "DELETE FROM tbl_student WHERE studentid=:studentid";
$query = $dbConn->prepare($sql);
$query->execute(array(':studentid' => $studentid));

//redirecting to the display page (index.php in our case)
header("Location:index.php");
?>
