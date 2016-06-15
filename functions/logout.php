<?php
    ob_start();
    session_start();

    if($_SESSION['login']['status'] == true) {
        $_SESSION['login']['status'] = false;
        $_SESSION['errors'] = array("Je bent succesvol uitgelogd.");
        unset($_SESSION['login']['accountInfo']);
        
        header('location:../index.php');
    }
?>
