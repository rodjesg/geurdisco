<?php
$title = "Account";
$home = false;
require "../includes/header.php";
require "../includes/dbconnect.php";
$searchterm = test ;
?>





<div class="content">
     <div class="container">
         <div class="row">
             <div class="large-12 columns "> 
                 
                  <?php
                    if (isset($_SESSION['login']) && $_SESSION['login']['status'] == true) {
                        
                        echo "<h3>".$_SESSION['login']['accountInfo']['SureName']."'s Offerte aanvraag</h3>";
                        echo "<p>Product: $searchterm</p>" ;
                        echo "<p>De offerte wordt gemaild naar: " .$_SESSION['login']['accountInfo']['Email']. "</p>" ;
                        
                        //Query to database table request
                        $date = date("Y-m-d") ;
                        $accountid = $_SESSION['login']['accountInfo']['AccountID'];
                        
                        $query = "INSERT INTO request (AccountID, Date)
                        VALUES ($accountid, '$date') ; ";
                        $result = mysqli_query($conn,$query);
                        
                        //Mail to user
                        
                        $user = $_SESSION['login']['accountInfo']['SureName'];
                        $message = "Beste $user,\r\n<br><br>U heeft een offerte aangevraagd op product \"$searchterm\".\r\n<br>Zodra het product beschikbaar is, krijgt u daar een bericht van.\r\n<br><br>Met vriendelijke groet\r\n<br>De GeurDiscounter" ;
                        
                        //echo $message ;
                        $headers =  'MIME-Version: 1.0' . "\r\n"; 
                        $headers .= 'From: Your name <info@geurdiscounter.nl>' . "\r\n";
                        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                        
                        $mail = $_SESSION['login']['accountInfo']['Email'];
                        mail($mail, 'Offerte aanvraag GeurDiscounter', $message, $headers) ;
                        
                        ?>
                        
                        
                        
                        
                        <?php
                        /*
// The message
$message = "Line 1\r\nLine 2\r\nLine 3";

// In case any of our lines are larger than 70 characters, we should use wordwrap()
$message = wordwrap($message, 70, "\r\n");

// Send
mail('caffeinated@example.com', 'My Subject', $message);
?>
                 
                 <?php
$to      = 'nobody@example.com';
$subject = 'the subject';
$message = 'hello';
$headers = 'From: webmaster@example.com' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
?>
            
                         /*                   
                        // check if account has request product
                        if ($result->num_rows == 0) {
                            echo "<p>Je hebt nog geen producten aan je offerte toegevoegd.</p>";
                        }
                        // if has products, loop through each
                        else {
                            while ($row = $result->fetch_array(true)) {
                                include($prepath.'includes/product-block-wishlist.php');
                            }
                        }*/
                    }
                    else {
                        echo "<h3>Offerte aanvraag</h3>";
                        echo "<p>Je bent niet ingelogd.</p>";
                    }
                 ?>
                 
                 
                 
                 
                  
           </div> 
        </div>
    </div>
</div>

<?php
require "../includes/footer.php";
?>

