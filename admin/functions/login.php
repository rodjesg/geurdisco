<?php
ob_start();
session_start();
require "../includes/dbconnect.php";

// Define $username and $password 
$username = $_POST['username'];
$password = $_POST['password'];

// To protect MySQL injection (more detail about MySQL injection)
$username = stripslashes($username);
$password = stripslashes($password);
//$username = mysqli_real_escape_string($username);
//$password = mysqli_real_escape_string($password);

echo $username; echo $password;

$sql="SELECT * FROM manager WHERE Email='$username' and Password='$password'";
$result = mysqli_query($conn, $sql);
// Mysql_num_row is counting table row

if ($result) {
    $count=mysqli_num_rows($result);
    $accountInfo = $result->fetch_array(true);
    // If result matched $username and $password, table row must be 1 row
    if ($count==1) {
        // create login sessions
        $_SESSION['admin']['status'] = true;
        $_SESSION['admin']['accountInfo'] = $accountInfo;
        header('location:../pages/dashboard.php');
    } else {
        echo "Inloggen mislukt!";
    }
}
else {
    echo "Inloggen mislukt!";
}

exit();

?>