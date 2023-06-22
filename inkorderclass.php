<?php
class Inkooporder
{
    private $db;

    public function __construct()
    {
        require_once 'classes/database.php';
        $this->db = new Database();
    }

    public function getLeveranciers()
    {
        $query = "SELECT * FROM leveranciers";
        return $this->db->fetchAll($query);
    }

    public function getArtikelen()
    {
        $query = "SELECT * FROM artikelen";
        return $this->db->fetchAll($query);
    }

    public function insertInkooporder($leverancierId, $artId, $inkOrdDatum, $inkOrdBestAantal, $inkOrdStatus)
    {
        $query = "INSERT INTO inkooporders (levId, artId, inkOrdDatum, inkOrdBestAantal, inkOrdStatus) 
                  VALUES ('$leverancierId', '$artId', '$inkOrdDatum', '$inkOrdBestAantal', '$inkOrdStatus')";
        return $this->db->execute($query);
    }
}
?>
