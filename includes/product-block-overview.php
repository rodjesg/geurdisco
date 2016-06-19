<div class="columns small-12 medium-6 large-4" data-equalizer-watch>
    <div class="product-block">
        <div class="product-thumb" style="background-image:url(<?=$row['ProductImage']?>)">
            <div class="product-priceblock">
                <?php
                $price = explode(".", $row['Price']);
                echo "&euro; ".$price[0];
                echo "<div class='decimal'>".$price[1]."</div>";

                ?>
            </div>
        </div>

        <div class="deal-content">
            <h5><?=$row['ProductName']?>
            </h5>
            <h6></h6>
            <a href="<?=$prepath?>functions/add-shoppingbag.php?ProductId=<?=$row['ProductID']?>" class="button">Add to shoppingbag</a>
            <ul>
                <li><a href="<?=$prepath?>functions/add-wishlist.php?ProductId=<?=$row['ProductID']?>">Add to wishlist</a></li>
            </ul>
        </div>
    </div>
</div>
