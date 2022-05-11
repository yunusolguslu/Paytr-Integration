<?php 
class User
{
    private $conn;
    private $table_name = "users";
    public $id;
    public $email;
    public $username;
    public $name;
    public $surname;
    public $password;

    public function __construct($db)
    {
        $this->conn = $db;
    }
    //readuser with mail
    function readUser($email){
        $query = "SELECT * FROM " . $this->table_name . " WHERE email= ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $email);
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    //check if username exists
    function usernameExists($username){
        $username=trim($username);
        $query = "SELECT username
        FROM " . $this->table_name . "
        WHERE
        username = ?
        LIMIT 0,1";
        $stmt = $this->conn->prepare( $query );    
        $stmt->bindParam(1, $username);   
        $stmt->execute([$username]);
        $num = $stmt->rowCount();
        if($num>0){
            return true;
        }
        return false;
    }
    //check if email exists
    function emailExists($email){
        $email=trim($email);
        $query = "SELECT email
        FROM " . $this->table_name . "
        WHERE
        email= ? LIMIT 0,1";
        $stmt = $this->conn->prepare( $query );    
        $stmt->bindParam(1, $email);   
        $stmt->execute([$email]);
        $num = $stmt->rowCount();
        if($num>0){
            return true;
        }
        return false;
    }
    //select confirmed user's data
    function readforConfirmed($username){
      
        $query = "SELECT id, password, email, username, name, surname
        FROM " . $this->table_name . "
        WHERE
        username = ? 
        OR 
        email = ?
        LIMIT 0,1";
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->username);
        $stmt->execute(array($username, $username));
        return $stmt->fetch(PDO::FETCH_ASSOC);
        
    }
    
}

?>