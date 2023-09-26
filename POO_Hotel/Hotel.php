<?php
class Hotel {
    private string $nom;
    private string $nbEtoiles;
    private string $ville;
    private string $adresse;
    private int $codePostal;
    private array $reservations;
    private array $chambres;

    public function __construct(string $nom, string $nbEtoiles, string $ville, string $adresse) {
        $this->nom = $nom;
        $this->nbEtoiles = $nbEtoiles;
        $this->ville = $ville;
        $this->adresse = $adresse;

        $this->reservations = [];
        $this->chambres = [];
    }

    // getter
    public function getNom()
    {
        return $this->nom;
    }

    public function getNbEtoiles()
    {
        return $this->nbEtoiles;
    }

    public function getVille()
    {
        return $this->ville;
    }

    public function getAdresse()
    {
        return $this->adresse;
    }

    // setter
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function setNbEtoiles($nbEtoiles)
    {
        $this->nbEtoiles = $nbEtoiles;
    }
    
    public function setVille($ville)
    {
        $this->ville = $ville;
    }

    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }
    
    //toString
    public function __toString()
    {
        return $this->nom." ".$this->nbEtoiles." ".$this->ville;
    }

    // méthodes
    public function addChambre(Chambre $chambreObjet)
    {
        $this->chambres[] = $chambreObjet;
    }

    public function addReservation(Reservation $reservationObjet)
    {
        $this->reservations[] = $reservationObjet;
    }


    public function countChambres()
    {
        $chambresCount = count($this->chambres);
        return $chambresCount;
    }
    
    public function countChambresReservee()
    {
        $chambresReserve = count($this->reservations);
        return $chambresReserve;
    }

    public function countChambresDispo()
    {
        $chambresDispo = $this->countChambres() - $this->countChambresReservee();
        return $chambresDispo ;
    }

    public function ShowInfosHotel() {
        return "<h2>".$this."</h2>
        <p>".$this->getAdresse()." ".$this->getVille()."</p>
        <p>Nombre de chambres : ".$this->countChambres()."</p>
        <p>Nombre de chambres réservées : ".$this->countChambresReservee()."</p>
        <p>Nombre de chambres dispo : ".$this->countChambresDispo()."</p>";
    }

    public function showReservationHotel()
    {   
        $returnValue = "<h2>Réservations de l'hôtel ".$this."</h2>";
        if($this->reservations == null) {
            $returnValue .= "<p>Aucune réservation !<p>";
        } else {
            $returnValue .= "<p>".$this->countChambresReservee()." Réservations </p>";
            foreach ($this->reservations as $reservation) {
                $returnValue .= "<p>".$reservation->getClient()." - ".$reservation->getChambre()." - ".$reservation."</p>";
            }
        
        }
        return $returnValue ;
    }
}



?>