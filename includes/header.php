<?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    ob_start();
    session_start();
    $prepath = "";
    $homepath = "#";
    if ($home !== true) {
        $prepath = "../";
        $homepath = "../index.php";
    }

    // check if session login created
    if(!isset($_SESSION['login'])) {
        $_SESSION['login']['status'] = false;
    }
    header("Content-Type: text/html; charset=ISO-8859-1");

?>

    <!doctype html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>
            <?=$title?> - Parfum Discounter</title>
        <!-- foundation style -->
        <link rel="stylesheet" href="<?=$prepath?>assets/css/foundation.css" />
        <!-- basic style -->
        <link rel="stylesheet" href="<?=$prepath?>assets/css/app.css" />
        <!-- icons -->
        <link rel="stylesheet" href="<?=$prepath?>assets/css/font-awesome.min.css" />
        <!-- Important Owl stylesheet -->
        <link rel="stylesheet" href="<?=$prepath?>assets/css/owl.carousel.css">
        <!-- Notifier -->
        <link rel="stylesheet" href="<?=$prepath?>assets/css/notie.css" />
        <!-- Default Theme -->
        <link rel="stylesheet" href="<?=$prepath?>assets/css/owl.theme.css">
        <!-- theme style -->
        <link rel="stylesheet" href="<?=$prepath?>assets/css/themes/theme-1.css" />
    

    </head>

    <body>
        <!-- loadscreen -->
        <div class="loadscreen">
            <div class="loader"></div>
        </div>
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
                            <form method="get" action="<?=$prepath?>pages/search.php">
                                <input name="searchterm" type="search" placeholder="I'm searching">
                                <button type="submit" class="fa fa-search"></button>
                            </form>
                        </div>

                        <!-- search mobile / tablet -->
                        <div class="search-mobile hide-for-large">
                            <div class="fa fa-search toggle"></div>
                            <div class="search-container-mobile dropdown-container">
                                <h5>Find your product</h5>
                                <form method="get" action="<?=$prepath?>/pages/search.php">
                                    <input name="searchterm" type="search" placeholder="I'm searching">
                                    <input type="submit" class="button" value="Search">
                                </form>
                            </div>
                        </div>
                        <!-- login -->
                        <div class="top-login">
                            <div class="toggle">
                                <div class="fa fa-user"></div>
                                <div class="hide-for-small-only">
                                    <div>Account</div>
                                    <div class="fa fa-chevron-down"></div>
                                </div>
                            </div>
                            <div class="login-container dropdown-container">
                                <h5>Your account</h5>
                                <?php
                                    if($_SESSION['login']['status'] == false) {
                                ?>
                                    <form method="post" action="<?=$prepath?>functions/login.php">
                                        <input type="text" name="email" placeholder="E-mail address">
                                        <input type="password" name="password" placeholder="Password">
                                        <input type="submit" class="button" value="Login">
                                    </form>
                                    <ul>
                                        <li><a href="<?=$prepath?>pages/account.php">Create an account</a></li>
                                        <li><a href="#">Lost your password?</a></li>
                                    </ul>
                                    <?php
                                    }
                                    else {
                                ?>
                                        <p>
                                            Hoi <strong><?=$_SESSION['login']['accountInfo']['SureName']?></strong>,
                                            <br/> Je bent ingelogd met account:
                                            <br/>
                                            <strong><?=$_SESSION['login']['accountInfo']['Email']?></strong>
                                        </p>
                                        <ul>
                                            <li><a href="<?=$prepath?>pages/orderhistory.php">Order history</a></li>
                                            <li><a href="<?=$prepath?>functions/logout.php">Logout</a></li>
                                        </ul>
                                        <?php
                                    }
                                ?>
                                            <div class="language-container">
                                                <h5>Language</h5>
                                                <form>
                                                    <input type="radio" name="language" checked value="nl" id="language-nl">
                                                    <label for="language-nl">Nederlands</label>
                                                    <input type="radio" name="language" value="en" id="language-en">
                                                    <label for="language-en">English</label>
                                                </form>
                                            </div>

                            </div>
                        </div>
                        <!-- wishlist -->
                        <a href="<?=$prepath?>pages/wishlist.php" class="top-wishlist hide-for-small-only">
                            <div class="fa fa-star"></div>
                            <div>Wishlist</div>
                        </a>
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
                                <a href="<?=$prepath?>pages/shoppingbag.php" class="button">View shopping bag</a>
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
                                            <img src="<?=$prepath?>assets/img/img-placeholder">
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
