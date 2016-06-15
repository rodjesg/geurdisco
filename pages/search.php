<?php
$home = false;
$title = "Search results";
require "../includes/header.php";
require "../includes/dbconnect.php";
?>

<div class="content">
    <div class="container">
        <div class="row">
            <div class="columns small-12">
                <h3>20 resultaten gevonden</h3>
                <h5>Je zocht naar test</h5>
            </div>
            <div class="columns small-12 medium-4 large-3">
                Filteren
            </div>
            <div class="columns small-12 medium-8 large-9">
                <div class="row">
                    <div class="columns small-12">
                        Sorteren
                    </div>

                        <div id="search-results">

                        <?php
                            if(isset($_POST['searchterm']) && is_string($_POST['searchterm'])) {
                                $searchterm = $_POST['searchterm'];
                                $query = "SELECT * FROM product WHERE ProductName LIKE '%$searchterm%'";
            //                    echo $query;
            //                    die();
                                $result = mysqli_query($conn,$query);
                                while ($row = $result->fetch_array(true)) {
                                    include('../includes/product-block-results.php');
                                }
                            }
                            else {
                            }
                        ?>


                            
                        </div>

                </div>
            </div>
        </div>
    </div>
</div>

<?php
require "../includes/footer.php";
?>