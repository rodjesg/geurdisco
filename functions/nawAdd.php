<?php
ob_start();
session_start();
require "../includes/dbconnect.php";

// PHP code om account credentials in te voeren (account):

//1. check if alle velden zijn ingevuld
if ($_POST['email'] == "" || $_POST['emailConfirm'] == "" || $_POST['password'] == "" || $_POST['passwordConfirm'] == "" || $_POST['voornaam'] == "" || $_POST['achternaam'] == "" || $_POST['geboortedatum'] == "" || $_POST['adres'] == "" || $_POST['postcode'] == "" || $_POST['huisnr'] == "" || $_POST['woonplaats'] == "" || $_POST['telefoon'] == "") {   
$_SESSION['errors'] = array("Niet alle velden zijn ingevuld!");
header('location:../pages/account.php');
exit();
          
}

if (strlen($_POST['geboortedatum']) > 10) {
$_SESSION['errors'] = array("Geboortedatum is niet juist ingevuld!");
header('location:../pages/account.php');
exit();
}

//2. check if confirm velden overeenkomen
if($_POST["email"] !== $_POST["emailConfirm"]) {
$_SESSION['errors'] = array("E-mail komt niet overeen!");
header('location:../pages/account.php');
exit();      
}

if($_POST["password"] !== $_POST["passwordConfirm"]) {
 $_SESSION['errors'] = array("Wachtwoorden komen niet overeen!");
header('location:../pages/account.php');
exit();
 
}

$email = $_POST["email"];
$password = $_POST["password"];

//3. check if username aanwezig in db, zo niet verder naar stap 4
$sql = "SELECT * FROM `account` WHERE `Email` = '$email';";
$result = mysqli_query($conn,$sql);
$count = mysqli_num_rows($result);

if ($count > 0){
$_SESSION['errors'] = array("E-mail komt reeds voor!");
header('location:../pages/account.php');
exit();
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
$land = $_POST['land'];
   
 $sql = "INSERT INTO `account` (`SureName`, `Name`, `Insertion`, `Address`, `Nr`, `Addition`, `PostCode`, `City`, `Phone`, `BirthDate`, `Email`, `Password`,`CountryID`) VALUES ('$voornaam','$achternaam','$tussenvoegsel','$adres','$huisnr','$huisnrToev','$postcode','$woonplaats','$telefoon','$geboortedatum','$email','$password','$land');";
 $result = mysqli_query($conn,$sql);

$_SESSION['errors'] = array("Account succesvol aangemaakt!");

header('location:../index.php');
exit();
?>


