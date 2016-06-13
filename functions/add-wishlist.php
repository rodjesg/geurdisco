<?php
session_start();
ob_start();
include "../includes/dbconnect.php";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
 

if ($_GET["ProductId"] && is_numeric($_GET["ProductId"])){
    $productId = $_GET["ProductId"];
        
    // check of gebruiker is ingelogd
    if (isset($_SESSION['login']) && $_SESSION['login']['status'] == true) {  
        
        // zo ja, haal gebruiker id op (staat in session) 
        $accountId = $_SESSION['login']['accountInfo']['AccountID'];
        
        // check if product al aan gebruiker gekoppeld
        $sql="SELECT * FROM wishlist WHERE ProductID='$productId' and AccountID='$accountId'";
        $result = mysqli_query($conn, $sql);
        // Mysql_num_row is counting table row
        $count=mysqli_num_rows($result);

        // If result matched $username and $password, table row must be 1 row
        if ($count==1) {
            $_SESSION['errors'] = array("Product reeds gekoppeld");
        } else {
            //query uitvoeren die het id in de wishlist tabel zet 
            $sql="INSERT INTO wishlist(`ProductID`,`AccountID`) VALUES ('$productId','$accountId')";
            if(mysqli_query($conn, $sql)) {
                $_SESSION['errors'] = array("Als het goed is ingevoerd");
            }
            else {
                $_SESSION['errors'] = array("Niet gelukt, geen idee waarom");
            }
        }
    }
    else {
        // zo niet, geef melding je moet inloggen
        $_SESSION['errors'] = array("Je moet eerst inloggen");
    }
}
else {
   $_SESSION['errors'] = array("Foute url");
}

 header('location:../index.php');
