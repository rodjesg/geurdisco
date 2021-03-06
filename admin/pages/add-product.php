<?php
$title = "Add product";
include '../includes/header.php';
?>

<style>
    header{
        position: relative;
        top: 5px;
        margin: 15px 15px 20px 15px;
        height: 160px;
        background-color: crimson;
        text-align: left center;
        padding-top: 2px;
        padding-left: 35px;
        color: white;
        border-radius: 5px;
    }

    h1{
        text-align: center;
        padding-top: 30px;
    }

    h3{
        text-align: center;
    }

    aside {
        position: relative;
        margin-right: 15px;
        background-color: darkcyan;
        height: 40px;
        margin: 15px 10px 15px 15px;
        border-radius: 5px;
        padding-top: 30px;
        padding-left: 20px;
    }

    aside a{
        display: inline;
        color: darkseagreen;
        padding-right: 20px;
        text-decoration: none;
    }

    aside a:hover{
        background: white;
    }

    select{
        padding: 12px 20px;
        width: 150px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }


    input[type=text] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[type=file] {
        padding: 12px 20px 12px 0px;
    }

    input[type=text]:focus {
        background-color: lightblue;
    }

    .ProductToevoegen{
        background: darkturquoise;
    }

    .form{
        width: 60%;
        padding: 12px 20px;
        margin: auto auto;
        float: center;
    }

    label{

        font-weight: bold;
    }
</style>
<?php

include '../includes/menu.php';

?>
<main>
    <div class="form">
        <form class="ProductToevoegen" action="../functions/add-product.php" method="post" enctype="multipart/form-data" id="usrform" >
            <h3>Product toevoegen</h3>
            <label for="product naam">Product naam:</label><br>
            <input type="text" name="ProductNaam"><br>
            <label for="prijs">Prijs:</label><br>
            <input type="text" name="Prijs"><br>
            <label for="btw">BTW percentage: </label><br>
            <select name="btw">
                <option value="21">21%</option>
                <option value="6">6%</option>
                <option value="0">Geen</option>
            </select><br>
            <label for="voorraad">Aantal in voorraad:</label><br>
            <input type="text" name="voorraad"><br>
            <label for="merk">Merk: </label><br>
            <select name="merk">
                <?php
                $query = "SELECT * FROM brand;";
                $result = mysqli_query($conn,$query);
                while ($row = $result->fetch_array(true)) {
                    echo "<option value='".$row['BrandID']."'>".$row['BrandName']."</option>";
                }
                ?>
            </select><br>
            <label for="Text">Categorie:</label><br>
            <select name="categorie">
                <?php
                $query = "SELECT * FROM `text` JOIN `category` ON `text`.`TextID` = `category`.`TextID`";
                $result = mysqli_query($conn,$query);
                while ($row = $result->fetch_array(true)) {
                    echo "<option value='".$row['TextID']."'>".$row['NL']."</option>";
                }
                ?>
            </select><br>
            <label for="Text">Subcategorie:</label><br>
            <select name="subcategorie">
                <?php
                $query = "SELECT * FROM `text` JOIN `subcategory` ON `text`.`TextID` = `subcategory`.`TextID`";
                $result = mysqli_query($conn,$query);
                while ($row = $result->fetch_array(true)) {
                    echo "<option value='".$row['SubCategoryID']."'>".$row['NL']."</option>";
                }
                ?>
            </select><br>
            <label for="afbeelding">Voeg afbeelding toe:</label><br>
            <input type="file" name="afbeelding" id="afbeelding"><br>
            <label for="Text">Begeleidende tekst product:</label><br>
            <textarea rows="6" cols="70" name="tekst" form="usrform"></textarea><br>
            <label for="Text">Begeleidende tekst product Engels:</label><br>
            <textarea rows="6" cols="70" name="tekstEN" form="usrform"></textarea><br>
            <input type="submit" class="button">

        </form>
    </div>
</main>

<?php
    include '../includes/footer.php';
?>