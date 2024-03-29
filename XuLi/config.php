
<?php
class Connection
{
    private $host = "localhost";
    private $db_name = "quanlisach";
    private $username = "root";
    private $password = "";
    public $conn;

    public function getConnection()
    {
        $this->conn = null;
        try
        {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name,
                $this->username, $this->password);
            $this->conn->exec("set names utf8");
        } catch (PDOExeption $exeption) {
            die("Connection error: "+$exeption->getMessage());
        }
        return $this->conn;
    }
}