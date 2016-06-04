    <!-- Brands slider -->
    <div class="container">
        <div class="row">
            <div class="columns small-12">
                <h3>Our Brands</h3>
            </div>
        </div>
        <div class="row owl-carousel brands">
            <?php
            for ($i = 0; $i < 20; $i++) {
                include('includes/brand-block.php');
            }
            ?>
        </div>
    </div>
</div> <!-- content end -->

<div class="footer">
    <div class="container">
        <div class="row">
            <div class="columns small-12 medium-4">
                <h4>Footer heading</h4>
                <ul>
                    <li><a href="#">Footer link</a></li>
                    <li><a href="#">Footer link</a></li>
                    <li><a href="#">Footer link</a></li>
                    <li><a href="#">Footer link</a></li>
                    <li><a href="#">Footer link</a></li>
                </ul>
            </div>

            <div class="columns small-12 medium-4">
                <h4>Footer heading</h4>
                <ul>
                    <li><a href="#">Footer link</a></li>
                    <li><a href="#">Footer link</a></li>
                    <li><a href="#">Footer link</a></li>
                    <li><a href="#">Footer link</a></li>
                    <li><a href="#">Footer link</a></li>
                </ul>
            </div>

            <div class="columns small-12 medium-4">
                <h4>Footer heading</h4>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid cumque dolor, facilis fugit, illum impedit itaque minus nesciunt perferendis quae repudiandae ut. Cum odit quaerat quas quod, sed vitae voluptas.
                </p>
            </div>
        </div>
    </div>
</div>

<div class="subfooter">
    <div class="container">
        <div class="row">
            <div class="columns small-12">
                &copy; 2016 ParfumDiscounter.nl
            </div>
        </div>
    </div>
</div>

<script src="<?=$prepath?>assets/js/vendor/jquery.js"></script>
<script src="<?=$prepath?>assets/js/vendor/what-input.js"></script>
<script src="<?=$prepath?>assets/js/vendor/foundation.min.js"></script>
<script src="<?=$prepath?>assets/js/owl.carousel.js"></script>
<!-- basic scripts -->
<script src="<?=$prepath?>assets/js/app.js"></script>

</body>
</html>