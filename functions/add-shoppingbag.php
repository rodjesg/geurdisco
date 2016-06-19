<?php
// Add product to shopping bag
session_start();
ob_start();
require "../includes/dbconnect.php";

if (!isset($_SESSION['shoppingbag'])) {
    $_SESSION['shoppingbag'] = "";
    $_SESSION['shoppingbag']['products'] = "";
    $_SESSION['shoppingbag']['personal'] = "";
    $_SESSION['shoppingbag']['delivery'] = "";
    $_SESSION['shoppingbag']['payment'] = "";
}

/**
Dit script voegt standaard een product toe aan de shopping bag
Wanneer dit product word toegevoegd vanuit de shoppingbag pagina of de productpagina, kan een gewenst aantal meegegeven worden
Dit word hier ook afgevangen
- ProductID
- Aantal
*/

// Taking products from the order
if ($_GET['ProductId']) {
    $productID = $_GET['ProductId'];
        echo $productID;
    if (isset($_GET['quantity']) && is_numeric($_GET['quantity'])) {
        $quantity = $_GET['quantity'];
        // replace product quantity
        $_SESSION['shoppingbag']['products'][$productID]['quantity'] += $quantity;
    }
    else {
        $quantity = 1;
        // increase product quantity
        $_SESSION['shoppingbag']['products'][$productID]['quantity'] += $quantity;
    }

    if(!isset($_SESSION['shoppingbag']['products'][$productID]['productInfo'])) {
        // get product information
        $query = "SELECT * FROM product INNER JOIN brand ON product.BrandID = brand.BrandID  WHERE product.productID = $productID";
        $result = mysqli_query($conn,$query)->fetch_array(true);
        // add product information to product session
        $_SESSION['shoppingbag']['products'][$productID]['productInfo'] = $result;
    }

    if ($_SESSION['shoppingbag']['products'][$productID]['quantity'] == 1) {
        $_SESSION['errors'] = array("Product succesvol toegevoegd aan de shopping bag.");
    }
    else {
        $_SESSION['errors'] = array("Product met $quantity stuk(s) verhoogd.");
    }
}else {
    $_SESSION['errors'] = array("Er ging iets mis. Probeer opnieuw.");
}

header('location:'.$_SERVER['HTTP_REFERER']);
?>
;