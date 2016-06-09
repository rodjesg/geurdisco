<?php
$title = "Home";
$home = true;
require "includes/header.php";
?>


<div class="content">
    <div class="container">
<!--        <!-- Current deals -->-->
<!--        <div class="row">-->
<!--            <div class="columns small-12">-->
<!--                <h3>Current deals</h3>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="row owl-carousel deals">-->
<!--            --><?php
//            for ($i = 0; $i < 4; $i++) {
//                include('includes/deals-block.php');
//            }
//            ?>
<!--        </div>-->
    <!-- Recently added -->
        <div class="row">
            <div class="columns small-12">
                <h3>Recently added</h3>
            </div>
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