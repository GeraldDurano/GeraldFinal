<?php
session_start();
if(!isset($_SESSION['user'])){
    header("location:login.php");
}
else{
    echo "This is INDEx,welcome {$_SESSION['nickname']} <br/>";
    echo "<a href=\"add.html\">Add New User</a> | ";
    echo "<a href=\"logout.php\">LOG-OUT</a>";
}

?>