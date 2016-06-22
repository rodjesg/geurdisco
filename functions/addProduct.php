<?php
ob_start();
session_start();
require "../includes/dbconnect.php";


//Product toevoegen via CMS

$naam = $_POST['ProductNaam'];
$prijs = $_POST['Prijs'];
$btw = $_POST['btw'];
$voorraad = $_POST['voorraad'];
$merk = $_POST['merk'];
$categorie = $_POST['categorie'];
$subcategorie= $_POST['subcategorie'];
$tekst = $_POST['tekst'];
$tekstEN = $_POST['tekstEN'];

//1. check of alle velden zijn gevuld

if ($_POST['ProductNaam'] == "" || $_POST['Prijs'] == "" || $_POST['btw'] == "" || $_POST['voorraad'] == "" || $_POST['merk'] == "") {   
    header('location:../admin/productAdd.php');
    die();
}


//2. check of prijs een getal is

 if (is_numeric($prijs)) {
        echo "";
    } 

else {
        echo "Er moet een getal bij Prijs worden ingevuld!";
        exit();
}

//3. check of voorraad een integer is

//4. check of product al bestaat
$sql = "SELECT * FROM `product` WHERE `ProductName` = '$naam';";
$result = mysqli_query($conn,$sql);
$count = mysqli_num_rows($result);

if ($count > 0){
echo "Product komt reeds voor!";
exit();
}

//4.upload script afbeelding

$target_dir = "../files/products/";
$target_file = $target_dir . basename($_FILES["afbeelding"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["afbeelding"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "Bestand is geen afbeelding";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Bestand bestaat al!";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["afbeelding"]["size"] > 500000) {
    echo "Het bestand is te groot!";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Alleen JPG, JPEG, PNG & GIF files is toegestaan";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Je bestand is niet geupload!";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["afbeelding"]["tmp_name"], $target_file)) {
        echo "Het bestand". basename( $_FILES["afbeelding"]["name"]). " is geupload";
    } 
    
    else {
        echo "Er is iets verkeerds gegaan met het uploaden.";
        exit();
    }
}

$afbeelding = $target_file;


//5. voer query in DB TextID
$sql = "INSERT INTO `text` (`EN`, `NL`) VALUES ('$tekstEN','$tekst');";
$result = mysqli_query($conn,$sql);

//6. krijg textID van zojuist ingevoerde text
$tekstID = mysqli_insert_id($conn);

//7. voer query in DB Product
$sql = "INSERT INTO `product` (`ProductName`, `Price`, `BTW`, `Stock`, `BrandID`,`SubCategoryID`,`CategoryID`,`TextID`,`ProductImage`) VALUES ('$naam',$prijs,$btw,$voorraad,$merk,$subcategorie,$categorie,$tekstID,'$afbeelding');";
$result = mysqli_query($conn,$sql);

echo nl2br ("Product is succesvol toegevoegd!!\n\n");
$text = '<a href=../admin/ProductAdd.php "target="_blank">Klik hier om terug te gaan</a>';
echo $text;

?>









