<?php
class Reservation {
    private \DateTime $debutReservation;
    private \DateTime $finReservation;
    private Client $client;
    private Hotel $hotel;
    private Chambre $chambre;

    public function __construct(string $debutReservation, string $finReservation, Client $client, Hotel $hotel, Chambre $chambre) {
        $this->debutReservation = new \DateTime($debutReservation);
        $this->finReservation = new \DateTime($finReservation);
        $this->client = $client;
        $this->hotel = $hotel;
        $this->chambre = $chambre;

        $this->client->addReservation($this);
        $this->hotel->addReservation($this);
        $this->chambre->addReservation($this);
    }

    //getter
    public function getClient()
    {
        return $this->client;
    }

    public function getChambre()
    {
        return $this->chambre;
    }
    
    public function getHotel()
    {
        return $this->hotel;
    }

    public function getDebutReservation()
    {
        return $this->debutReservation;
    }

    public function getFinReservation()
    {
        return $this->finReservation;
    }

    //setter
    public function setClient($client)
    {
        $this->client = $client;
    }

    public function setHotel($hotel)
    {
        $this->hotel = $hotel;
    }
    
    public function setChambre($chambre)
    {
        $this->chambre = $chambre;
    }

    public function setDebutReservation($debutReservation)
    {
        $this->debutReservation = $debutReservation;

    }

    public function setFinReservation($finReservation)
    {
        $this->finReservation = $finReservation;
    }


    //toString
    public function __toString() 
    {
        return "du ".$this->debutReservation->format("d-m-Y")." au ".$this->finReservation->format("d-m-Y");
    }

    //méthodes
    public function periodeReservee() {
        return "du ".$this->debutReservation->format("d-m-Y")." au ".$this->finReservation->format("d-m-Y");
    }

    public function infosChambre() {

        return "Chambre ".$this->chambre->getLibelle()." (".$this->chambre->getNblits()." lits - ".$this->chambre->getPrix()."&euro; - Wifi ".$this->chambre->getWifi().")"; 
    }

}




?>