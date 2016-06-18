<?php
$title = "Account";
$home = false;
require "../includes/header.php";
require "../includes/dbconnect.php";

?>

    <style>
        * {
            box-sizing: border-box;
        }
        
        h3 {
            text-align: center;
        }
        
        .formlinks {
            width: 100%;
        }
        
        .linksbox {
            border: 1px solid;
            width: 60%;
            padding: 12px 20px;
            margin: 10px 30px 10px auto;
            float: right;
        }
        
        .rechtsbox {
            border: 1px solid;
            width: 60%;
            padding: 12px 20px;
            margin: 10px auto 10px 30px;
            float: left;
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





    <div class="content">
        <div class="container">
            <div class="row">
                <div class="large-6 columns left">
                    <div class="linksbox">
                        <h3>Sign in</h3>
                        <form class="formlinks">
                            <fieldset>
                                <label for="email">E-mail adress</label>
                                <input type="text" placeholder="Fill in you're E-mail>" <br>
                                <label for="pasword">Password</label>
                                <input type="password" placeholder="Fill in you're password">
                                <br>
                                <button type="submit" class="button">Sign in <span class="fa fa-sign-in"></span></button>
                            </fieldset>
                        </form>
                    </div>
                </div>

                <div class="large-6 columns right">
                    <div class="rechtsbox">
                        <h3>Create an account</h3>
                        <form class="rechts" action="../functions/register.php" method="post">
                            <fieldset>
                                <label for="email">E-mail adress *</label>
                                <input type="text" name="email" placeholder="Fill in you're E-mail">
                                <br>
                                <label for="email">Confirm E-mail adress *</label>
                                <input type="text" name="emailConfirm" placeholder="Confirm you're E-mail">
                                <br>
                                <label for="email">Password *</label>
                                <input type="password" name="password" placeholder="Fill in you're password">
                                <br>
                                <label for="email">Confirm password *</label>
                                <input type="password" name="passwordConfirm" placeholder="Confirm you're password">
                                <br>
                                <button type="submit" class="button">Register <span class="fa fa-check"></span></button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>






    <?php
require "../includes/footer.php";
?>
