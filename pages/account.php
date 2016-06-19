<?php
$title = "Account";
$home = false;
require "../includes/header.php";
require "../includes/dbconnect.php";

?>

    <style>
        * {
            box-sizing: border-box;
        }
        
        h3 {
            text-align: center;
        }
        
        .formlinks {
            width: 100%;
        }
        
        .linksbox {
            border: 1px solid;
            width: 60%;
            padding: 12px 20px;
            margin: 10px 30px 10px auto;
            float: right;
        }
        
        .rechtsbox {
            border: 1px solid;
            width: 60%;
            padding: 12px 20px;
            margin: 10px auto 10px 30px;
            float: left;
        }
        
        input[type=text] {
            width: 100%;
            margin: 8px 0;
        }
        
        input[type=password] {
            width: 100%;
            margin: 8px 0;
        }
        
        label {
            font-size: 8.5pt;
        }

    </style>


    <div class="content">
        <div class="container">
            <div class="row">
                <div class="large-12 columns right">
                    <div class="rechtsbox">
                        <h3>Create an account</h3>
                        <form class="rechts" action="../functions/register.php" method="post">
                            <h5>Account gegevens</h5>
                            <label for="email">E-mail adress *</label>
                            <input type="text" name="email" placeholder="Fill in you're E-mail">
                            <label for="email">Confirm E-mail adress *</label>
                            <input type="text" name="emailConfirm" placeholder="Confirm you're E-mail">
                            <label for="email">Password *</label>
                            <input type="password" name="password" placeholder="Fill in you're password">
                            <label for="email">Confirm password *</label>
                            <input type="password" name="passwordConfirm" placeholder="Confirm you're password">
                            <h5>Persoonlijke gegevens</h5>
                            <label for="surename">Voornaam *</label>
                            <input type="text" name="surename" placeholder="Vul je voornaam in"><br>
                            <label for="insertion">Tussenvoegsel</label>
                            <input type="text" name="insertion" placeholder="Tussenvoegsel"><br>
                            <label for="lastname">Achternaam *</label>
                            <input type="text" name="lastname" placeholder="Achternaam"><br>
                            <label for="birthdate">Geboortedatum *</label>
                            <input type="text" name="birthdate" placeholder="dd-mm-jj"><br>
                            <label for="Telefoon">Telefoonnummer *</label>
                            <input type="text" name="telefoon" placeholder="Vul hier je telefoonnummer in"><br>
                            <h5>Woonplaats / factuuradres</h5>
                            <label for="address">Adres *</label>
                            <input type="text" name="address" placeholder="Vul je adres in"><br>
                            <label for="postcode">Postcode *</label>
                            <input type="text" name="postcode" placeholder="Vul je postcode in"><br>
                            <label for="nr">Huisnummer *</label>
                            <input type="text" name="nr" placeholder="Vul je huisnummer in"><br>
                            <label for="addition">Huisnummer toevoeging</label>
                            <input type="text" name="addition" placeholder="Eventuele toevoeging"><br>
                            <label for="city">Woonplaats *</label>
                            <input type="text" name="city"placeholder="Vul je woonplaats in"><br>
                            <label for="country">Land *</label>
                            <select name="country">
                                <?php
                                $query = "SELECT * FROM country";
                                $result = mysqli_query($conn,$query);
                                while ($row = $result->fetch_array(true)) {
                                    echo "<option value='".$row['CountryID']."'>".$row['Name']."</option>";
                                }
                                ?>
                            </select>
                            <button type="submit" class="button">Register <span class="fa fa-check"></span></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



<?php
    require "../includes/footer.php";
?>
