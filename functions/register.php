<?php

require "../includes/dbconnect.php";

// PHP code om te registeren (account):

//1. check if alle velden zijn ingevuld
if ($_POST['email'] == "" || $_POST['emailConfirm'] == "" || $_POST['password'] == "" || $_POST['passwordConfirm'] == "") {
    echo "Niet alle velden zijn ingevuld";
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
 $sql = "INSERT INTO `account` (`Email`, `Password`) VALUES ('$email','$password');";
 $result = mysqli_query($conn,$sql);
 echo "Account is succesvol aangemaakt!";

?>









