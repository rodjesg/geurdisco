<?php
ob_start();
session_start();

// Server settings // Let op op mac wordt er gebruik gemaakt van een wachtwoord. Windows niet!!!
$servername = "127.0.0.1";
$username = "root";
$password = "root";
$database = "geurdiscounter";


// Create connection
$conn = new mysqli($servername, $username, $password, $database);

echo "<pre>";
print_r($_POST);
echo "</pre>";

// Check connection
if ($conn->connect_error) {
    echo "test";
    die("Connection failed: " . $conn->connect_error);
}

// Define $username and $password 
$username=$_POST['email']; 
$password=$_POST['password'];


// To protect MySQL injection (more detail about MySQL injection)
//$username = stripslashes($username);
//$password = stripslashes($password);
//$username = mysql_real_escape_string($username);
//$password = mysql_real_escape_string($password);

$sql="SELECT * FROM account WHERE Email='$username' and Password='$password'";
echo "<p>".$sql."</p>";
$result=mysqli_query($conn, $sql);

// Mysql_num_row is counting table row
$count=mysqli_num_rows($result);

// If result matched $username and $password, table row must be 1 row
if ($count==1) {
    // create login sessions
    $_SESSION['login']['status'] = true;
    $_SESSION['login']['account'] = $username;
    header('location:../index.php');
} else {
    echo "Unsuccessful, Your account does not exisist! $count";
}


?>