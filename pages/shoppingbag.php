<?php
$title = "Shopping bag";
$home = false;
require "../includes/header.php";
require "../includes/dbconnect.php";
?>

    <div class="content">
        <div class="container">
            <!--  Breadcrums menu   -->
            <?php include "../includes/breadcrumbs.php";?>

            <?php
            /* check if session is present */
            if ($_SESSION['shoppingbag'] && is_array($_SESSION['shoppingbag'])) {

//                echo "<pre>";
//                print_r($_SESSION);
//                echo "</pre>";
//                //die();

                echo "<table>";
                echo "<tr>";
                echo "<th></th><th>Productnaam</th><th>Merk</th><th>Aantal</th><th>Prijs per stuk</th><th>Totaalprijs</th><th>Opties</th>";
                echo "</tr>";

                $subTotal = 0;

                /* loop through shopping bag */
                foreach ($_SESSION['shoppingbag'] as $key => $value) {
                    $price = number_format($value['productInfo']['Price'], 2, ',', '.');
                    $quantity = $value['quantity'];
                    $productTotal = $price * $quantity;
                    $subTotal += $productTotal;
            ?>
                    <tr>
                        <td><img src="<?=$value['productInfo']['ProductImage']?>"></td>
                        <td><?=$value['productInfo']['ProductName']?></td>
                        <td><?=$value['productInfo']['BrandName']?></td>
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
                        <td>
                            <a href="../functions/delete-shoppingbag.php?ProductId=<?=$key?>" class="button">Verwijderen</a>
                        </td>
                    </tr>
            <?php
                }

                echo "</table>";
                echo "<h2>Subtotaal: &euro; $subTotal</h2>";
            }
            else {
                echo "<p>Geen producten gevonden</p>";
            }
            ?>


        </div>
    </div>



<?php
require "../includes/footer.php";

//var_dump($_SESSION)
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


