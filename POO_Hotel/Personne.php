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

    public function removeReservation(Reservation $reservationObjet)
    {
        $count = 0;
        foreach($this->reservations as $reservation) {
            $param1 = $reservation->getClient().$reservation->getChambre();
            $param2 = $reservationObjet->getClient().$reservationObjet->getChambre();
            if($param1 == $param2) {
                unset($this->reservations[$count]);
            }
            $count++;
        }

    }

    public function countChambresClient()
    {
        $chambresReserve = count($this->reservations);
        return $chambresReserve;
    }

    public function prixPeriodeReservee() {
        $periodePrix = 0 ;
        foreach($this->reservations as $reservation) {
            $periodeDebut = $reservation->getDebutReservation();
            $periodeFin = $reservation->getFinReservation();
            $periodeTotal = date_diff($periodeDebut, $periodeFin)->format("%d");
            $periodeInt = intval($periodeTotal);
            $periodePrix += $periodeInt * $reservation->getChambre()->getPrix();
        }
        return $periodePrix;
    }

    public function showReservClient()
    {
        $returnValue = "<h3>Réservations de ".$this."</h3>";
        $returnValue .= "<p class='reservationHighlight'>".$this->countChambresClient()." Réservations</p>";
        $returnValue .= "<ul>";
        foreach($this->reservations as $reservation) {
            $returnValue .= "<li>
            <p><span class='reservClientHotel'>Hotel : ".$reservation->getHotel()."</span> / ".$reservation->infosChambre()." ".$reservation."</p></li>"
            ;
        }
        $returnValue .= "<li><p class='prixReservation'>Total : ".$this->prixPeriodeReservee()." &euro; </p></li>";
        $returnValue .= "</ul>";
        return $returnValue;
    }
}

?>