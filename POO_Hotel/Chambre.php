<?php
class Chambre {
    private string $libelle;
    private int $prix;
    private string $wifi;
    private int $nbLits;
    private string $etat;
    private Hotel $hotel;
    private array $reservations;

    public function __construct(string $libelle, int $prix, string $wifi, int $nbLits, Hotel $hotel, string $etat) {
        $this->libelle = $libelle;
        $this->prix = $prix;
        $this->wifi = $wifi;
        $this->nbLits = $nbLits;
        $this->etat = $etat;
        $this->hotel = $hotel;

        $this->reservations = [];
        $this->hotel->addChambre($this);
    }

    // getter
    public function getLibelle()
    {
        return $this->libelle;
    }

    public function getPrix()
    {
        return $this->prix;
    }

    public function getWifi()
    {
        return $this->wifi;
    }

    public function getNbLits()
    {
        return $this->nbLits;
    }

    public function getEtat()
    {
        return $this->etat;
    }

    public function getHotel()
    {
        return $this->hotel;
    }


    // setter
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
    }

    public function setPrix($prix)
    {
        $this->prix = $prix;
    }

    public function setWifi($wifi)
    {
        $this->wifi = $wifi;
    }
    
    public function setNbLits($nbLits)
    {
        $this->nbLits = $nbLits;
    }

    public function setEtat($etat)
    {
        $this->etat = $etat;
    }

    public function setHotel($hotel)
    {
        $this->hotel = $hotel;
    }

    //toString
    public function __toString()
    {
        return "Chambre ".$this->libelle;
    }

    //méthode
    public function addReservation(Reservation $reservationObjet)
    {
        $this->setEtat("<p class='reserveeHighlight'>Réservée</p>");
        $this->reservations[] = $reservationObjet;
    }

    public function removeReservation(Reservation $reservationObjet)
    {
        $this->setEtat("<p class='disponibleHighlight'>Disponible</p>");
        $count = 0;
        foreach($this->reservations as $reservation) {
            $param1 = $reservation->getChambre();
            $param2 = $reservationObjet->getChambre();

            if($param1 == $param2) {
                unset($this->reservations[$count]);
            }
            $count++;
        }

    }


    public function dump() 
    {
        return var_dump($this->reservations);
    }
}


?>