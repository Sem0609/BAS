<?php
require_once 'database.php';

class Leverancier {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getLeveranciers()
    {
        $query = "SELECT * FROM leveranciers";
        return $this->db->fetchAll($query);
    }

    public function verwijderLeverancier($leverancierId)
    {
        $query = "DELETE FROM leveranciers WHERE levid = " . $leverancierId;
        $this->db->execute($query);
    }
}
?>
