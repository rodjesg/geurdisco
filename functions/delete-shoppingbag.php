<?php
session_start();
ob_start();
// Remove product from shopping bag

if (!isset($_SESSION['shoppingbag']) || empty($_SESSION['shoppingbag'])) {
    header('location:../pages/shoppingbag.php');
}

/**
Dit script verwijderd items uit een shoppingbag
 */

// Taking products from the order
if ($_GET['ProductId'] && is_numeric($_GET['ProductId'])) {
    $productID = $_GET['ProductId'];
    // remove product
    if ($_SESSION['shoppingbag'] && is_array($_SESSION['shoppingbag'])) {
        unset($_SESSION['shoppingbag'][$productID]);
        $_SESSION['errors'] = array("Product succesvol uit de shopping bag verwijderd.");
    }

}else {
    $_SESSION['errors'] = array("Er ging iets mis. Probeer opnieuw.");
}

header('location:../pages/shoppingbag.php');

?>
