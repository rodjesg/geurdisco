<?php
$home = false;
$title = "Contact";
$home = false; 
require "../includes/header.php";
?>

    <style>
        .block1Contact {
            border-style: ridge;
            border-width: 1px;
            padding: 10px;
        }

    </style>


    <div class="content">
        <div class="container">
            <div class="row">
                <div class="small-4 large-4 columns">
                    <h2>Send a message</h2>
                    <div class="block1Contact">
                        <form>
                            <label>E-mail address:
                                <input type="text" placeholder="something@example.com">
                            </label>
                            <label>Subject:
                                <input type="text" placeholder="Your subject">
                            </label>
                            <label>Message:
                                <textarea placeholder="None"></textarea>
                            </label>
                            <label>
                                <div class="button"><span class="fa fa-paper-plane-o"></span><span>&nbsp;Send message</span></div>
                            </label>
                        </form>
                    </div>
                </div>


                <div class="small-4 large-4 columns">

                    <h2>Live chat</h2>

                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. </p>
                    <div class="button"><span class="fa fa-comment"></span><span>&nbsp;Start chat</span></div>

                </div>





                <div class="small-6 large-4 columns">


                    <h2>Social media</h2>


                </div>
            </div>
        </div>
    </div>


    <?php
require "../includes/footer.php";
?>
