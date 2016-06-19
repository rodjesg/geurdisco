<style>
    .loadscreen {
        display: none !important;
    }
</style>

<?php

//    echo "<pre>";
//    print_r($_GET['subcategory']);
//    echo "</pre>";
//    //die();

if(isset($_GET['searchterm']) && is_string($_GET['searchterm'])) {
   // echo "<br><br><br><br><br><br><br><br>";
    $searchterm = $_GET['searchterm'];
    $query = "SELECT * FROM product WHERE ProductName LIKE '%$searchterm%'";
    $result_all = mysqli_query($conn,$query);
    $result_all = $result_all->fetch_all(true);
    $result_filtered = $result_all;
//
//    echo "<pre>";
//    print_r($result_filtered);
//    echo "</pre>";
//    //die();

    $brands = array();
    $categories = array();
    $subcategories = array();
    foreach ($result_all as $key => $value) {
        // get brands
        if(!isset($brands[$value['BrandID']])) {
            $query = "SELECT `BrandName` FROM brand WHERE BrandID = ".$value['BrandID'];
            $result = mysqli_query($conn,$query);
            $result = $result->fetch_array(true);
            $brands[$value['BrandID']] = $result['BrandName'];
        }

        // get categories
        if(!isset($categories[$value['CategoryID']])) {
            $query = "SELECT EN, NL FROM category INNER JOIN text ON category.TextID = text.TextID WHERE CategoryID = ".$value['CategoryID'];
            $result = mysqli_query($conn,$query);
            $result = $result->fetch_array(true);
            $categories[$value['CategoryID']] = $result;
        }

        // get subcategories
        if(!isset($subcategories[$value['SubCategoryID']])) {
            $query = "SELECT EN, NL FROM subcategory INNER JOIN text ON subcategory.TextID = text.TextID WHERE SubCategoryID = ".$value['SubCategoryID'];
            $result = mysqli_query($conn,$query);
            $result = $result->fetch_array(true);
            $subcategories[$value['SubCategoryID']] = $result;
        }
    }

//    echo "<pre>";
//    print_r($brands);
//    echo "</pre>";
//
//    echo "<pre>";
//    print_r($categories);
//    echo "</pre>";
//
//    echo "<pre>";
//    print_r($subcategories);
//    echo "</pre>";

    if (isset($_GET['brand'])) {
        // filter on brand, remove if not found in array
        foreach ($result_filtered as $key => $value) {
            if (!in_array($value['BrandID'], $_GET['brand'])) {
                unset($result_filtered[$key]);
            }
        }
    }
    if (isset($_GET['category'])) {
        // filter on category, remove if not found in array
        foreach ($result_filtered as $key => $value) {
            if (!in_array($value['CategoryID'], $_GET['category'])) {
                unset($result_filtered[$key]);
            }
        }
    }
    if (isset($_GET['subcategory'])) {
        // filter on subcategory, remove if not found in array
        foreach ($result_filtered as $key => $value) {
            if (!in_array($value['SubCategoryID'], $_GET['subcategory'])) {
                unset($result_filtered[$key]);
            }
        }
    }

    // filter price
    if (isset($_GET['price_untill']) && !empty($_GET['price_untill']) && is_numeric($_GET['price_untill'])) {

        if (isset($_GET['price_from']) && !empty($_GET['price_from']) && is_numeric($_GET['price_from'])) {
            $priceFrom = $_GET['price_from'];
            if ($priceFrom < 0) {
                $priceFrom = 0.00;
            }
        }
        else {
            $priceFrom = 0.00;
        }
        $priceUntill = $_GET['price_untill'];

        if($priceUntill > $priceFrom) {
            // filter on price, remove if not found in array
            foreach ($result_filtered as $key => $value) {
                if ($value['Price'] < $priceFrom || $value['Price'] > $priceUntill) {
                    unset($result_filtered[$key]);
                }
            }
        }
        else {
            // price filter error
            $_SESSION['errors'] = array("Maximumprijs moet hoger zijn dan de minimumprijs.");
        }
    }

    //$result_all;
}
else {
    $_SESSION['errors'] = array("Geen zoekterm ingevoerd.");
}

//echo "<pre>";
//print_r($result_filtered);
//echo "</pre>";
?>
