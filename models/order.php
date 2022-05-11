<?php 
class Order
{
    private $conn;
    private $table_name = "orders";
    public $id;
    public $user_id;
    public $product_id;
    public $quantity;
    public $price;
    public $date;
    public $status;
    public $paytrid;
    //usertype or plan will be added when implemented

    public function __construct($db)
    {
        $this->conn = $db;
    }
        //read order with merchant oid
            function readOrder($merchant_oid){
                $query = "SELECT * FROM " . $this->table_name . " WHERE paytrid= ?";
                $stmt = $this->conn->prepare($query);
                $stmt->bindParam(1, $merchant_oid);
                $stmt->execute([$merchant_oid]);
                return $stmt->fetch(PDO::FETCH_ASSOC);
            }
            //update order status if payment is successful
            function updateOrder($paytrid,$status){
                $query = "UPDATE " . $this->table_name . " SET status=:status WHERE paytrid=:paytrid";
                $stmt = $this->conn->prepare($query);
                $stmt->bindParam(':paytrid', $paytrid);
                $stmt->bindParam(':status', $status);
                $stmt->execute();
                return $stmt;
            }
            //create order with userid,productid,randomid,status variables
            function createOrder($user_id,$product_id,$paytrid,$quantity,$price,$date,$status){
                $query = "INSERT INTO " . $this->table_name . " SET user_id=:user_id,product_id=:product_id,paytrid=:paytrid,status=:status,quantity=:quantity,price=:price,date=:date";
                $stmt = $this->conn->prepare($query);
                $stmt->bindParam(':user_id', $user_id);
                $stmt->bindParam(':product_id', $product_id);
                $stmt->bindParam(':paytrid', $paytrid);
                $stmt->bindParam(':status', $status);
                $stmt->bindParam(':quantity', $quantity);
                $stmt->bindParam(':price', $price);
                $stmt->bindParam(':date', $date);
                $stmt->execute();
                return $stmt;
            }
}
?>