<?php
$title = "Shopping bag - Overview";
$home = false;
require "../includes/header.php";
?>

    <div class="content">

        <?php

//        echo "<pre>";
//        print_r($_SESSION);
//        echo "</pre>";

        ?>

        <div class="container">
            <div class="columns small-12">
                <!--  Breadcrums menu   -->
                <?php include "../includes/breadcrumbs.php";?>
                <h3><?=$title?></h3>
            </div>

                <div class="columns small-12 large-8">
                    <?php
                    /* check if session is present */
                    if (isset($_SESSION['shoppingbag']['products']) && is_array($_SESSION['shoppingbag']['products'])) {
                        echo "<table>";
                        echo "<tr>";
                        echo "<th>Product</th><th></th><th>Aantal</th><th>Prijs per stuk</th><th>Totaalprijs</th>";
                        echo "</tr>";

                        $subTotal = 0;
                        $countProducts = 0;

                        /* loop through shopping bag */
                        foreach ($_SESSION['shoppingbag']['products'] as $key => $value) {
                            $price = number_format($value['productInfo']['Price'], 2, ',', ' ');
                            $quantity = $value['quantity'];
                            $productTotal = number_format($price * $quantity, 2, ',', ' ');
                            $subTotal += $price * $quantity;
                            $countProducts += $quantity;
                    ?>
                            <tr>
                                <td>
                                    <img style='width:150px;' src="<?=$value['productInfo']['ProductImage']?>"><br>
                                    <a href="../functions/delete-shoppingbag.php?ProductId=<?=$key?>" class="button">Verwijderen</a>
                                </td>
                                <td>
                                    <?=$value['productInfo']['ProductName']?><br/>
                                    <?=$value['productInfo']['BrandName']?><br/>
                                </td>
                                <td>

                                    <input type="hidden" value="<?=$key?>" name="productId" class="hiddenId">

                                    <select class="select-quantity"  name="quantity">
                                        <?php
                                        for ($i = 0; $i <= $value['productInfo']['Stock']; $i++) {
                                            $selected = "";
                                            if ($i == $quantity) {
                                                $selected = "selected";
                                            }
                                            echo "<option $selected value='$i'>$i</option>";
                                        }
                                        echo $quantity;
                                        ?>
                                    </select>
                                </td>
                                <td>&euro; <?=$price?></td>
                                <td>&euro; <?=$productTotal?></td>
                            </tr>
                    <?php
                        }
                        echo "</table>";
                        $subTotal = number_format($subTotal, 2, ',', ' ');
                    ?>
                </div>
                <div class="columns small-12 large-4">
                    <!-- shopping bag total block -->
                    <div class="shoppingbag-total small-12 panel columns">
                        <div class="columns small-12 medium-8">
                            <?php
                                if($countProducts == 1) {
                                    $placeholder = "product";
                                }
                                else {
                                    $placeholder = "products";
                                }
                            ?>
                            <h5>Order (<?=$countProducts?> <?=$placeholder?>)</h5>
                        </div>
                        <div class="columns small-12 medium-4 text-right">
                            <h5>&euro;<?=$subTotal?></h5>
                        </div>
                        <div class="columns small-12">
                            <hr>
                            <h5>Discount</h5>
                        </div>
                        <!-- check if discount code is present -->
                        <?php
                            if(isset($_SESSION['discountcode']) && !empty($_SESSION['discountcode'])) {
                                // discount applied: show information
                        ?>
                                <div class="columns small-12 medium-8 ">
                                    <a class="button" href="../functions/delete-discount.php">Verwijder discount</a>
                                </div>
                            <div class="columns small-12 medium-4 text-right">
                                <?php
                                    // calculate discount
                                    $discountType = $_SESSION['discountcode']['type'];
                                    $discountValue = $_SESSION['discountcode']['value'];
                                    if ($discountType == "amount") {
                                        $subTotal = number_format($subTotal - $discountValue, 2, ',', ' ');
                                        echo "<h5>- &euro;$discountValue</h5>";
                                    }
                                    else {
                                        $percentage = (100 - $discountValue)/100;
                                        $subTotal =  $subTotal = number_format($subTotal * $percentage, 2, ',', ' ');
                                        echo "<h5>- $discountValue&#x0025;</h5>";
                                    }
                                ?>
                            </div>
                        <?php
                            }
                            else {
                                // no discount applied: show form
                        ?>
                            <form action="../functions/add-discount.php" method="post">
                                <div class="columns small-12 medium-8">
                                    <input type="text" placeholder="Discountcode" name="discountcode">
                                </div>
                                <div class="columns small-12 medium-4 text-right">
                                    <input class="button" type="submit" value="Add code">
                                </div>
                            </form>
                        <?php
                            }

                            // add subtotal to session
                            $_SESSION['shoppingbag']['subtotal'] = $subTotal;
                        ?>

                        <div class="columns small-12">
                            <hr>
                        </div>
                        <!-- delivery -->
                        <div class="columns small-12">

                        </div>
                        <div class="columns small-12 medium-8 columns">
                            <?php

                            $query = "SELECT * FROM country WHERE CountryID = ".$_SESSION['login']['accountInfo']['CountryID'];
                            $result = mysqli_query($conn,$query);
                            $result = $result->fetch_array(true);

                            // define region
                            if ($result['ContinentCode'] == "EU") {
                                $deliveryCostID = 2;
                                if ($result['EuropeanUnion'] == 1) {
                                    $deliveryCostID = 1;
                                }
                            }
                            else {
                                $deliveryCostID = 3;
                            }

                            $query = "SELECT * FROM deliverycost WHERE DeliveryCostID = ".$deliveryCostID;
                            $result = mysqli_query($conn,$query);
                            $result = $result->fetch_array(true);
                            $deliveryCostName = $result['Name'];
                            $deliveryCostPrice = $result['Price'];

                            ?>
                        </div>

                        <div class="columns small-12">
                            <h5>Delivery</h5>
                        </div>
                        <div class="columns small-12 medium-8 columns">
                            Region: <?=$deliveryCostName?>
                        </div>
                        <div class="columns small-12 medium-4 columns text-right">
                            &euro;<?=$deliveryCostPrice?>
                        </div>

                        <div class="columns small-12 medium-6 columns">
                            Delivery options
                        </div>
                        <div class="columns small-12 medium-6">
                            <?php
                            // delivery options
                            $query = "SELECT * FROM deliverychoice";
                            $result = mysqli_query($conn,$query);
                            ?>

                            <select class="select-delivery" name="deliveryOptions">
                                <?php
                                while ($row = $result->fetch_array(true)) {
                                    $selected = "";
                                    if (isset($_GET['deliverychoice'])) {
                                        $deliveryChoice = $_GET['deliverychoice'];
                                        if ($row['Price'] == $_GET['deliverychoice']) {
                                            $selected = "selected";
                                        }
                                    }
                                    echo "<option ".$selected." value='".$row['Price']."'>".$row['Name']." (+ &euro;".$row['Price'].")</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="columns small-12 medium-8 columns">
                            <h5>Total Delivery</h5>
                        </div>
                        <div class="columns small-12 medium-4 columns text-right">
                            <h5>&euro;<?=$deliveryCostPrice+$deliveryChoice?></h5>
                        </div>
                        <div class="columns small-12">
                            <hr>
                        </div>
                        <!-- subtotal -->
                        <div class="columns small-12 medium-8 columns">
                            <h4>Subtotal</h4>
                        </div>
                        <div class="columns small-12 medium-4 columns text-right">
                            <h4>&euro; <?=$subTotal?></h4>
                        </div>
                    </div>

                </div>
            </div>
            <?php
            }
            else {
                echo "<div class='columns small-12'><p>Geen producten gevonden</p></div>";
            }
            ?>
            <div class="small-12 medium-3 medium-offset-9 text-right columns">
                <a href="shoppingbag-step2.php" class="button order-btn">Persoonsgegevens&nbsp;&nbsp;&nbsp;<span class='fa fa-chevron-right'></span></a>
            </div>
        </div>
    </div>

<?php
require "../includes/footer.php";



?>

<!-- update quantity -->
<script>
    $(document).ready(function(){
        $("select.select-quantity").on("change", function(){
            var quantity = $(this).val(); //get the selected id
            var productId = $(this).siblings(".hiddenId").val();
            $(location).attr('href', '../functions/add-shoppingbag.php?ProductId='+productId+'&quantity='+quantity);
        });

        $("select.select-delivery").on("change", function(){
            var deliverychoice = $(this).val(); //get the selected id
            $(location).attr('href', 'shoppingbag.php?deliverychoice='+deliverychoice);
        });
    });
</script>


