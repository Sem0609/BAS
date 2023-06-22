<?php
class Database
{
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $dbname = 'bas';
    private $conn;

    public function __construct()
    {
        $dsn = "mysql:host={$this->host};dbname={$this->dbname};charset=utf8mb4";

        try {
            $this->conn = new PDO($dsn, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public function execute($query, $params = array())
    {
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->execute($params);
            return $stmt;
        } catch (PDOException $e) {
            die("Query execution failed: " . $e->getMessage());
        }
    }

    public function fetchAll($query, $params = array())
    {
        try {
            $stmt = $this->execute($query, $params);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Query execution failed: " . $e->getMessage());
        }
    }    

    public function fetch($query, $params = array())
    {
        try {
            $stmt = $this->execute($query, $params);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Query execution failed: " . $e->getMessage());
        }
    }    
}
?>
