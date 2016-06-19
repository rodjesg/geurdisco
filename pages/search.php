<?php
$home = false;
$title = "Search results";
require "../includes/header.php";
require "../includes/dbconnect.php";
require "../functions/search.php";
?>

<div class="content">
    <div class="container">
        <div class="row">
            <div class="columns small-12">
                <h3><?=sizeof($result_filtered);?> resultaten gevonden</h3>
                <h5>Je zocht naar "<?=$searchterm?>"</h5>
            </div>
            <div class="columns small-12 medium-4 large-3">
                Filter your results
                <form method="GET" action="search.php">

                    <!-- hidden input searchterm -->
                    <input type="hidden" name="searchterm" value="<?=$searchterm?>">

                    <h4>Category</h4>
                    <?php
                        foreach($categories as $key => $value) {
                            $checked = "";
                            if (isset($_GET['category']) && in_array($key, $_GET['category'])) {
                                $checked = "checked";
                            }
                            echo "<input type='checkbox' ".$checked." name='category[]' value='".$key."'> ".$value['EN']."<br>";
                        }
                    ?>
                    <h4>Subcategory</h4>
                    <?php
                    foreach($subcategories as $key => $value) {
                        $checked = "";
                        if (isset($_GET['subcategory']) && in_array($key, $_GET['subcategory'])) {
                            $checked = "checked";
                        }
                        echo "<input type='checkbox' ".$checked." name='subcategory[]' value='".$key."'> ".$value['EN']."<br>";
                    }
                    ?>
                    <h4>Brands</h4>
                    <?php
                    foreach($brands as $key => $value) {
                        $checked = "";
                        if (isset($_GET['brand']) && in_array($key, $_GET['brand'])) {
                            $checked = "checked";
                        }
                        echo "<input type='checkbox' ".$checked." name='brand[]' value='".$key."'> ".$value."<br>";
                    }
                    ?>
                    <h4>Price</h4>
                    From<br>
                    <?php
                        $priceFrom = "";
                        $priceUntil = "";
                        if (isset($_GET['price_from']) && is_numeric($_GET['price_from'])) {
                            $priceFrom = $_GET['price_from'];
                        }
                        if (isset($_GET['price_untill']) && is_numeric($_GET['price_untill'])) {
                            $priceUntill = $_GET['price_untill'];
                        }
                    ?>

                    <input name="price_from" type="number" placeholder="Price minimum" value="<?=$priceFrom?>"><br>
                    Untill<br>
                    <input name="price_untill" type="number" placeholder="Price maximimum" value="<?=$priceUntill?>"><br>
                    <input type="submit" class="button" value="Filter results">
                </form>
            </div>
            <div class="columns small-12 medium-8 large-9">
                <div class="row">
                    <div class="columns small-12">
                        Sorteren
                    </div>

                        <div id="search-results">

                        <?php
                            foreach ($result_filtered as $key => $value) {
                                include('../includes/product-block-results.php');
                            }
                        ?>
                        </div>

                </div>
            </div>
        </div>
    </div>
</div>

<?php
require "../includes/footer.php";
?>