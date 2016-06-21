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
		<meta name="author" content="Dennis van den Broek">
		<title>Admin</title>
	</head>
	
	<body><header><h1>Beheersysteem Geurdiscounter.nl -- Product toevoegen</h1></header>
        
		
		<aside>
                <a href="admin.php">Home</a>
				<a href="productAdd.php">Product toevoegen</a>
				<a href="">Gebruikers beheren</a>
				<a href="">Database</a>
				<a href="">Van alles</a>
		</aside>

		<main>
            
            
            <div class="form"><form class="ProductToevoegen" action="../functions/addProduct.php" method="post">
				    <fieldset>
                       <h3>Product toevoegen</h3>
                            <label for="product naam">Product naam:</label><br>
                            <input type="text" name="ProductNaam"><br>
                            <label for="prijs">Prijs:</label><br>
                            <input type="text" name="Prijs"><br>
                            <label for="btw">BTW percentage: </label><br>
                            <select>
                                <option value="21">21%</option>
                                <option value="6">6%</option>
                                <option value="0">Geen</option>
                            </select><br>
                            <label for="voorraad">Aantal in voorraad:</label><br>
                            <input type="text" name="Voorraad"><br>
                            <label for="merk">Merk: </label><br>
                            <select>
                                  <?php
                                $query = "SELECT * FROM brand;";
                                $result = mysqli_query($conn,$query);
                                while ($row = $result->fetch_array(true)) {
                                    echo "<option value='".$row['BrandID']."'>".$row['BrandName']."</option>";
                                }
                                ?>                       
                          </select>
                           <button type="submit" class="button">Register</button>              
                     </fieldset>
            </form></div>
			
		</main>
		
		<footer></footer>
	
	</body>
	
</html>