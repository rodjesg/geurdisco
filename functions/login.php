<?php
ob_start();
session_start();
require "../includes/dbconnect.php";

// Define $username and $password 
$username = $_POST['email'];
$password = $_POST['password'];

// To protect MySQL injection (more detail about MySQL injection)
//$username = stripslashes($username);
//$password = stripslashes($password);
//$username = mysql_real_escape_string($username);
//$password = mysql_real_escape_string($password);

$sql="SELECT * FROM account WHERE Email='$username' and Password='$password'";
$result = mysqli_query($conn, $sql);
$accountInfo = $result->fetch_array(true);

// Mysql_num_row is counting table row
$count=mysqli_num_rows($result);

// If result matched $username and $password, table row must be 1 row
if ($count==1) {
    // create login sessions
    $_SESSION['login']['status'] = true;
    $_SESSION['login']['accountInfo'] = $accountInfo;
    $_SESSION['errors'] = array("Welkom terug, $accountInfo[SureName]!");
} else {
    $_SESSION['errors'] = array("Inloggen mislukt.");
}

header('location:../index.php');


?>
