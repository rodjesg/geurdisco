<?php

require '../includes/dbconnect.php';
header("Content-Type: text/html; charset=ISO-8859-1");

?>

<!doctype html>

<html>
    
    <style>
 
 header{
		 position: relative;
         top: 5px;
		 margin: 15px 15px 20px 15px;
         height: 160px;
		 background-color: crimson;
         text-align: left center;
         padding-top: 2px;
		 padding-left: 35px;
         color: white; 
		 border-radius: 5px;
}

        h1{
            text-align: center;
            padding-top: 30px;
        }
        
         h3{
            text-align: center;
        }
        
 aside{
	position: relative;
	margin-right: 15px;
	background-color: darkcyan;
	height: 40px;
	margin: 15px 10px 15px 15px;
	border-radius: 5px;
	padding-top: 30px;
	padding-left: 20px;	
}

aside a{
	display: inline;
	color: darkseagreen;
	padding-right: 20px;
	text-decoration: none;
        }
        
aside a:hover{
	background: white;
}
        
select{
    padding: 12px 20px;
    width: 150px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;     
        }
  
        
 input[type=text] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
        }
        
 input[type=file] {
    padding: 12px 20px 12px 0px;
        }
        
input[type=text]:focus {
    background-color: lightblue;
}
        
        .ProductToevoegen{
               background: darkturquoise;
        }

        .form{
            width: 60%;
            padding: 12px 20px;
            margin: auto auto;
            float: center;      
        }
        
        label{
            
            font-weight: bold;
        }
    
    
    </style>


	<head>
		<meta charset="UTF-8">
        <meta charset="ISO">
		<meta name="author" content="Dennis van den Broek">
		<title>Admin/Products</title>
	</head>
	
	<body>
        <header>
            <h1>Beheersysteem Geurdiscounter.nl -- Product toevoegen</h1>
        </header>
        
		
		<aside>
                <a href="admin.php">Home</a>
				<a href="productAdd.php">Product toevoegen</a>
				<a href="users.php">Gebruikers beheren</a>
				<a href="">Zoektermen beheren</a>
		</aside>

		<main>
            <div class="form">
                <form class="ProductToevoegen" action="../functions/addProduct.php" method="post" enctype="multipart/form-data" >
				    <fieldset>
                       <h3>Product toevoegen</h3>
                            <label for="product naam">Product naam:</label><br>
                            <input type="text" name="ProductNaam"><br>
                            <label for="prijs">Prijs:</label><br>
                            <input type="text" name="Prijs"><br>
                            <label for="btw">BTW percentage: </label><br>
                            <select name="btw">
                                <option value="21">21%</option>
                                <option value="6">6%</option>
                                <option value="0">Geen</option>
                            </select><br>
                            <label for="voorraad">Aantal in voorraad:</label><br>
                            <input type="text" name="voorraad"><br>
                            <label for="merk">Merk: </label><br>
                            <select name="merk">
                              <?php
                                $query = "SELECT * FROM brand;";
                                $result = mysqli_query($conn,$query);
                                while ($row = $result->fetch_array(true)) {
                                    echo "<option value='".$row['BrandID']."'>".$row['BrandName']."</option>";
                                }
                                ?>                       
                          </select><br>
                          <label for="Text">Categorie:</label><br>
                          <select name="categorie">
                              <?php
                                $query = "SELECT * FROM `text` JOIN `category` ON `text`.`TextID` = `category`.`TextID`";
                                $result = mysqli_query($conn,$query);
                                while ($row = $result->fetch_array(true)) {
                                    echo "<option value='".$row['TextID']."'>".$row['NL']."</option>";
                                }
                                ?>                       
                          </select><br>
                          <label for="Text">Subcategorie:</label><br>
                          <select name="subcategorie">
                              <?php
                                $query = "SELECT * FROM `text` JOIN `subcategory` ON `text`.`TextID` = `subcategory`.`TextID`";
                                $result = mysqli_query($conn,$query);
                                while ($row = $result->fetch_array(true)) {
                                    echo "<option value='".$row['SubCategoryID']."'>".$row['NL']."</option>";
                                }
                                ?>                       
                          </select><br>
                          <input type="file" name="afbeelding" id="afbeelding"><br>
                        <button type="submit" class="button">Voeg product toe</button>              
                     </fieldset>
            </form></div>
            
            

			
		</main>
		
		<footer></footer>
	
	</body>
	
</html>