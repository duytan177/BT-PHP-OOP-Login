<?php
class DAO{
    private $host = 'postgres';
    private $user = 'root';
    private $pass = 'root';
    private $db = 'php-login';
    private $conn;


    public function getConnection(){
        try {
            $this->conn =  new PDO("pgsql:host=$this->host;dbname=$this->db", $this->user, $this->pass);
        } catch (\Exception $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        return $this->conn;
    }

        // Close connection
      public function closeConnection() {
        $this->conn = null;
    }

}
 
?>