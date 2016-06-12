<?php
$title = "Home";
$home = true;
require "includes/header.php";

$servername = "127.0.0.1";
$username = "root";
$password = "root";
$database = "geurdiscounter";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>


    <div class="content">
        <div class="container">

            <div class="row">
                <div class="columns small-12">
                    <h3>Test</h3>
                </div>
            </div>
            <div class="row owl-carousel products">

                <?php

        $queryProduct = "SELECT * FROM product ORDER BY ProductID DESC LIMIT 10";
        $resultProduct = mysqli_query($conn,$queryProduct);
        while ($row = $resultProduct->fetch_array(true)) {
            include('includes/product-block.php');
        }

        ?>
            </div>


            <div class="row">
                <div class="columns small-12">
                    <h3>Recently added</h3>
                </div>
                <div class="row owl-carousel products">
                    <?php
            for ($i = 0; $i < 8; $i++) {
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
            for ($i = 0; $i < 8; $i++) {
                include('includes/product-block.php');
            }
            ?>
                </div>
                <div class="row">
                    <div class="columns small-12">
                        <a href="#" class="viewmore">View all products <span class="fa fa-chevron-right"></span></a>
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
            for ($i = 0; $i < 8; $i++) {
                include('includes/product-block.php');
            }
            ?>
                </div>
                <div class="row">
                    <div class="columns small-12">
                        <a href="#" class="viewmore">View all products <span class="fa fa-chevron-right"></span></a>
                    </div>
                </div>

                <!-- Unisex -->
                <div class="row">
                    <div class="columns small-12">
                        <h3>Unisex</h3>
                    </div>
                </div>
                <div class="row owl-carousel products">
                    <?php
            for ($i = 0; $i < 4; $i++) {
                include('includes/product-block.php');
            }
            ?>
                </div>
                <div class="row">
                    <div class="columns small-12">
                        <a href="#" class="viewmore">View all products <span class="fa fa-chevron-right"></span></a>
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
            for ($i = 0; $i < 4; $i++) {
                include('includes/product-block.php');
            }
            ?>
                </div>
                <div class="row">
                    <div class="columns small-12">
                        <a href="#" class="viewmore">View all products <span class="fa fa-chevron-right"></span></a>
                    </div>
                </div>

                <!-- Special Editions -->
                <div class="row">
                    <div class="columns small-12">
                        <h3>Special Editions</h3>
                    </div>
                </div>
                <div class="row owl-carousel products">
                    <?php
            for ($i = 0; $i < 6; $i++) {
                include('includes/product-block.php');
            }
            ?>
                </div>
                <div class="row">
                    <div class="columns small-12">
                        <a href="#" class="viewmore">View all products <span class="fa fa-chevron-right"></span></a>
                    </div>
                </div>

            </div>


            <?php
require "includes/footer.php";
?>
