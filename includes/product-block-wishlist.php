<div class="columns small-12 medium-4 large-3">
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
            <a href="<?=$prepath?>functions/add-shoppingbag.php?ProductId=<?=$row['ProductID']?>" class="button">Add to shopping bag<span class="fa fa-shopping-bag"></span></a>
            <ul>
                <li><a href="<?=$prepath?>functions/delete-wishlist.php?ProductId=<?=$row['ProductID']?>">Delete from wishlist</a></li>
            </ul>
        </div>
    </div>
</div>