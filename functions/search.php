<?php
if(isset($_POST['searchterm']) && is_string($_POST['searchterm'])) {
    echo "term ingevoerd";
    $searchterm = $_POST['search'];
    $query = "SELECT * FROM product WHERE ProductName LIKE '%$searchterm%'";
    $result = mysqli_query($conn,$query);
    while ($row = $result->fetch_row()) {
        include('../includes/product-block-results.php');
    }

    $brands = getBrands($result);

    if(isset($_POST['category'])) {

    }
    if (isset($_POST['subcategory'])) {

    }
    if(isset($_POST['brand'])) {

    }
    if (isset($_POST['price_from']) && isset($_POST['price_from'])) {
        $priceFrom = $_POST['price_from'];
        $priceTill = $_POST['price_till'];
        if($priceTill > $priceFrom) {

        }
        else {
            // price filter error
        }
    }

    $brands = "";
    $categories = "";
    $subcategories = "";

//    $result = mysqli_query($conn,$query);
//    while ($row = $result->fetch_row()) {
//        include('../includes/product-block-results.php');
//    }
}
else {
    echo "geen term ingevoerd";
}
?>

<?php
//if(isset($_POST['search']) && is_string($_POST['search'])) {
//    $searchterm = $_POST['search'];
//    $query = "SELECT * FROM product WHERE ProductName LIKE '%$searchterm%'";
//    //                    echo $query;
//    //                    die();
//    $result = mysqli_query($conn,$query);
//    while ($row = $result->fetch_row()) {
//        include('../includes/product-block-results.php');
//    }
//}
//else {
//}

function getBrands($results) {
    foreach ($results as $key => $value) {
        print_r($key);
    }
}
?>
