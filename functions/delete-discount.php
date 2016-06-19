<?php
session_start();
ob_start();
require "../includes/dbconnect.php";

// check if session excist
if (isset($_SESSION['discountcode']) && !empty($_SESSION['discountcode'])) {
    // unset discount session
    unset($_SESSION['discountcode']);
    $_SESSION['errors'] = array("Kortingscode succesvol verwijderd");
}

header('location:../pages/shoppingbag.php');
?>