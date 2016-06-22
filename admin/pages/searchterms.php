<?php
$title = "Delete srarchterm";
require '../includes/dbconnect.php';
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

    aside{
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

    .ZoektermenBeheren{
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
        <form class="ZoektermenBeheren" action="../functions/delete-searchterms.php" method="post">
            <fieldset>
                <h3>Zoektermen verwijderen</h3>
                <label for="zoektermAll">Alle zoektermen verwijderen?</label><br>
                <select name="zoektermAll">
                    <option value="nee">Nee</option>
                    <option value="ja">Ja</option>
                </select><br>
                <label for="zoektermNoResult">Zoektermen verwijderen welke geen resultaten opleverd?</label><br>
                <select name="zoektermNoResult">
                    <option value="ja">Ja</option>
                    <option value="nee">Nee</option>
                </select><br>
                <button type="submit" class="button">Verwijder zoektermen</button>
            </fieldset>
        </form>
    </div>
</main>

<?php
include '../includes/footer.php';
?>