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
    <!-- icons -->
    <link rel="stylesheet" href="<?=$prepath?>assets/css/font-awesome.min.css" />
    <!-- Important Owl stylesheet -->
    <link rel="stylesheet" href="<?=$prepath?>assets/css/owl.carousel.css">
    <!-- Default Theme -->
    <link rel="stylesheet" href="<?=$prepath?>assets/css/owl.theme.css">
    <!-- theme style -->
    <link rel="stylesheet" href="<?=$prepath?>assets/css/themes/theme-1.css" />

</head>
<body>

<!-- topmenu -->
<div class="topmenu color-primary-2">

    <!-- mainmenu -->
    <div class="topmenu-main">
        <div class="container">

            <!-- left -->
            <div class="top-left">
                <!-- logo -->
                <a href="<?=$homepath?>" class="top-logo"></a>
            </div>

            <!-- right -->
            <div class="top-right">
                <!-- search -->
                <div class="search-desktop show-for-large">
                    <input name="search" type="search" placeholder="I'm searching">
                    <div class="fa fa-search"></div>
                </div>

                <!-- search mobile / tablet -->
                <div class="search-mobile hide-for-large">
                    <div class="fa fa-search toggle"></div>
                    <div class="search-container-mobile dropdown-container">
                        <h5>Find your product</h5>
                        <form>
                            <input name="search" type="search" placeholder="I'm searching">
                            <input type="submit" class="button" value="Search">
                        </form>
                    </div>
                </div>
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
                        <h5>Your account</h5>
                        <form>
                            <input type="text" placeholder="E-mail address">
                            <input type="password" placeholder="Password">
                            <input type="submit" class="button" value="Login">
                        </form>
                        <ul>
                            <li><a href="#">Create an account</a></li>
                            <li><a href="#">Lost your password?</a></li>
                        </ul>
                    </div>
                </div>
                <!-- wishlist -->
                <div class="top-wishlist hide-for-small-only">
                    <div class="fa fa-star"></div>
                    <div>Wishlist</div>
                </div>
                <!-- shopping bag -->
                <div class="top-shoppingbag">
                    <div class="toggle">
                        <div class="fa fa-shopping-bag"></div>
                        <div class="hide-for-small-only">Shopping bag</div>
                        <div class="fa fa-chevron-down hide-for-small-only"></div>
                    </div>
                    <div class="shoppingbag-container dropdown-container">
                        <h5>Shopping bag</h5>
                        <p>
                            There are currently no items in your shopping bag.
                        </p>
                        <a href="#" class="button">View shopping bag</a>
                    </div>
                </div>
                <div class="top-openmobile show-for-small-only">
                    <div class="fa fa-bars"></div>
                </div>
            </div>

        </div>
    </div>

    <!-- submenu -->
    <div class="topmenu-sub">
        <div class="container">
            <ul class="submenu-list">
                <li class="submenu-section">
                    <a href="#" class="submenu-section-item">
                        Listitem section
                    </a>
                    <div class="submenu-container">
                        <div class="container">
                            <div class="row">
                                <div class="columns medium-4">
                                    <h4>Categories</h4>
                                    <ul>
                                        <li><a href="#">Listitem categorie</a></li>
                                        <li><a href="#">Listitem categorie</a></li>
                                        <li><a href="#">Listitem categorie</a></li>
                                        <li><a href="#">Listitem categorie</a></li>
                                        <li><a href="#">Listitem categorie</a></li>
                                        <li><a href="#">Listitem categorie</a></li>
                                    </ul>
                                </div>
                                <div class="columns medium-4">
                                    <h4>Brands</h4>
                                    <ul>
                                        <li><a href="#">Listitem categorie</a></li>
                                        <li><a href="#">Listitem categorie</a></li>
                                        <li><a href="#">Listitem categorie</a></li>
                                        <li><a href="#">Listitem categorie</a></li>
                                        <li><a href="#">Listitem categorie</a></li>
                                        <li><a href="#">Listitem categorie</a></li>
                                    </ul>
                                </div>
                                <div class="columns medium-4">
                                    <img src="<?=$prepath?>assets/img/img-placeholder" >
                                </div>
                            </div>
                        </div>
                    </div>
                </li>

                <li class="show-for-small-only"><a href="#">Wishlist</a></li>
            </ul>
        </div>
    </div>
</div>