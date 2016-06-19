<?php
$title = "Shopping bag - Delivery";
$home = false;
require "../includes/header.php";
require "../includes/dbconnect.php";
?>

<div class="content">
    <div class="container">
        <h3><?=$title?></h3>

        <?php

        // check if personal information is present

        // check country and select delivery option

        // give user choice for fast delivery

        ?>

        <a href="shoppingbag-step3.php"class="button">Previous</a>
        <a href="shoppingbag-step4.php"class="button">Next</a>
    </div>
</div>

<?php
require "../includes/footer.php";
?>