<?php

class Artikel
{
    private $db;

    public function __construct()
    {
        require_once 'classes/database.php';
        $this->db = new Database();
    }

    public function getArtikelen()
    {
        $query = "SELECT * FROM artikelen";
        return $this->db->fetchAll($query);
    }

    public function getArtikel($artikelId)
    {
        $query = "SELECT * FROM artikelen WHERE artId = ?";
        $values = array($artikelId);
        return $this->db->fetch($query, $values);
    }

    public function verwijderArtikel($artikelId)
    {
        $query = "DELETE FROM artikelen WHERE artId = :artId";
        $params = array(':artId' => $artikelId);
        $this->db->execute($query, $params);
    }

    public function updateArtikel($artikelId, $artOmschrijving, $artInkoop, $artVerkoop, $artVoorraad, $artMinVoorraad, $artMaxVoorraad, $artLocatie, $levId)
    {
        $query = "UPDATE artikelen SET artOmschrijving = ?, artInkoop = ?, artVerkoop = ?, artVoorraad = ?, artMinVoorraad = ?, artMaxVoorraad = ?, artLocatie = ?, levId = ? WHERE artId = ?";
        $values = array($artOmschrijving, $artInkoop, $artVerkoop, $artVoorraad, $artMinVoorraad, $artMaxVoorraad, $artLocatie, $levId, $artikelId);
        $this->db->execute($query, $values);
    }
}

?>
