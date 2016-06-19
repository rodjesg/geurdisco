<?php
$title = "Account";
$home = false;
require "../includes/header.php";
require "../includes/dbconnect.php";
?>


<div class="content">
     <div class="container">
         <div class="row">
             <div class="large-12 columns "> 
                 
                 
                  <?php
                    if (isset($_SESSION['login']) && $_SESSION['login']['status'] == true) {
                        
                        echo "<h3>".$_SESSION['login']['accountInfo']['SureName']."'s personal order history</h3>";
                    
                    
                 
                 //query order history
                 //Bestelling: OrderID
                 //Productinformatie: ProductID + ProductName
                 //Aantal: Quantity
                 //Prijs per product: Price
                 //Totaal prijs per product: Price * Quantity
                 //Totaalprijs: TotalPrice
                 //Datum: Date
                        
                 /*$accountid = $_SESSION['login']['accountInfo']['AccountID'] ;
                 $query = "SELECT order.OrderID, orderline.ProductID, product.ProductName, orderline.Quantity, orderline. orderline. Price, order.TotalPrice, order.Date FROM order, orderline, product WHERE order.AccountID = $accountid ORDER BY order.DATE DESC ;" ;
                 $result = mysqli_query($conn,$query);*/
                    }
                        
                        
                 
                 
                 
                 
    
                      
                  
                        
                        
                    
                    else {
                        echo "<h3>Bestelhistorie</h3>";
                        echo "<p>Je bent niet ingelogd.</p>";
                    }
                 ?>
                 
                 <div class="small-4 large-4 columns">2</div>
                      <div class="small-6 large-4 columns">3</div>
                 
                 
                 
                  
           </div> 
        </div>
    </div>
</div>

<?php
require "../includes/footer.php";
?>
