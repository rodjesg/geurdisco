<?php
    ob_start();
    session_start();

    if($_SESSION['login']['status'] == true) {
        $_SESSION['login']['status'] = false;
        unset($_SESSION['login']['account']);
        
        header('location:../index.php');
    }
?>
