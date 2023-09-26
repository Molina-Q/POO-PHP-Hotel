<?php
class Personne {
    private string $nom;
    private string $prenom;
    private string $sexe;
    private \DateTime $dateDeNaissance;
  

    public function __construct(string $nom, string $prenom, string $sexe, string $dateDeNaissance) {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->sexe = $sexe;
        $this->dateDeNaissance = new \DateTime($dateDeNaissance);

    }

    // getter
    public function getNom()
    {
        return $this->nom;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function getSexe()
    {
        return $this->sexe;
    }

    public function getDateDeNaissance()
    {
        return $this->dateDeNaissance;
    }

    // setter
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    public function setSexe($sexe)
    {
        $this->sexe = $sexe;
    }
    
    public function setDateDeNaissance($dateDeNaissance)
    {
        $this->dateDeNaissance = $dateDeNaissance;
    }

    //toString
    public function __toString()
    {
        return $this->prenom." ".$this->nom;
    }

}

class Client extends Personne {
    private array $reservations;

    public function __construct(string $nom, string $prenom, string $sexe, string $dateDeNaissance) {
        parent::__construct($nom, $prenom, $sexe, $dateDeNaissance);

        $this->reservations = [];
    }

    //méthode
    public function addReservation(Reservation $reservationObjet)
    {
        $this->reservations[] = $reservationObjet;
    }

    public function countChambresClient()
    {
        $chambresReserve = count($this->reservations);
        return $chambresReserve;
    }

    public function periodeReservee() {
        $periodePrix = 0 ;
        foreach($this->reservations as $reservation) {
            $periodeDebut = $reservation->getDebutReservation();
            $periodeFin = $reservation->getFinReservation();
            $periodeTotal = date_diff($periodeDebut, $periodeFin)->format("%d");
            $periodeInt = intval($periodeTotal);
            $periodePrix += $periodeInt * $reservation->getChambre()->getPrix();
        }
        return "Total : ".$periodePrix." &euro;";
    }

    public function showReservClient()
    {
        $returnValue = "<h2>Réservations de ".$this."</h2>";
        $returnValue .= $this->countChambresClient()." Réservations";
        foreach($this->reservations as $reservation) {
            $returnValue .= "<p>Hotel : ".$reservation->getHotel()." / ".$reservation->infosChambre()." ".$reservation."</p>";
        }
        $returnValue .= "<p>".$this->periodeReservee()."</p>";
        return $returnValue;
    }
}

?>