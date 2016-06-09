<?php
    $price = 29.99;
    $discount = 35;

    $priceNew = $price * (100 - $discount) / 100;
    $priceNew = round($priceNew,2);
    $priceNew = explode('.', $priceNew);
?>

<div class="columns small-12">
    <div class="product-block deals-block">
        <div class="row">
            <div class="product-thumb small-12 medium-6 columns">
                <div class="product-priceblock">
                    <div class="prev-price"><span><?=$price?></span><br/>now</div>
                    €<?=$priceNew[0]?>.<div class="decimal"><?=$priceNew[1]?></div>
                </div>
            </div>
            <div class="columns small-12 medium-6">
                <div class="deals-content">
                    <h4>Titel van het product</h4>
                    <h6>Subtitel van het product</h6>
                    <h5><?=$discount?>% discount!</h5>
                    <div class="button">View this deal<span class="fa fa-chevron-right"></span></div>
                    <ul>
                        <li><a href="#">Add to shopping bag</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>