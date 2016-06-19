<div class="columns small-12 medium-6 large-4" data-equalizer-watch>
    <div class="product-block">
        <div class="product-thumb" style="background-image:url(<?=$value['ProductImage']?>)">
            <div class="product-priceblock">
                <?php
                    $price = explode(".", $value['Price']);
                    echo "&euro; ".$price[0];
                    echo "<div class='decimal'>".$price[1]."</div>";
                
                ?>
            </div>
        </div>

        <div class="deal-content">
            <h5><?=$key['ProductName']?>
                    </h5>
            <h6></h6>
            <a href="<?=$prepath?>functions/add-shoppingbag.php?ProductId=<?=$value['ProductID']?>" class="button">Add to shoppingbag</a>
            <ul>
                <li><a href="<?=$prepath?>functions/add-wishlist.php?ProductId=<?=$value['ProductID']?>">Add to wishlist</a></li>
            </ul>
        </div>
    </div>
</div>
