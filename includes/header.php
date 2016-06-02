<?php
    $prepath = "";
    $homepath = "#";
    if ($home !== true) {
        $prepath = "../";
        $homepath = "../index.php";
    }
?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?=$title?> - Parfum Discounter</title>
    <!-- foundation style -->
    <link rel="stylesheet" href="<?=$prepath?>assets/css/foundation.css" />
    <!-- basic style -->
    <link rel="stylesheet" href="<?=$prepath?>assets/css/app.css" />
    <!-- theme style -->
    <link rel="stylesheet" href="<?=$prepath?>assets/css/themes/theme-1.css" />
    <!-- icons -->
    <link rel="stylesheet" href="<?=$prepath?>assets/css/font-awesome.min.css" />

    <!-- jQuery -->
    <script src="<?=$prepath?>assets/js/vendor/jquery.js"></script>
    <!-- foundation js -->
    <script src="<?=$prepath?>assets/js/vendor/foundation.min.js"></script>
    <!-- basic scripts -->
    <script src="<?=$prepath?>assets/js/app.js"></script>
</head>
<body>

<!-- topmenu -->
<div class="topmenu">
    <!-- mainmenu -->
    <div class="topmenu-main">
        <div class="container">

            <!-- left -->
            <div class="top-left">
                <!-- logo -->
                <a href="<?=$homepath?>" class="top-logo"></a>
                <!-- search -->
                <div class="search-desktop show-for-large">
                    <input name="search" type="search" placeholder="I'm searching">
                    <div class="fa fa-search"></div>
                </div>

                <!-- search mobile / tablet -->
                <div class="search-mobile hide-for-large">
                    <div class="fa fa-search toggle"></div>
                    <div class="search-container-mobile dropdown-container">
                        <form>
                            <p>
                                Find your product
                            </p>
                            <input name="search" type="search" placeholder="I'm searching">
                            <input type="submit" class="button" placeholder="Search"
                        </form>
                     </div>
                </div>
            </div>

            <!-- right -->
            <div class="top-right">
                <!-- login -->
                <div class="top-login">
                    <div class="toggle">
                        <div class="fa fa-user"></div>
                        <div class="hide-for-small-only">
                            <div>Login</div>
                            <div class="fa fa-chevron-down"></div>
                        </div>
                    </div>
                    <div class="login-container dropdown-container">
                        <form>
                            <p>
                                Account
                            </p>
                            <input type="submit" class="button" placeholder="Search"
                        </form>
                    </div>
                </div>
                <!-- wishlist -->
                <div class="top-wishlist">
                    <div class="fa fa-star"></div>
                    <div class="hide-for-small-only">Wishlist</div>
                </div>
                <!-- shopping bag -->
                <div class="top-shoppingbag">
                    <div class="toggle">
                        <div class="fa fa-shopping-bag"></div>
                        <div class="hide-for-small-only">Shopping bag</div>
                        <div class="fa fa-chevron-down hide-for-small-only"></div>
                    </div>
                    <div class="shoppingbag-container dropdown-container">
                        <form>
                            <p>
                                Shopping Bag
                            </p>
                            <input type="submit" class="button" placeholder="Search"
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- submenu -->
    <div class="topmenu-sub"></div>
</div>