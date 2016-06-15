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
        $sql="SELECT * FROM wishlist WHERE ProductID='$productId' and AccountID='$accountId'";
        $result = mysqli_query($conn, $sql);
        // Mysql_num_row is counting table row
        $count=mysqli_num_rows($result);

        // If result matched $username and $password, table row must be 1 row
        if ($count==1) {
            $_SESSION['errors'] = array("Product reeds toegevoegd aan de wishlist.");
        } else {
            //query uitvoeren die het id in de wishlist tabel zet 
            $sql="INSERT INTO wishlist(`ProductID`,`AccountID`) VALUES ('$productId','$accountId')";
            if(mysqli_query($conn, $sql)) {
                $_SESSION['errors'] = array("Product succesvol toegevoegd aan de wishlist.");
            }
            else {
                $_SESSION['errors'] = array("Er ging iets mis. Probeer opnieuw.");
            }
        }
    }
    else {
        // zo niet, geef melding je moet inloggen
        $_SESSION['errors'] = array("Je bent niet ingelogd.");
    }
}
else {
   $_SESSION['errors'] = array("Er ging iets mis. Probeer opnieuw.");
}

 header('location:../index.php');
