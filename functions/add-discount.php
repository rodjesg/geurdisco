<?php
session_start();
ob_start();
require "../includes/dbconnect.php";

// set datetime default (only local)
date_default_timezone_set('Europe/Amsterdam');

//unset($_SESSION['errors']);

if (isset($_SESSION['discountcode']) && is_array($_SESSION['discountcode'])) {
    // already discountcode suplied
    $_SESSION['errors'] = array("Reeds een kortingscode toegevoegd.");
}
else {
    // check if discount code is given
    if (isset($_POST['discountcode']) && !empty($_POST['discountcode'])) {
        $discountcode = $_POST['discountcode'];

        // get current date
        $currentDate = date('Y-m-d');

        // check if discount code is present in database
        $sql = "SELECT * FROM discountcode WHERE DiscountCode='$discountcode' AND '$currentDate' BETWEEN StartDate AND EndDate LIMIT 1";
        $result = mysqli_query($conn, $sql);

        if ($result->num_rows == 1) {
            // Discount code is valid.
            $result = $result->fetch_array(true);
            $discount['value'] = "";
            $discount['type'] = "";

            if (!empty($result['Percentage']) && is_numeric($result['Percentage'])) {
                // Discountcode is a percentage
                $discount['value'] = $result['Percentage'];
                $discount['type'] = "percentage";

                // Add discount to session
                $_SESSION['discountcode'] = $discount;
                $_SESSION['errors'] = array($discount['value'] . "% korting op uw bestelling toegepast.");
            } else if (!empty($result['Amount']) && is_numeric($result['Amount'])) {
                // Discountcode is fixed value
                $discount['value'] = $result['Amount'];
                $discount['type'] = "amount";

                // Add discount to session
                $_SESSION['discountcode'] = $discount;
                $_SESSION['errors'] = array("&euro; " . str_replace(".", ",", $discount['value']) . " korting op uw bestelling toegepast.");
            } else {
                // No discount available in record, return
                $_SESSION['errors'] = array("Er ging iets mis. Probeer opnieuw.");
            }
        } else {
            // no discount available in database, return
            $_SESSION['errors'] = array("De kortingscode is ongeldig.");
        }
    } else {
        $_SESSION['errors'] = array("Er ging iets mis. Probeer opnieuw.");
    }
}

header('location:../pages/shoppingbag.php');

?>