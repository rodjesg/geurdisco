<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
session_start();

$servername = "127.0.0.1";
$username = "root";
$password = "root";
$database = "geurdiscounter";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['searchterm']) && is_string($_POST['searchterm'])) {
    echo "term ingevoerd";
    $searchterm = $_POST['searchterm'];
    $query = "SELECT * FROM product WHERE ProductName LIKE '%$searchterm%'";
    $result = mysqli_query($conn,$query);

    while ($row = $result->fetch_array(true)) {
        echo "<pre>";
        print_r($row);
        echo "</pre>";
//        include('../includes/product-block-results.php');
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
