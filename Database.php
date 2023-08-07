<?php
class Database
{
    private static $instance = null;
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $dbName = 'ctbs';
    private $conn;

    private function __construct()
    {
        $this->conn = new \mysqli($this->host, $this->username, $this->password, $this->dbName);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function executeQuery($query)
    {
        return $this->conn->query($query);
    }

    public function closeConnection()
    {
        $this->conn->close();
    }
}
?>
