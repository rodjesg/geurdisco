<div class="columns small-12 medium-6 large-4" data-equalizer-watch>
    <div class="product-block">
        <div class="product-thumb" style="background-image:url(<?=$row['ProductImage']?>)">
            <div class="product-priceblock">
                €29.
                <div class="decimal">99</div>
            </div>
        </div>

        <div class="deal-content">
            <h5><?=$row['ProductName']?></h5>
            <h6></h6>
            <div class="button">Add to shopping bag<span class="fa fa-shopping-bag"></span></div>
            <ul>
                <li><a href="<?=$prepath?>functions/add-wishlist.php?ProductId=<?=$row['ProductID']?>">Add to wishlist</a></li>
            </ul>
        </div>
    </div>
</div>
