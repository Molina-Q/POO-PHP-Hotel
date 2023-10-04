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

    public function removeReservation(Reservation $reservationObjet)
    {
        $count = 0;
        foreach($this->reservations as $reservation) {
            $param1 = $reservation->getHotel().$reservation->getClient().$reservation->getChambre();
            $param2 = $reservationObjet->getHotel().$reservationObjet->getClient().$reservationObjet->getChambre();

            if($param1 == $param2) {
                unset($this->reservations[$count]);
            }
            $count++;
        }
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
        <ul>
        <li><p>".$this->getAdresse()." ".$this->getVille()."</p></li>
        <li><p>Nombre de chambres : ".$this->countChambres()."</p></li>
        <li><p>Nombre de chambres réservées : ".$this->countChambresReservee()."</p></li>
        <li><p>Nombre de chambres dispo : ".$this->countChambresDispo()."</p></li>
        </ul>";
    }

    public function showReservationHotel()
    {   
        $returnValue = "<h2>Réservations de l'hôtel ".$this."</h2>";
        if($this->reservations == null) {
            $returnValue .= "<p>Aucune réservation !<p>";
        } else {
            $returnValue .= "<p class='reservationHighlight'>".$this->countChambresReservee()." Réservations</p>";
            foreach ($this->reservations as $reservation) {
                $returnValue .= "<p><span class='nomClient'>".$reservation->getClient()."</span> - ".$reservation->getChambre()." - ".$reservation."</p>";
            }
        
        }
        return $returnValue ;
    }

    public function statutsChambres() 
    { 
        $returnValue = "<h2>Statuts des chambres de ".$this."</h2>
                <table>
                    <thead>
                        <tr>
                            <th> Chambre</th>
                            <th> Prix</th>
                            <th> Wifi</th>
                            <th> Etat</th>
                        </tr>
                    </thead>
                    <tbody> ";

        foreach($this->chambres as $chambre) {
            $returnValue .= 
            "<tr>
                <td>".$chambre."</td>
                <td>".$chambre->getPrix()."&euro;</td>
                <td>".$chambre->getWifi()."</td>
                <td>".$chambre->getEtat()."</td>
            </tr>";        
        }
        $returnValue .="</tbody>
                    </table>"

        return $returnValue;
    }
}



?>