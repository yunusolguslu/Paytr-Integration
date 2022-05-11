<?php
// used to get mysql database connection
class Database{
 
    // specify your own database credentials
    private $host = "localhost";
    private $db_name = "paytr";
    private $username = "root";
    private $password = "";
    public $conn;
 
    // set the database connection
    public function getConnection(){
 
        $this->conn = null;
 
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->query("SET NAMES UTF8");
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $exception){
            //500 error page may be implement here
            echo "Connection error: " . $exception->getMessage();
        }
 
        return $this->conn;
    }
}
?>