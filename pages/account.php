<?php
$title = "Account";
$home = false;
require "../includes/header.php";
?>


 <style>
        * {
            box-sizing: border-box;
        }
    
         h3 {
            text-align: center;
        }
     
        h5 {
            text-align: center;
        }
        
        .naw {
            border: 1px solid;
            width: 60%;
            padding: 12px 20px;
            margin: auto auto;
            float: center;
        }
        
        input[type=text] {
            width: 100%;
            margin: 8px 0;
        }
        
        
        label {
            font-size: 8, 5pt;
        }

    </style>


<div class="content">
     <div class="container">
         <div class="row">
             <div class="large-12 columns ">
                  <h3>Account Credentials</h3><br>
                  <form class="naw" action="../functions/register.php" method="post">
				    <fieldset>
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
					        <label for="voornaam">Voornaam *</label>
                            <input type="text" name="voornaam" placeholder="Vul je voornaam in"><br>
                            <label for="tussenvoegsel">Tussenvoegsel</label>	
                            <input type="text" name="tussenvoegsel" placeholder="Tussenvoegsel"><br>
                            <label for="Achternaam">Achternaam *</label>	
                            <input type="text" name="achternaam" placeholder="Achternaam"><br>
                            <label for="Geboortedatum">Geboortedatum *</label>	
                            <input type="text" name="geboortedatum" placeholder="jjjj-mm-dd"><br>
                            <label for="sekse">Geslacht *</label>	
                            <select name="sekse">
                                <option value="M">Man</option>
                                <option value="V">Vrouw</option>
                                <option value="U">Uniseks</option>
                            </select> 
                            <label for="taal">Taal voorkeur *</label>
                            <select name="taal">
                                 <option value="NL">Nederlands / Dutch</option>
                                 <option value="EN">Engels / English</option>  
                            </select>  
                       <h5>Woonplaats / factuuradres</h5>
                            <label for="adres">Adres *</label>
				            <input type="text" name="adres" placeholder="Vul je adres in"><br>
                            <label for="Postcode">Postcode *</label>
                            <input type="text" name="postcode" placeholder="Vul je postcode in"><br>
                            <label for="huisnr">Huisnummer *</label>
                            <input type="text" name="huisnr" placeholder="Vul je huisnummer in"><br>
                            <label for="Huisnr.toev">Huisnummer toevoeging</label>
                            <input type="text" name="huisnrToev" placeholder="Eventuele toevoeging"><br>
                            <label for="woonplaats">Woonplaats *</label>
                            <input type="text" name="woonplaats"placeholder="Vul je woonplaats in"><br>
                            <label for="land">Land *</label>
                            <select name="land">
                                 <?php
                                $query = "SELECT * FROM country";
                                $result = mysqli_query($conn,$query);
                                while ($row = $result->fetch_array(true)) {
                                    echo "<option value='".$row['CountryID']."'>".$row['Name']."</option>";
                                }
                                ?>
                            </select>            
                       <h5>Contactgegevens</h5>
                            <label for="Telefoon">Telefoonnummer *</label>
				            <input type="text" name="telefoon" placeholder="Vul hier je telefoonnummer in"><br>
                            <button type="submit" class="button">Register <span class="fa fa-check"></span></button>               
                     </fieldset>
                 </form> 
           </div> 
        </div>
    </div>
</div>

<?php
require "../includes/footer.php";
?>

