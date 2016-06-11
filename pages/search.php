<?php
$home = false;
$title = "Search results";
require "../includes/header.php";
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
                <h3>Search results</h3>
            </div>
            <div id="search-results">
            <?php
                if(isset($_POST['search']) && is_string($_POST['search'])) {
                    $searchterm = $_POST['search'];
                    $query = "SELECT * FROM product WHERE ProductName LIKE '%$searchterm%'";
//                    echo $query;
//                    die();
                    $result = mysqli_query($conn,$query);
                    while ($row = $result->fetch_row()) {
                        include('../includes/product-block.php');
                    }
                }
                else {

                }
            ?>
            </div>
        </div>
    </div>
</div>

<?php

require "../includes/footer.php";
?>