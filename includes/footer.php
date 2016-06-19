<!-- Brands slider -->
<div class="container">
    <div class="row">
        <div class="columns small-12">
            <h3>Our Brands</h3>
        </div>
    </div>
    <div class="row owl-carousel brands">
        <?php
        $queryBrand = "SELECT BrandImage FROM brand LIMIT 75";
        $resultBrand = mysqli_query($conn,$queryBrand);
        while ($row = $resultBrand->fetch_array(true)) {
            include($prepath.'includes/brand-block.php');
        }
        ?>
    </div>
</div>
</div>
<!-- content end -->

<div class="footer">
    <div class="container">
        <div class="row">
            <div class="columns small-12 medium-4">
                <h4>Geurdiscounter.nl</h4>
                <ul>
                    <li><a href="<?=$prepath?>pages/contact.php">Contact</a></li>
                    <li><a href="<?=$prepath?>pages/verzendinfo.php">Shipping info</a></li>
                    <li><a href="<?=$prepath?>pages/winkelzoeker.php">Store locator</a></li>
                    <li><a href="<?=$prepath?>pages/account.php">Contact</a></li>
                    <li><a href="<?=$prepath?>pages/account.php">Contact</a></li>
                </ul>
            </div>

            <div class="columns small-12 medium-4">
                <h4>Quick links</h4>
                <ul>
                    <li><a href="<?=$prepath?>pages/account.php">Account</a></li>
                    <li><a href="<?=$prepath?>pages/contact.php">Contact</a></li>
                    <li><a href="<?=$prepath?>pages/search.php">Search</a></li>
                    <li><a href="<?=$prepath?>pages/product.php">Product</a></li>
                    <li><a href="<?=$prepath?>pages/wishlist.php">Wishlist</a></li>
                </ul>
            </div>

            <div class="columns small-12 medium-4">
                <h4>Payment options</h4>
                <p>
                    You can order our products in a safe environment with the following payment options:
                </p>
                <img class="payment-options" src="<?=$prepath?>assets/img/payment-options.jpg" />
            </div>
        </div>
    </div>
</div>

<div class="subfooter">
    <div class="container">
        <div class="row">
            <div class="columns small-12">
                &copy; 2016 ParfumDiscounter.nl
            </div>
        </div>
    </div>
</div>

<script src="<?=$prepath?>assets/js/vendor/jquery.js"></script>
<script src="<?=$prepath?>assets/js/vendor/what-input.js"></script>
<script src="<?=$prepath?>assets/js/vendor/foundation.min.js"></script>
<!--<script src="<?=$prepath?>assets/js/foundation/foundation.equalizer.js"></script>-->
<script src="<?=$prepath?>assets/js/owl.carousel.js"></script>
<script src="<?=$prepath?>assets/js/notie.min.js"></script>
<!-- basic scripts -->
<script src="<?=$prepath?>assets/js/app.js"></script>
<?php
// show error messages
if(isset($_SESSION['errors'])) {
    foreach ($_SESSION['errors'] as $error) {
        echo "<script>notie.alert(4, '".$error."', 2);</script>";
    }
    unset($_SESSION['errors']);
}
?>
    <script>
        $(document).ready(function() {
            $(".loadscreen").fadeOut();
        });

    </script>

    </body>

    </html>
