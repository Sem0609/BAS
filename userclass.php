<?php

class User
{
    private $klantid;
    private $klantnaam;
    private $klantEmail;
    private $klantAdres;
    private $klantPostcode;
    private $klantWoonplaats;
    private $db;

    public function __construct()
    {
        require_once 'classes/database.php';
        $this->db = new Database();
    }

    public function addUser()
    {
        $query = "SELECT * FROM klanten WHERE klantnaam = ?";
        $existingUser = $this->db->execute($query, array($this->klantnaam));

        if ($existingUser->fetch()) {
            return false;
        }

        $query = "INSERT INTO klanten (klantnaam, klantEmail, klantAdres, klantPostcode, klantWoonplaats) VALUES (?, ?, ?, ?, ?)";
        $this->db->execute($query, array($this->klantnaam, $this->klantEmail, $this->klantAdres, $this->klantPostcode, $this->klantWoonplaats));

        return true;
    }

    public function setKlantnaam($klantnaam)
    {
        $this->klantnaam = $klantnaam;
    }

    public function setKlantEmail($klantEmail)
    {
        $this->klantEmail = $klantEmail;
    }

    public function setKlantAdres($klantAdres)
    {
        $this->klantAdres = $klantAdres;
    }

    public function setKlantPostcode($klantPostcode)
    {
        $this->klantPostcode = $klantPostcode;
    }

    public function setKlantWoonplaats($klantWoonplaats)
    {
        $this->klantWoonplaats = $klantWoonplaats;
    }

    public function getKlanten()
    {
        $query = "SELECT * FROM klanten";
        return $this->db->fetchAll($query);
    }

    public function zoekKlantOpId($klantId)
    {
        $query = "SELECT * FROM klanten WHERE klantid = " . $klantId;
        return $this->db->fetchAll($query);
    }
    
    public function verwijderKlant($klantId)
    {
        $query = "DELETE FROM klanten WHERE klantid = :klantid";
        $params = array(':klantid' => $klantId);
        $this->db->execute($query, $params);
    }    

    public function getLeveranciers()
    {
        $query = "SELECT * FROM leveranciers";
        $result = $this->db->query($query);
        return $result;
    }

    public function getArtikelen()
    {
        $query = "SELECT * FROM artikelen";
        return $this->db->fetchAll($query);
    }

    public function updateKlant($klantId, $updatedUser)
    {
        $query = "UPDATE klanten SET klantnaam = ?, klantEmail = ?, klantAdres = ?, klantPostcode = ?, klantWoonplaats = ? WHERE klantid = ?";
        $this->db->execute($query, array($updatedUser->klantnaam, $updatedUser->klantEmail, $updatedUser->klantAdres, $updatedUser->klantPostcode, $updatedUser->klantWoonplaats, $klantId));
    }


}
?>
