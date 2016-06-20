<?php
$home = false;
$title = "Store locator";
$homepath; 
$home = false; 
require "../includes/header.php";
?>

    <style>
        #googleMap {
            margin: auto;
            padding: auto;
            width: 750px;
            height: 350px;
        }

    </style>

    <div class="content">
        <div class="container">
            <!--  Breadcrums menu   -->
            <?php include "../includes/breadcrumbs.php";?>

                <script src="http://maps.googleapis.com/maps/api/js"></script>
                <script>
                    var myLocation = new google.maps.LatLng(51.58378, 4.79698);

                    function initialize() {
                        var mapProp = {
                            center: myLocation,
                            zoom: 15,
                            scrollwheel: false,
                            draggable: false,
                            mapTypeId: google.maps.MapTypeId.ROADMAP
                        };

                        var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);

                        var marker = new google.maps.Marker({
                            position: myLocation,
                        });

                        marker.setMap(map);
                    }

                    google.maps.event.addDomListener(window, 'load', initialize);

                </script>

                <p><address>
                <strong>Geurdiscounter.nl</strong><br>
  Hogeschoollaan  1 <br>
    4818 CR Breda, Noord Brabant, NL <br>
                        </address></p>

                <address>
  <strong>Geurdiscounter.nl</strong><br>
  <a href="mailto:info@geurdiscounter.nl">info@geurdiscounter.nl</a>
</address>

                <div id="googleMap" style=""></div>

        </div>
    </div>
    <?php
require "../includes/footer.php";
?>
