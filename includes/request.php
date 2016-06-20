<div class="content">
     <div class="container">
         <div class="row">
             <div class="large-12 columns "> 
                 
                 <!-- Request question -->
                 <div class="request-box">
                   <h2>Wilt u een offerte aanvragen?</h2>
                       <div class="button"><span>&nbsp;Ja</span></div>
                       <div class="button"><span>&nbsp;Nee</span></div>
                    </div>
                 
                 <!-- Ik wil nu als Ja klikt, dat dan de php volgt. Als je Nee klikt dan terug naar de hoofdpagina. Hoe doe je dat? -->
                 
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
                        $headers .= 'From: GeurDiscounter <info@geurdiscounter.nl>' . "\r\n";
                        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                        
                        $mail = $_SESSION['login']['accountInfo']['Email'];
                        $mail = "bram@bramdehart.nl";
                        mail($mail, 'Offerte aanvraag GeurDiscounter', $message, $headers) ;
                        
            
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

