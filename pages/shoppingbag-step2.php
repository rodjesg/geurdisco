<?php
$title = "Shopping bag - Personal data";
$home = false;
require "../includes/header.php";
?>

<div class="content">
    <div class="container">
        <h3><?=$title?></h3>

        <?php

        // check if session shopping cart has content
        if (isset($_SESSION))

        // check if personal information present

        // on submit check if personal information has been filled in

        ?>

        <a href="shoppingbag.php"class="button">Previous</a>
        <a href="shoppingbag-step3.php"class="button">Next</a>
    </div>
</div>

<?php
require "../includes/footer.php";
?>