<?php
$title = "Home";
$home = true;
setlocale(LC_TIME, 'nl_NL', 'nl', 'du');
date_default_timezone_set('Europe/Amsterdam');
$today = date("Y-m-d");
require "includes/header.php";
?>


    <div class="content">
        <div class="container">

            <div class="row">
                <div class="columns small-12">
                    <h3>Current Deals</h3>
                </div>
            </div>
            <div class="row owl-carousel products">

                <?php
                $query = "SELECT * FROM sale INNER JOIN product ON sale.ProductID = product.ProductID WHERE '". $today ."' BETWEEN sale.StartDate AND sale.EndDate ORDER BY sale.EndDate DESC";
                $result = mysqli_query($conn,$query);
                while ($row = $result->fetch_array(true)) {
                    include('includes/product-block-sale.php');
                }

                ?>

            </div>


            <div class="row">
                <div class="columns small-12">

                    <h3>Recently added</h3>
                </div>
                <div class="row owl-carousel products">
                    <?php
                    $query = "SELECT * FROM product ORDER BY ProductID DESC LIMIT 20";
                    $result = mysqli_query($conn,$query);
                    while ($row = $result->fetch_array(true)) {
                        include('includes/product-block.php');
                    }
                    ?>
                </div>

                <!-- Ladies -->
                <div class="row">
                    <div class="columns small-12">
                        <h3>Ladies</h3>
                    </div>
                </div>
                <div class="row owl-carousel products">
                    <?php
                        $query = "SELECT * FROM product WHERE CategoryID = 1 ORDER BY ProductID DESC LIMIT 20";
                        $result = mysqli_query($conn,$query);
                        while ($row = $result->fetch_array(true)) {
//                            echo "<pre>";
//                            print_r($row);
//                            echo "</pre>";
                            include('includes/product-block.php');
                        }
                        ?>
                </div>
                <div class="row">
                    <div class="columns small-12">
                        <a href="pages/overview.php?id=1" class="viewmore">View all products <span class="fa fa-chevron-right"></span></a>
                    </div>
                </div>

                <!-- Men -->
                <div class="row">
                    <div class="columns small-12">
                        <h3>Men</h3>
                    </div>
                </div>
                <div class="row owl-carousel products">
                    <?php
                    $query = "SELECT * FROM product WHERE CategoryID = 2 ORDER BY ProductID DESC LIMIT 20";
                    $result = mysqli_query($conn,$query);
                    while ($row = $result->fetch_array(true)) {
                        include('includes/product-block.php');
                    }
                    ?>
                </div>
                <div class="row">
                    <div class="columns small-12">
                        <a href="pages/overview.php?id=2" class="viewmore">View all products <span class="fa fa-chevron-right"></span></a>
                    </div>
                </div>

                <!-- Children -->
                <div class="row">
                    <div class="columns small-12">
                        <h3>Children</h3>
                    </div>
                </div>
                <div class="row owl-carousel products">
                    <?php
                    $query = "SELECT * FROM product WHERE CategoryID = 3 ORDER BY ProductID DESC LIMIT 20";
                    $result = mysqli_query($conn,$query);
                    while ($row = $result->fetch_array(true)) {
                        include('includes/product-block.php');
                    }
                    ?>
                </div>
                <div class="row">
                    <div class="columns small-12">
                        <a href="pages/overview.php?id=3" class="viewmore">View all products <span class="fa fa-chevron-right"></span></a>
                    </div>
                </div>

            </div>


            <?php
require "includes/footer.php";
?>
