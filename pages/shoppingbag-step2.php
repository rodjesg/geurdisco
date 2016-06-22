<?php
$title = "Shopping bag - Personal data";
$home = false;
require "../includes/header.php";
?>

<div class="content">
    <div class="container">
        <?php

        // check if session shopping cart has content
        if (isset($_SESSION['shoppingbag']['subtotal']) && !empty($_SESSION['shoppingbag']['subtotal'])) {
            // check if personal information present
            // address
            // nr
            // addition
            // postcode
            // city
            // country
        ?>

            <div class="columns small-12 large-8">
                <?php
                echo "<pre>";
                print_r($_SESSION);
                echo "</pre>";
                //die();
                ?>
                <h3><?=$title?></h3>
                <form method="POST">
                    <div class="columns small-12 medium-8">
                        <label for="address"></label>
                        <input name="address" placeholder="Address" type="text" value="<?=$_SESSION['login']['accountInfo']['Address']?>">
                    </div>
                    <div class="columns small-6 medium-2">
                        <label for="nr"></label>
                        <input name="nr" placeholder="Number" type="text" value="">
                    </div>
                    <div class="columns small-6 medium-2">
                        <label for="addition"></label>
                        <input name="addition" placeholder="Addition" type="text" value="">
                    </div>
                    <div class="columns small-12 medium-6">
                        <label for="postcode"></label>
                        <input name="postcode" placeholder="Postcode" type="text" value="">
                    </div>
                    <div class="columns small-12 medium-6">
                        <label for="city"></label>
                        <input name="city" placeholder="City" type="text" value="">
                    </div>





                </form>
            </div>

        <?php
            echo "<script>alert('gelukt')</script>";
        }


        // on submit check if personal information has been filled in

        ?>

        <a href="shoppingbag.php"class="button">Previous</a>
        <a href="shoppingbag-step3.php"class="button">Next</a>
    </div>
</div>

<?php
require "../includes/footer.php";
?>