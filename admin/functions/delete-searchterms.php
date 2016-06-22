<?php
ob_start();
session_start();
require "../includes/dbconnect.php";


//Zoektermen verwijderen

$zoekAlles = $_POST['zoektermAll'];
$zoekGeenResultaat = $_POST['zoektermNoResult'];


//1. check of alle zoektermen verwijderd mogen worden:

if ($_POST['zoektermAll'] == "ja") {
    
   $sql = "DELETE FROM `searchterm` WHERE `Result` >= 0;";
   $result = mysqli_query($conn,$sql); 
   echo nl2br ("Alle zoektermen zijn succesvol verwijderd!\n\n");
   $text = '<a href=../pages/dashboard.php "target="_blank">Klik hier om terug te gaan</a>';
   echo $text;
}

//2. check of alleen de zoektermen die geen resultaat opleveren verwijderd mogen worden.
if ($_POST['zoektermNoResult'] == "ja") {
   $sql = "DELETE FROM `searchterm` WHERE `Result` = 0;";
   $result = mysqli_query($conn,$sql); 
   echo nl2br ("Alle zoektermen zonder resultaat zijn succesvol verwijderd!\n\n");
   $text = '<a href="../pages/dashboard.php" "target="_blank">Klik hier om terug te gaan</a>';
   echo $text;
    
}



?>









