<?php
require_once "Chambre.php";
require_once "Hotel.php";
require_once "Personne.php";
require_once "Reservation.php";

$hotel1 = new Hotel("Hilton", "****", "Strasbourg", "10 Route de la gare 67000");
$hotel2 = new Hotel("Regent", "****", "Paris", "10 avenue 91000");

$cham1 = new Chambre("1", 120,"non", 2, $hotel1, "disponible");
$cham2 = new Chambre("2", 120,"non", 3, $hotel1, "disponible");
$cham3 = new Chambre("3", 120,"non", 1, $hotel1, "disponible");
$cham4 = new Chambre("4", 120,"oui", 4, $hotel1, "disponible");
$cham5 = new Chambre("5", 120,"oui", 2, $hotel1, "disponible");

$persGibello = new Client("Gibello", "Virgile", "Homme", "1970-02-03");
$persMurmann = new Client("Murmann", "Micka", "Homme", "1995-02-03");


$reserv1 = new Reservation("2021-05-10","2021-05-12", $persGibello, $hotel1, $cham1);
$reserv2 = new Reservation("2021-07-20","2021-07-27", $persMurmann, $hotel1, $cham4);
$reserv3 = new Reservation("2021-11-03","2021-11-05", $persMurmann, $hotel1, $cham5);

echo $hotel1->ShowInfosHotel();
echo $hotel1->showReservationHotel();
echo $hotel2->showReservationHotel();

echo $persMurmann->showReservClient();

echo $persGibello->showReservClient();


?>