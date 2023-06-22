<?php
class Verkooporder
{
    private $db;
    private $klantId;
    private $artId;
    private $verkOrdDatum;
    private $verkOrdStatus;
    private $verkOrdBestAantal;

    public function __construct()
    {
        require_once 'classes/database.php';
        $this->db = new Database();
    }

    public function setKlantId($klantId)
    {
        $this->klantId = $klantId;
    }

    public function setArtId($artId)
    {
        $this->artId = $artId;
    }

    public function setVerkOrdDatum($verkOrdDatum)
    {
        $this->verkOrdDatum = $verkOrdDatum;
    }

    public function setVerkOrdStatus($verkOrdStatus)
    {
        $this->verkOrdStatus = $verkOrdStatus;
    }

    public function setVerkOrdBestAantal($verkOrdBestAantal)
    {
        $this->verkOrdBestAantal = $verkOrdBestAantal;
    }

    public function addVerkooporder()
    {
        $query = "INSERT INTO verkooporders (klantId, artId, verkOrdDatum, verkOrdStatus, verkOrdBestAantal)
                  VALUES (?, ?, ?, ?, ?)";
        $values = array($this->klantId, $this->artId, $this->verkOrdDatum, $this->verkOrdStatus, $this->verkOrdBestAantal);
        $this->db->execute($query, $values);
    }

    public function getVerkooporders()
    {
        $query = "SELECT * FROM verkooporders";
        return $this->db->fetchAll($query);
    }

    public function getVerkooporder($verkOrdId)
    {
        $query = "SELECT * FROM verkooporders WHERE verkOrdId = ?";
        $values = array($verkOrdId);
        return $this->db->fetch($query, $values);
    }

    public function updateVerkooporderStatus($verkOrdId, $verkOrdStatus)
    {
        $query = "UPDATE verkooporders SET verkOrdStatus = ? WHERE verkOrdId = ?";
        $values = array($verkOrdStatus, $verkOrdId);
        $this->db->execute($query, $values);
    }

    public function verwijderVerkooporder($verkOrdId)
    {
        $query = "DELETE FROM verkooporders WHERE verkOrdId = :verkOrdId";
        $params = array(':verkOrdId' => $verkOrdId);
        $this->db->execute($query, $params);
    }

    public function getVerkooporderById($verkOrdId)
    {
        $query = "SELECT * FROM verkooporders WHERE verkOrdId = ?";
        $values = array($verkOrdId);
        return $this->db->fetch($query, $values);
    }

    public function updateVerkooporder($verkOrdId, $klantId, $artId, $verkOrdDatum, $verkOrdStatus, $verkOrdBestAantal)
    {
        $query = "UPDATE verkooporders SET klantId = ?, artId = ?, verkOrdDatum = ?, verkOrdStatus = ?, verkOrdBestAantal = ? WHERE verkOrdId = ?";
        $values = array($klantId, $artId, $verkOrdDatum, $verkOrdStatus, $verkOrdBestAantal, $verkOrdId);
        $this->db->execute($query, $values);
    }
}
?>