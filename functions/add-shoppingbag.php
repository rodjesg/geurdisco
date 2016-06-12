<?php
// Add product to shopping bag
session_start();
if (!isset($_SESSION['shoppingbag'])) {
    $_SESSION['shoppingbag'] = "";
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
        
    if ($_GET['quantity'] && is_numeric($_GET['quantity'])) {
        $quantity = $_GET['quantity'];
    }
    else {
        $quantity = 1;
    }

    $_SESSION['shoppingbag'][$productID] = $quantity;
    echo "<pre>";
    print_r($_SESSION['shoppingbag']);
    echo "</pre>";
    die();
    
}else {
    echo "NO dat doe ik niet";
    
}
 //echo $productID;


//header('location:../pages/shopping-bag.php');

?>
