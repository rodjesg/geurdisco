<?php
$home = false;
$title = "Search results";
require "../includes/header.php";
require "../functions/search.php";
?>

<div class="content">
    <div class="container">
        <div class="row">
            <div class="columns small-12">
                <h3><?=sizeof($result_filtered);?> resultaten gevonden</h3>
                <?php
                    if (isset($byCategory) && isset($bySubcategory)) {
                        $query = "SELECT * FROM category INNER JOIN text ON category.TextID = text.TextID WHERE CategoryID = $byCategory";
                        $result = mysqli_query($conn,$query);
                        $categoryName = $result->fetch_array(true);
                        $query = "SELECT * FROM subcategory INNER JOIN text ON subcategory.TextID = text.TextID WHERE SubCategoryID = $bySubcategory";
                        $result = mysqli_query($conn,$query);
                        $subcategoryName = $result->fetch_array(true);

                        echo "<a href='overview.php?id=".$categoryName['CategoryID']."'>".$categoryName['EN']."</a> > ".$subcategoryName['EN'];
                    }
                    else {
                       echo "<h5>Je zocht naar '".$searchterm."'</h5>";
                    }
                ?>
            </div>

            <?php
            if (sizeof($result_filtered) > 0) {
                ?>

                <div class="columns small-12 medium-4 large-3">
                    <h4>Filter your results</h4>
                    <hr>
                    <form method="GET" action="search.php" name="filter">

                        <?php if (isset($_GET['searchterm'])) { ?>
                            <!-- hidden input searchterm -->
                            <input type="hidden" name="searchterm" value="<?= $searchterm ?>">
                            <h5>Category</h5>
                            <?php
                            foreach ($categories as $key => $value) {
                                $checked = "";
                                if (isset($_GET['category']) && in_array($key, $_GET['category'])) {
                                    $checked = "checked";
                                }
                                echo "<input type='checkbox' " . $checked . " name='category[]' value='" . $key . "'> " . $value['EN'] . "<br>";
                            }
                            ?>
                            <h5>Subcategory</h5>
                            <?php
                            foreach ($subcategories as $key => $value) {
                                $checked = "";
                                if (isset($_GET['subcategory']) && in_array($key, $_GET['subcategory'])) {
                                    $checked = "checked";
                                }
                                echo "<input type='checkbox' " . $checked . " name='subcategory[]' value='" . $key . "'> " . $value['EN'] . "<br>";
                            }
                        } else {
                            // hidden category id and subcategory id
                            echo "<input type='hidden' name='byCategory' value='" . $byCategory . "'>";
                            echo "<input type='hidden' name='bySubcategory' value='" . $bySubcategory . "'>";
                        }
                        ?>

                        <h5>Brands</h5>
                        <?php
                        foreach ($brands as $key => $value) {
                            $checked = "";
                            if (isset($_GET['brand']) && in_array($key, $_GET['brand'])) {
                                $checked = "checked";
                            }
                            echo "<input type='checkbox' " . $checked . " name='brand[]' value='" . $key . "'> " . $value . "<br>";
                        }
                        ?>
                        <h5>Price</h5>
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
                        <input name="price_from" type="number" placeholder="Price minimum"
                               value="<?= $priceFrom ?>"><br>
                        Untill<br>
                        <input name="price_untill" type="number" placeholder="Price maximimum"
                               value="<?= $priceUntill ?>"><br>
                        <select name="sort" style="display:none;">
                            <option value="new">Onlangs toegevoegd</option>
                            <option <?php if (isset($_GET['sort']) && $_GET['sort'] == "view") {
                                echo "selected";
                            } ?> value="view">Meest bekeken
                            </option>
                            <option <?php if (isset($_GET['sort']) && $_GET['sort'] == "product_asc") {
                                echo "selected";
                            } ?> value="product_asc">Productnaam oplopend
                            </option>
                            <option <?php if (isset($_GET['sort']) && $_GET['sort'] == "product_desc") {
                                echo "selected";
                            } ?> value="product_desc">Productnaam aflopend
                            </option>
                            <option <?php if (isset($_GET['sort']) && $_GET['sort'] == "price_asc") {
                                echo "selected";
                            } ?> value="price_asc">Prijs oplopend
                            </option>
                            <option <?php if (isset($_GET['sort']) && $_GET['sort'] == "price_desc") {
                                echo "selected";
                            } ?> value="price_desc">Prijs aflopend
                            </option>
                        </select>

                        <input type="submit" class="button" value="Filter results">
                    </form>
                </div>
                <div class="columns small-12 medium-8 large-9">
                    <div class="row">
                        <div class="columns small-12">
                            <select name="sort2">
                                <option value="new">Onlangs toegevoegd</option>
                                <option <?php if (isset($_GET['sort']) && $_GET['sort'] == "view") {
                                    echo "selected";
                                } ?> value="view">Meest bekeken
                                </option>
                                <option <?php if (isset($_GET['sort']) && $_GET['sort'] == "product_asc") {
                                    echo "selected";
                                } ?> value="product_asc">Productnaam oplopend
                                </option>
                                <option <?php if (isset($_GET['sort']) && $_GET['sort'] == "product_desc") {
                                    echo "selected";
                                } ?> value="product_desc">Productnaam aflopend
                                </option>
                                <option <?php if (isset($_GET['sort']) && $_GET['sort'] == "price_asc") {
                                    echo "selected";
                                } ?> value="price_asc">Prijs oplopend
                                </option>
                                <option <?php if (isset($_GET['sort']) && $_GET['sort'] == "price_desc") {
                                    echo "selected";
                                } ?> value="price_desc">Prijs aflopend
                                </option>
                            </select>
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
                <?php
            }
            else {
                // offerte aanvragen
                include('../includes/request.php');
            }
            ?>

        </div>
    </div>
</div>

<?php
require "../includes/footer.php";
?>

<!-- sort function -->
<script>
    $(document).ready(function(){
        $("select[name='sort2']").on("change", function(){
            var selected = $(this).val(); //get the selected id
            $("select[name='sort'] option[value='"+selected+"']").attr("selected","selected");
            $("form[name='filter']").submit();
        });
    });
</script>

