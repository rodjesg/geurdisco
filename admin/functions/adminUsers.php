<?php
ob_start();
session_start();
require "../includes/dbconnect.php";


//Admin users email veranderen

$mail = $_POST['mail'];
$gebruiker = $_POST['gebruikers'];


//1. check of alle velden zijn gevuld

if ($_POST['mail'] == "" || $_POST['confirmMail'] == "") {   
   echo nl2br ("niet alle velden zijn ingevuld\n\n");
   $text = '<a href=../admin/users.php "target="_blank">Klik hier om terug te gaan</a>';
   echo $text;
    die();
}

//2. check if confirm velden overeenkomen
if($_POST["mail"] !== $_POST["confirmMail"]) {
echo nl2br ("velden komen niet overeen!\n\n");
$text = '<a href=../admin/users.php "target="_blank">Klik hier om terug te gaan</a>';
echo $text;
die();      
}

//4. check of email reeds bestaat
$sql = "SELECT * FROM `manager` WHERE `Email` = '$gebruiker';";
$result = mysqli_query($conn,$sql);
$count = mysqli_num_rows($result);

if ($count > 0){
echo nl2br ("Email komt reeds voor!\n\n");
$text = '<a href=../admin/users.php "target="_blank">Klik hier om terug te gaan</a>';
echo $text;
exit();
}


//5. voer query in DB
$sql = "UPDATE `manager` SET `Email`='$mail' WHERE `ManagerID` = $gebruiker;";
$result = mysqli_query($conn,$sql);

echo nl2br ("Accountwijzingen succesvol aangepast!\n\n");
$text = '<a href=../admin/admin.php "target="_blank">Klik hier om terug te gaan</a>';
echo $text;


?>









