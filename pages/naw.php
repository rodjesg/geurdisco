<?php
$title = "Account";
$home = false;
require "../includes/header.php";
require "../includes/dbconnect.php";

?>

<div class="content">
     <div class="container">
         <div class="row">
             <div class="large-12 columns aanvullendNAW">
                 <div class="linksbox">
                  <h3>Account Credentials</h3><br>
                  <form class="formlinks">
				    <fieldset>
                       <h5>Persoonlijke gegevens</h5>
					   <label for="voornaam">Voornaam *</label>
					   <input type="text" placeholder="Vul je voornaam in>"<br>
					   <label for="tussenvoegel">Tussenvoegel</label>	
					   <input type="text" placeholder="Tussenvoegsel"><br>
                       <label for="Achternaam">Achternaam *</label>	
					   <input type="text" placeholder="Achternaam"><br>
                       <h5>Woonplaats / factuuradres</h5>
                        
                        
                        
                        
                        <button type="submit" class="button">Save  <span class="fa fa-sign-in"></span></button>                 
                     </fieldset>
                 </form>
             </div> 
             </div> 
         </div>
     </div>
 </div>










<?php
require "../includes/footer.php";
?>

