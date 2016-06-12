<?php
session_start();
ob_start();
$servername = "127.0.0.1";
$username = "root";
$password = "";
$database = "geurdiscounter";

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
        $sql="DELETE FROM wishlist WHERE ProductID='$productId' and AccountID='$accountId'";
        if (mysqli_query($conn, $sql)) {
             $_SESSION['errors'] = array("Product succesvol van de wishlist verwijderd");
        }
        else {
             $_SESSION['errors'] = array("Er ging iets mis");
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
header('location:../pages/wishlist.php');
