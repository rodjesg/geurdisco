<?php
session_start();
ob_start();
require "../includes/dbconnect.php";

if ($_GET["ProductId"] && is_numeric($_GET["ProductId"])){
    $productId = $_GET["ProductId"];
        
    // check of gebruiker is ingelogd
    if (isset($_SESSION['login']) && $_SESSION['login']['status'] == true) {  
        
        // zo ja, haal gebruiker id op (staat in session) 
        $accountId = $_SESSION['login']['accountInfo']['AccountID'];
        
        // check if product al aan gebruiker gekoppeld
        $sql="DELETE FROM wishlist WHERE ProductID='$productId' and AccountID='$accountId'";
        if (mysqli_query($conn, $sql)) {
             $_SESSION['errors'] = array("Product succesvol van de wishlist verwijderd.");
        }
        else {
             $_SESSION['errors'] = array("Er ging iets mis. Probeer opnieuw.");
        }
    }
    else {
        // zo niet, geef melding je moet inloggen
        $_SESSION['errors'] = array("Log in om gebruik te maken van de wishlist.");
    }
}

header('location:../pages/wishlist.php');
exit();
?>
