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
        $sql="SELECT * FROM wishlist WHERE ProductID='$productId' and AccountID='$accountId'";
        $result = mysqli_query($conn, $sql);
        // Mysql_num_row is counting table row
        $count=mysqli_num_rows($result);

        // If result matched $username and $password, table row must be 1 row
        if ($count==1) {
            echo "product reeds gekoppeld";
            die();
        } else {
            //query uitvoeren die het id in de wishlist tabel zet 
            $sql="INSERT INTO wishlist(`ProductID`,`AccountID`) VALUES ('$productId','$accountId')";
            if(mysqli_query($conn, $sql)) {
                echo "als het goed is ingevoerd";
            }
            else {
                echo "Het is niet gelukt. Geen idee waarom";
            }
        }
    }
    else {
        // zo niet, geef melding je moet inloggen
        echo "je moet eerst inloggen";
    }
}
else {
    echo "foute url";
}

