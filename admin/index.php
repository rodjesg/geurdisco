<?php
$title = "Admin";
$home = false;
require "../includes/dbconnect.php";
?>

<style>
        * {
            box-sizing: border-box;
        }
    
         h3 {
            text-align: center;
        }
     
        h5 {
            text-align: center;
        }
        
        .admin {
            width: 20%;
            padding: 12px 20px;
            margin: 200px auto 100px auto;
            float: center;
        }
        
        input[type=text] {
            width: 100%;
            margin: 8px 0;
        }
    
       input[type=password] {
            width: 100%;
            margin: 8px 0;
        }
        
        
        label {
            font-size: 8, 5pt;
        }

    </style>


                  <form class="admin" action="../functions/admin.php" method="post">
				    <fieldset>
                       <h5>Admin log in</h5>
                            <label for="username">Username (E-mail)</label>
                            <input type="text" name="username" placeholder="Fill in you're username">
                            <label for="password">Password</label>
                            <input type="password" name="password" placeholder="Fill in you're password">
                            <button type="submit" class="button">Login <span class="fa fa-check"></span></button>               
                     </fieldset>
                 </form> 


