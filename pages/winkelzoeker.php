<?php
$home = false;
$title = "Store locator";
$homepath; 
$home = false; 
require "../includes/header.php";
?>
    <script src="http://maps.googleapis.com/maps/api/js"></script>

    <style>
        #googleMap {
            margin: auto;
            padding: auto;
        }
        
        .buttonContact {
            display: block;
            width: 50%;
            align-content: center;
        }

    </style>

    <div class="content">
        <div class="container">
            <!--  Breadcrums menu   -->
            <?php include "../includes/breadcrumbs.php";?>
                <script>
                    function initialize() {
                        var mapProp = {
                            center: new google.maps.LatLng(51.583799, 4.796982),
                            zoom: 15,
                            mapTypeId: google.maps.MapTypeId.ROADMAP
                        };
                        var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
                    }
                    google.maps.event.addDomListener(window, 'load', initialize);

                </script>
                <div id="googleMap" style="width:750px;height:380px;"></div>
        </div>
    </div>


    <?php
require "../includes/footer.php";
?>
