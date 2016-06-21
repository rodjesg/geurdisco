<?php
$home = false;
$title = "Shipping info";
$homepath; 
$home = false; 
require "../includes/header.php";
?>

    <style>
        table {
            display: table;
            border-collapse: separate;
            border-spacing: 2px;
            border-color: gray;
        }
        
        .truck1 {
            color: green;
        }
        
        .truck2 {
            color: orange;
        }
        
        .truck3 {
            color: orange;
        }
        
        .truck4 {
            color: orange;
        }
        
        .truck5 {
            color: red;
        }
        
        .truck6 {
            color: blue;
        }

    </style>


    <div class="content">
        <div class="container">
            <!--  Breadcrums menu   -->
            <?php include "../includes/breadcrumbs.php";?>

                <h3>Verzending en bezorging</h3>
                <p>Voor het bezorgen van uw bestelling maken wij gebruik van PostNL. Indien u niet aanwezig bent, biedt de bezorger van PostNL het pakket op een ander moment nogmaals aan en/of laat een kaartje bij u achter. U kunt vervolgens contact opnemen met PostNL om aan te geven hoe en wanneer u uw bestelling alsnog wenst te ontvangen. Het is ook mogelijk dat het pakket bij de buren wordt afgeleverd. Dit wordt dan aangegeven op het kaartje in uw brievenbus. Bent u bij meerdere pogingen tot bezorging niet aanwezig, dan wordt het pakket retour gezonden naar ons magazijn. PostNL bezorgt van dinsdag tot en met zaterdag. Online bestellingen worden gratis naar u verzonden.</p>
                <br>
                <p>Bent u benieuwd naar de status van uw levering of binnen welk tijdsbestek uw pakket wordt geleverd? Kijk dan op <a href="https://jouw.postnl.nl">jouw.post.nl</a>, vul uw track and trace code of niet-thuis code in en de postcode die u heeft opgegeven bij het plaatsen van uw bestelling. U kunt hier de actuele status van uw levering 24 uur per dag bekijken.</p>
                <br>
                <h3>Levertijden</h3>
                <p>Onderstaande tabel geeft d.m.v. de gekleurde vrachtwagen-icoontjes weer wat de verwachte levertijd van een product is.</p>
                <table>
                    <tr>
                        <th>LEVERING </th>
                        <th> LEVERTIJDEN </th>
                        <th></th>
                    </tr>
                    <tr>
                        <td><i class="fa fa-truck truck1" aria-hidden="true"></i></td>
                        <td> Direct leverbaar </td>
                        <td>2-5 werkdagen </td>
                    </tr>
                    <tr>
                        <td><i class="fa fa-truck truck2" aria-hidden="true"></i></td>
                        <td>Levertijd 6 tot 8 werkdagen</td>
                        <td>De verwachte levertijd bedraagt 6 tot 8 werkdagen</td>
                    </tr>
                    <tr>
                        <td><i class="fa fa-truck truck3" aria-hidden="true"></i></td>
                        <td>Levertijd 8 tot 10 werkdagen</td>
                        <td>De verwachte levertijd bedraagt 8 tot 10 werkdagen</td>
                    </tr>
                    <tr>
                        <td><i class="fa fa-truck truck4" aria-hidden="true"></i></td>
                        <td>Levertijd langer dan 10 werkdagen</td>
                        <td> De verwachte levertijd bedraagt langer dan10 werkdagen</td>
                    </tr>
                    <tr>
                        <td><i class="fa fa-truck truck5" aria-hidden="true"></i></td>
                        <td>Helaas uitverkocht</td>
                        <td>Momenteel niet leverbaar</td>
                    </tr>
                    <tr>
                        <td><i class="fa fa-truck truck6" aria-hidden="true"></i></td>
                        <td>NIEUW in assortiment!</td>
                        <td>2-5 werkdagen, indien anders is dat aangegeven</td>
                    </tr>
                </table>
                <h3>Verzendkosten</h3>
                <p>De verpakkings- en verzendkosten in Nederland bedragen minimaal € 4,95 per pakket met 1 of meer artikel(en) tenzij anders vermeld en zijn voor rekening van de klant. Dit betreft bestellingen die worden gedaan via ons Callcenter. Bestelt u online? Dan profiteert u van gratis verzending! Bij bezorging buiten Nederland worden tijdens het bestelproces de juiste verzendkosten berekend. Deze kosten liggen te allen tijde hoger dan de verzendkosten binnen Nederland.</p>

                <h3>Het artikel is niet op voorraad:</h3>
                <p>Mits het bestelde artikel op voorraad is, wordt uw bestelling de volgende werkdag voor verzending aangeboden aan PostNL. Vervolgens wordt uw bestelling binnen circa 2-5 werkdagen bij u aangeboden. Is een artikel (nog) niet op voorraad, dan kunt u op onze website de verwachte levertijd opzoeken bij het betreffende artikel. De actuele status van onze voorraad en daarmee samenhangende levertijd communiceren onze agents van het CallCenter met u tijdens uw telefonische bestelling. Voor bestellingen die via onze website worden geplaatst, is een eventueel afwijkende levertijd per artikel zichtbaar op de website. Heeft uw bestelde artikel de status 'Op voorraad'? Dan kunt u uw pakket binnen 2-5 werkdagen verwachten. Heeft u meerdere artikelen besteld met diverse voorraadstatussen? Dan volgt de levering zodra alle artikelen uit uw bestelling voorradig zijn. Mocht dit door onvoorziene omstandigheden langer duren, dan wordt u hierover geïnformeerd via onze klantenservice. U ontvangt uw bestelling later, danwel in 2 afzonderlijke zendingen.</p>


                <h3>Vertraging tijdens verzending:</h3>

                <p>Ons streven is uw bestelling binnen 2-5 werkdagen te bezorgen, indien uw bestelde artikel(en) voorradig zijn. Via de track and trace code die u ontvangt via e-mail (zodra uw pakket ons magazijn verlaat), volgt u de status van uw zending. Afhankelijk van de verwerking van PostNL, kan het enkele uren tot 24 uur duren voor uw pakketstatus zichtbaar is. Indien u uw pakket nog niet heeft ontvangen, controleert u dan eerst via de track and trace code de status van de levering en wacht deze af. Wellicht is uw pakket bij de buren bezorgd of heeft de bezorger u niet thuis getroffen en volgt er een nieuw bezorgmoment. Heeft u na enkele dagen nog geen pakket ontvangen en is de track and trace informatie niet toereikend? Neemt u dan contact op met onze klantenservice via de link onderaan de website 'Klantenservice’ of bel 088-746 1000 (lokaal tarief). Wij helpen u dan graag verder.</p>



        </div>
    </div>


    <?php
require "../includes/footer.php";
?>
