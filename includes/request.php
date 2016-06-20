<?php
// set datetime default (only local)
date_default_timezone_set('Europe/Amsterdam');
?>



<div class="large-12 columns ">
    <!-- Request question -->
    <form method="post" name="offer">
        <button class="button" name="submit" type="submit">Offerte aanvragen</button>
    </form>

    <!-- Ik wil nu als Ja klikt, dat dan de php volgt. Als je Nee klikt dan terug naar de hoofdpagina. Hoe doe je dat? -->
    <?php
    if (isset($_POST['submit'])) {
        if (isset($_SESSION['login']) && $_SESSION['login']['status'] == true) {
            //Query to database table request
            $date = date("Y-m-d") ;
            $accountid = $_SESSION['login']['accountInfo']['AccountID'];

            //$query = "INSERT INTO request (AccountID, Date) VALUES ($accountid, '$date');";
            //$result = mysqli_query($conn,$query);

            //Mail to user
            $user = $_SESSION['login']['accountInfo']['SureName'];
            $message = "Beste $user,\r\n<br><br>U heeft een offerte aangevraagd op product \"$searchterm\".\r\n<br>Zodra het product beschikbaar is, krijgt u daar een bericht van.\r\n<br><br>Met vriendelijke groet\r\n<br>De GeurDiscounter" ;

            $headers =  'MIME-Version: 1.0'."\r\n";
            $headers .= 'From: GeurDiscounter <info@geurdiscounter.nl>'."\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";

            $mail = $_SESSION['login']['accountInfo']['Email'];
            $mail = "bram@bramdehart.nl";
            mail($mail, 'Offerte aanvraag GeurDiscounter', $message, $headers);

            $_SESSION['errors'] = array("Offerte verzonden naar $mail");
            
            //$_SESSION['login']['accountInfo']['Email'];
            //header('location:../pages/shoppingbag.php');
        }
        else {
            $_SESSION['errors'] = array("Log in om een offerte aan te vragen.");
        }
    }
    else {
    ?>


    <?php
    }
    ?>
</div>


