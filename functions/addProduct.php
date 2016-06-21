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

//1. check of alle velden zijn gevuld

if ($_POST['ProductNaam'] == "" || $_POST['Prijs'] == "" || $_POST['btw'] == "" || $_POST['voorraad'] == "" || $_POST['merk'] == "") {   
    echo "niet alle velden zijn ingevuld";
    die();
}


//2. check of prijs een getal is

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
$target_file = $target_dir . basename($_FILES["afbeelding"]["afbeelding"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["afbeelding"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}


//5. voer query in DB
$sql = "INSERT INTO `product` (`ProductName`, `Price`, `BTW`, `Stock`, `BrandID`,`SubCategoryID`,`CategoryID`) VALUES ('$naam',$prijs,$btw,$voorraad,$merk,$subcategorie,$categorie);";
$result = mysqli_query($conn,$sql);


?>









