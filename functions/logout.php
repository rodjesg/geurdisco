<?php
    ob_start();
    session_start();

    if($_SESSION['login']['status'] == true) {
        $_SESSION['login']['status'] = false;
        unset($_SESSION['login']['accountInfo']);
        
        header('location:../index.php');
    }
?>
