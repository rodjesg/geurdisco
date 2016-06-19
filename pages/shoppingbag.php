<?php
$title = "Shopping bag - Overview";
$home = false;
require "../includes/header.php";
require "../includes/dbconnect.php";
?>

    <div class="content">
        <div class="container">
            <!--  Breadcrums menu   -->
            <?php include "../includes/breadcrumbs.php";?>
            <h3><?=$title?></h3>
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

                            <select name="quantity">
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

                <!-- shopping bag total block -->
                <div class="shoppingbag-total">
                    <?php
                        if($countProducts == 1) {
                            $placeholder = "product";
                        }
                        else {
                            $placeholder = "products";
                        }
                    ?>
                    Order (<?=$countProducts?> <?=$placeholder?>)
                    <hr>
                    <h4>Discount</h4>

                    <!-- check if discount code is present -->
                    <?php
                        if(isset($_SESSION['discountcode']) && !empty($_SESSION['discountcode'])) {
                            // discount applied: show information
                    ?>
                            <a class="button" href="../functions/delete-discount.php">Verwijder discount</a>
                    <?php
                        }
                        else {
                            // no discount applied: show form
                    ?>
                        <form action="../functions/add-discount.php" method="post">
                            <input type="text" placeholder="Discountcode" name="discountcode">
                            <input class="button" type="submit" value="Add code">
                        </form>
                    <?php
                        }
                    ?>


                </div>

                <a href="shoppingbag-step2.php" class="button">Next</a>
            <?php
            }
            else {
                echo "<p>Geen producten gevonden</p>";
            }
            ?>
        </div>
    </div>

<?php

//echo "<pre>";
//print_r($_SESSION);
//echo "</pre>";

require "../includes/footer.php";
?>

<!-- update quantity test -->
<script>
    $(document).ready(function(){
        $("select").on("change", function(){
            var quantity = $(this).val(); //get the selected id
            var productId = $(this).siblings(".hiddenId").val();
            $(location).attr('href', '../functions/add-shoppingbag.php?ProductId='+productId+'&quantity='+quantity);
        });
    });
</script>


