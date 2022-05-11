<?php 
class Product
{
    private $conn;
    private $table_name = "products";
    public $id;
    public $name;
    public $price;


    public function __construct($db)
    {
        $this->conn = $db;
    }
    //readproduct with product id
    function readProduct($productid){
        $query = "SELECT * FROM " . $this->table_name . " WHERE id= ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $productid);
        $stmt->execute([$productid]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>