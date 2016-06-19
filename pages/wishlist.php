<?php
$home = false;
$title = "Wishlist";
require "../includes/header.php";
?>


    <div class="content">
        <div class="container">
            <div class="row">
                <div class="columns small-12">

                    <?php
                    if (isset($_SESSION['login']) && $_SESSION['login']['status'] == true) {
                        
                        echo "<h3>".$_SESSION['login']['accountInfo']['SureName']."'s personal wishlist</h3>";
                        
                        $query = "SELECT * FROM wishlist INNER JOIN product ON wishlist.ProductID = product.ProductID  WHERE wishlist.AccountID = ".$_SESSION['login']['accountInfo']['AccountID']." ORDER BY wishlist.WishlistID DESC;";
                        $result = mysqli_query($conn,$query);
                        
                        // check if account has wishlist product
                        if ($result->num_rows == 0) {
                            echo "<p>Je hebt nog geen producten aan je wishlist toegevoegd.</p>";
                        }
                        // if has products, loop through each
                        else {
                            while ($row = $result->fetch_array(true)) {
                                include($prepath.'includes/product-block-wishlist.php');
                            }
                        }
                    }
                    else {
                        echo "<h3>Your personal wishlist</h3>";
                        echo "<p>Je bent niet ingelogd.</p>";
                    }
                 ?>

                </div>
            </div>
        </div>
    </div>

    <?php
require "../includes/footer.php";
?>
