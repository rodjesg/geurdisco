<?php
$title = "Account";
$home = false;
require "../includes/header.php";
require "../includes/dbconnect.php";
?>

<style>
    .loadscreen{
     display:none;   
    }
</style>

<div class="content">
     <div class="container">
         <div class="row">
             <div class="large-12 columns "> 
                 
                 
              <?php
                if (isset($_SESSION['login']) && $_SESSION['login']['status'] == true) {
                    echo "<h3>".$_SESSION['login']['accountInfo']['SureName']."'s personal order history</h3><br><br>";
                    //query order history
                    //Bestelling: OrderID
                    //Productinformatie: ProductID + ProductName
                    //Aantal: Quantity
                    //Prijs per product: Price
                    //Totaal prijs per product: Price * Quantity
                    //Totaalprijs: TotalPrice
                    //Datum: Date

                    $accountid = $_SESSION['login']['accountInfo']['AccountID'];

                    // alle orders ophalen 
                    $query = "SELECT * FROM `order` WHERE AccountID = $accountid ORDER BY Date DESC";   
                    $result = mysqli_query($conn,$query);
                    $orders = $result->fetch_all(true);

                    // haal alle producten PER order op
                    foreach ($orders as $key => $order) {
                        $query = "SELECT * FROM `orderline` WHERE OrderID = ".$order['OrderID'].";";
                        $result = mysqli_query($conn,$query);
                        $lines = $result->fetch_all(true);
                        $orders[$key]['orderLines'] = $lines;

                        // haal product informatie op
                         foreach ($orders[$key]['orderLines'] as $key1 => $product) {
                            $query = "SELECT * FROM `product` WHERE ProductID = ".$product['ProductID'].";";
                            $result = mysqli_query($conn,$query);
                            $product = $result->fetch_array(true);
                            $orders[$key]['orderLines'][$key1]['productInfo'] = $product; 
                         }
                    }

//                    echo "<pre>";
//                    print_r($orders);
//                    echo "</pre>";

                    // zet tabellen neer
                    foreach ($orders as $key => $value) {
                        // zet algemene order informatie neer
                        echo "<div class='columns small-12 medium-4'>";
                        echo "<h4>".$value['Date']."</h4>";
                        echo "<table>";
                        echo "<tr><td><strong>Order ID</strong></td><td>".$value['OrderID']."</td></tr>";
                        echo "<tr><td><strong>Betaalwijze</strong></td><td>".$value['PayMethod']."</td></tr>";
                        echo "<tr><td><strong>Totaalprijs</strong></td><td>".$value['TotalPrice']."</td></tr>";
                        echo "</table>";
                        echo "</div>";
                        
                        // zet producten neer
                        echo "<div class='columns small-12 medium-8'>";
                        echo "<h4>Producten</h4>";
                        echo "<table>";
                        echo "<tr><th>Order ID</th><th>Product</th><th>Aantal</th><th>Prijs / Product</th><th>Totaalprijs</th></tr>";
                        foreach ($value['orderLines'] as $key1 => $value1) {
                            echo "<tr>";
                            echo "<td>".$value1['productInfo']['ProductID']."</td>";
                            echo "<td><img src='".$value1['productInfo']['ProductImage']."' style='height: 100px;'><br>".$value1['productInfo']['ProductName']."</td>";
                            echo "<td>".$value1['Quantity']."</td>";
                            echo "<td>&euro;".$value1['productInfo']['Price']."</td>";
                            echo "<td>&euro;".$value1['Price']."</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                        echo "</div>";
                    }
                }    
                else {
                    // niet ingelogd
                    echo "<h3>Bestelhistorie</h3>";
                    echo "<p>Je bent niet ingelogd.</p>";
                }
             ?>
      
           </div> 
        </div>
    </div>
</div>

<?php
require "../includes/footer.php";
?>
