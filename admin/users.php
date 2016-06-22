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
        
        .GebruikersBeheren{
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
		<title>Admin/gebruikers</title>
	</head>
	
	<body>
        <header>
            <h1>Beheersysteem Geurdiscounter.nl -- Gebruikers beheren</h1>
        </header>
        
		
		<aside>
                <a href="admin.php">Home</a>
				<a href="productAdd.php">Product toevoegen</a>
				<a href="users.php">Gebruikers beheren</a>
				<a href="">Zoektermen beheren</a>
		</aside>

		<main>
            <div class="form">
                <form class="GebruikersBeheren" action="../functions/adminUsers.php" method="post">
				    <fieldset>
                       <h3>Beheer gebruikers wijzigen</h3>
                            <label for="Kies gebruiker">Kies gebruiker:</label><br>
                            <select name="gebruikers">
                              <?php
                                $query = "SELECT * FROM manager;";
                                $result = mysqli_query($conn,$query);
                                while ($row = $result->fetch_array(true)) {
                                    echo "<option value='".$row['ManagerID']."'>".$row['Email']."</option>";
                                }
                                ?>                       
                          </select><br>
                          <label for="mail">Nieuwe E-mail:</label><br>
                          <input type="text" name="mail"><br>
                          <label for="confirmMail">Bevestig nieuwe E-mail</label><br>
                          <input type="text" name="confirmMail"><br>
                        <button type="submit" class="button">Pas wijzigingen toe</button>              
                     </fieldset>
            </form></div>
		</main>
		
		<footer></footer>
	
	</body>
	
</html>