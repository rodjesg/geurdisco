<?php
$title = "Overview";
$homepath; 
$home = false; 
require "../includes/header.php";
require "../includes/dbconnect.php";

/*
SELECT DISTINCT product.`SubCategoryID`, text.`EN`, text.`NL` FROM product INNER JOIN subcategory ON product.`SubCategoryID` = subcategory.`SubCategoryID` INNER JOIN text ON subcategory.`TextID` = text.`TextID` WHERE CategoryID = 2;
*/

// check if category id is present in url
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $categoryId = $_GET['id'];
    
    
    $query = "SELECT * FROM product WHERE CategoryID = $categoryId ORDER BY ProductID DESC LIMIT 100";
    $result = mysqli_query($conn,$query);
    if (!$result) {
        // if no results in database
        header('location:index.php');
    }
    
    // get subcategories
    
    /* Oude Query: 
   SELECT DISTINCT SubCategoryID FROM product INNER JOIN subcategorie ON product.SubCategoryID = subcategory.SubCategoryID AND INNER JOIN text ON subcategory.TextID = text.TextID WHERE CategoryID 
   */
    
     $query2 = "SELECT DISTINCT product.`SubCategoryID`, text.`EN`, text.`NL` FROM product INNER JOIN subcategory ON product.`SubCategoryID` = subcategory.`SubCategoryID` INNER JOIN text ON subcategory.`TextID` = text.`TextID` WHERE CategoryID = $categoryId";
  
    echo $query2;
    $result2 = mysqli_query($conn, $query2);
    $result2 = $result2->fetch_all();
    print_r($result2);
}
else {
    // redirect to home if id not present
    header('location:index.php');
}

?>
    <!-- Overview pagina Overviewpagina - vragen of id meegegeven in url - zo niet: redirect terug - zo ja, check if numeric - zo ja: - haal categorie naam op (query op text id, voorlopig nl) - haal producten op met die categorie (query op categorie id) - haal de subcategorieën op (query op subcategorie id in resultaat producten) -->


    <style>
        .block1Overview {
            border: 1px solid;
            border-width: 1px;
            padding: 12px 20px;
        }
        
        .buttonOverview {
            display: block;
            width: 50%;
            align-content: center;
        }

    </style>

    <div class="content">
        <div class="container">
            <!--  Breadcrums menu   -->
            <?php include "../includes/breadcrumbs.php";?>


                <!-- Content -->
                <div class="row" data-equalizer>
                    <div class="large-4 columns">
                        <h3>Catagories</h3>
                        <div class="block1Overview">

                            <div class="button buttonOverview"><span class="fa "></span><span>&nbsp;Facebook</span></div>
                            <div class="button buttonOverview"><span class="fa "></span><span>&nbsp;Instagram</span></div>
                            <div class="button buttonOverview"><span class="fa "></span><span>&nbsp;Twitter</span></div>
                            <div class="button buttonOverview"><span class="fa "></span><span>&nbsp;Google +</span></div>
                            <div class="button buttonOverview"><span class="fa "></span><span>&nbsp;WhatsApp</span></div>

                        </div>


                    </div>
                    <div class="large-8 columns">
                        <img class="productimg" src="http://dummyimage.com/750x150/000000/fff" title="productview">
                        <h3> Recently Added</h3>
                        <div class="row products">
                            <?php
                            while ($row = $result->fetch_array(true)) {
                                    include($prepath.'includes/product-block-results.php');
                                }
                            ?>
                        </div>
                    </div>
                </div>

        </div>
    </div>

    <?php
require "../includes/footer.php";
?>
