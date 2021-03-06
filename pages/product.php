<?php
$home = false ;
$title = "Product";
require "../includes/header.php";

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    //query voor product informatie inclusief brand en texts
    $sql = "SELECT * FROM product INNER JOIN brand ON product.BrandID = brand.BrandID INNER JOIN text ON product.TextID = text.TextID WHERE product.productID = $id"; 
    $result = mysqli_query($conn,$sql);

    if ($result) {
        $result = $result->fetch_array(true);
    }
    else {
        header('location:../index.php');
    }
}
else {
    header('location:../index.php');
}

?>

    <style>
        .productimg {}
        
        .block3Product {
            border-style: ridge;
            border-width: 1px;
            padding: 15px;
        }
        
        .pricebox {
            position: absolute;
            -webkit-border-radius: 15px;
            -moz-border-radius: 15px;
            border-radius: 15px;
            background: #4D82D6;
            color: #fff;
            padding: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
            font-size: 1.5rem;
            bottom: 15px;
        }
        
        .pricebox.productpage {
            position: relative;
            float: left;
            bottom: auto;
            clear: both;
            display: inline-block;
        }
        
        .quantitybox {
            position: relative;
            display: inline-block;
            width: 100%;
        }

    </style>

    <div class="content">
        <div class="container">

            <div class="row">
                <div class="small-2 large-4 columns">
                    <img class="productimg" src="<?=$result['ProductImage']?>" title="productview">

                </div>

                <div class="small-4 large-4 columns">
                    <h2><?=$result['ProductName']?></h2>
                    <h5><strong><?=$result['BrandName']?></strong></h5>
                    <p>
                        <?=$result['NL']?>
                    </p>

                </div>

                <div class="small-6 large-4 columns">
                    <div class="block3Product">
                        <h4><?=$result['ProductName']?></h4>

                        <div class="pricebox productpage">

                            <h4>&euro; <?=$result['Price']?></h4>

                        </div>
                        <br>
                        <br>
                        <br>

                        <div class="quantitybox">
                            <p>Quantity</p>
                            <form action="<?=$prepath?>functions/add-shoppingbag.php" method="get">
                                <div class="row">
                                    <div class="medium-3 columns">
                                        <input type="hidden" value="<?=$result['ProductID']?>" name="ProductId">
                                        <select name="quantity">
                                            <?php
                                            for ($i = 1; $i <= $result['Stock']; $i++) {
                                                echo "<option value='$i'>$i</option>";
                                            }
                                            echo $quantity;
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <!-- add to shopping cart -->
                                <button type="submit" class="button"><span class="fa fa-shopping-bag"></span><span>&nbsp;&nbsp;Add to shopping bag</span></button>
                            </form>
                            <!-- add to wishlist -->
                            <a href="<?=$prepath?>functions/add-wishlist.php?ProductId=<?=$result['ProductID']?>" class="wishlist">
                                <p><span class="fa fa-star"></span><span>&nbsp;&nbsp;Add to wishlist</span></p>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>





    </div>
    </div>

    <?php
require "../includes/footer.php";
?>

        <!--

aansluiten add to shoppingbag (zie product-block .php)
aansluiten add to wishlist (zie productblock .php)
query uitvoeren add 1 (view)
aantallen aansluiten (zie shoppingbag)


-->
