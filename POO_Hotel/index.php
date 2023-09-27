<?php
require_once "Chambre.php";
require_once "Hotel.php";
require_once "Personne.php";
require_once "Reservation.php";

$hotel1 = new Hotel("Hilton", "&#10032; &#10032; &#10032; &#10032;", "Strasbourg", "10 Route de la gare 67000");
$hotel2 = new Hotel("Regent", "&#10032; &#10032; &#10032;", "Paris", "10 avenue 91000");

$cham1 = new Chambre("1", 120,"non", 2, $hotel1, "<p class='disponibleHighlight'>Disponible</p>");
$cham2 = new Chambre("2", 120,"non", 3, $hotel1, "<p class='disponibleHighlight'>Disponible</p>");
$cham3 = new Chambre("3", 100,"non", 1, $hotel1, "<p class='disponibleHighlight'>Disponible</p>");
$cham4 = new Chambre("4", 220,"oui", 4, $hotel1, "<p class='disponibleHighlight'>Disponible</p>");
$cham5 = new Chambre("5", 300,"oui", 2, $hotel1, "<p class='disponibleHighlight'>Disponible</p>");

$persGibello = new Client("Gibello", "Virgile", "Homme", "1970-02-03");
$persMurmann = new Client("Murmann", "Micka", "Homme", "1995-02-03");


$reserv1 = new Reservation("2021-05-10","2021-05-12", $persGibello, $hotel1, $cham1);
$reserv2 = new Reservation("2021-07-20","2021-07-27", $persMurmann, $hotel1, $cham4);
$reserv3 = new Reservation("2021-11-03","2021-11-05", $persMurmann, $hotel1, $cham5);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Hotel</title>
</head>
<body>
    <main>
        <div class="mesHotel">
            <div class="showHotel">
                <?php echo $hotel1->ShowInfosHotel();?>
            </div>

            <div class="showHotel">
                <?php echo $hotel2->ShowInfosHotel();?>
            </div>
        </div>
        <div class='separateur'></div>

        <div class="contentReservationHotel">
            <div class="blocReservationHotel">
                <?php echo $hotel1->showReservationHotel();?>
            </div>
            
            <div class="blocReservationHotel">
                <?php echo $hotel2->showReservationHotel();?>
            </div>
        </div>

        <div class='separateur'></div>


        <div class="contentReservationClient">

            <div class="blocReservationClient">
                <?php echo $persGibello->showReservClient();  ?>
            </div>

            <div class="blocReservationClient">
                <?php echo $persMurmann->showReservClient(); ?>
            </div>
        </div>

        <div class='separateur'></div>


        <div class="statutsChambres">
            <?php echo $hotel1->statutsChambres(); ?>
        </div>

        <div class='separateur'></div>

        <div class='reservAnnule'>
            <?php echo $reserv3->annulerReservation();?>
        </div>

        <div class='separateur'></div>

        <div class="mesHotel">
            <div class="showHotel">
                <?php echo $hotel1->ShowInfosHotel();?>
            </div>

            <div class="showHotel">
                <?php echo $hotel2->ShowInfosHotel();?>
            </div>
        </div>

        <div class='separateur'></div>

        <div class="contentReservationHotel">
            <div class="blocReservationHotel">
                <?php echo $hotel1->showReservationHotel();?>
            </div>
            
            <div class="blocReservationHotel">
                <?php echo $hotel2->showReservationHotel();?>
            </div>
        </div>

        <div class='separateur'></div>


        <div class="contentReservationClient">
            <div class="blocReservationClient">
                <?php echo $persGibello->showReservClient();  ?>
            </div>

            <div class="blocReservationClient">
                <?php echo $persMurmann->showReservClient(); ?>
            </div>
        </div>

        <div class='separateur'></div>


        <div class="statutsChambres">
            <?php echo $hotel1->statutsChambres(); ?>
        </div>


    <main>

    <?php ?>

</body>
</html>
<?php


?>