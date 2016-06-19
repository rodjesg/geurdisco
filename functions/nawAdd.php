<?php

require "../includes/dbconnect.php";

// PHP code om account credentials in te voeren (account):

//1. check if alle velden zijn ingevuld
if ($_POST['email'] == "" || $_POST['emailConfirm'] == "" || $_POST['password'] == "" || $_POST['passwordConfirm'] == "" || $_POST['voornaam'] == "" || $_POST['achternaam'] == "" || $_POST['geboortedatum'] == "" || $_POST['adres'] == "" || $_POST['postcode'] == "" || $_POST['huisnr'] == "" || $_POST['woonplaats'] == "" || $_POST['telefoon'] == "") {
    echo "Niet alle velden zijn ingevuld";
    die();        
}

if (strlen($_POST['geboortedatum']) > 10) {
    echo "geboortedatum is niet juist ingevuld!";
    die();
}

//2. check if confirm velden overeenkomen
if($_POST["email"] !== $_POST["emailConfirm"]) {
    echo "E-mail komt niet met elkaar overeen!";
    die();      
}

if($_POST["password"] !== $_POST["passwordConfirm"]) {
    echo "Wachtwoord komt niet met elkaar overeen!";
    die();       
}

$email = $_POST["email"];
$password = $_POST["password"];

//3. check if username aanwezig in db, zo niet verder naar stap 4
$sql = "SELECT * FROM `account` WHERE `Email` = '$email';";
$result = mysqli_query($conn,$sql);
$count = mysqli_num_rows($result);

if ($count > 0){
    echo "E-mail bestaat al!";
    die();
}

//4. insert query in database
    
$voornaam = $_POST['voornaam'];
$tussenvoegsel = $_POST['tussenvoegsel'];
$achternaam = $_POST['achternaam'];
$geboortedatum = $_POST['geboortedatum'];
$adres = $_POST['adres'];
$postcode = $_POST['postcode'];
$huisnr = $_POST['huisnr'];
$huisnrToev = $_POST['huisnrToev'];
$woonplaats = $_POST['woonplaats'];
$telefoon = $_POST['telefoon'];
    
 $sql = "INSERT INTO `account` (`SureName`, `Name`, `Insertion`, `Address`, `Nr`, `Addition`, `PostCode`, `City`, `Phone`, `BirthDate`, `Email`, `Password`) VALUES ('$voornaam','$achternaam','$tussenvoegsel','$adres','$huisnr','$huisnrToev','$postcode','$woonplaats','$telefoon','$geboortedatum','$email','$password');";
 $result = mysqli_query($conn,$sql);
 echo "Account is succesvol aangemaakt!";

?>


