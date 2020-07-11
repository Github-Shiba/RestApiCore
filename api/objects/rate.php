<?php
class Ratematrix{
 
    private $conn;
    private $table_name = "rate_matrix_master";
 
    public $id;
    public $service_rate_id;
    public $product_id;
    public $zone_id;
    public $price;
    public $product;
    public $zone;
    public $datetime;
 
    public function __construct($db){
        $this->conn = $db;
        $this->datetime = date('Y-m-d H:i:s');
    }
 
   
    function read(){

        $query = "SELECT service_rate_id  FROM " . $this->table_name . "  WHERE product_id = ? AND zone_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->provider_name);
        $stmt->bindParam(2, $this->provider_name);
        $stmt->execute();
        return $stmt;
    }
    function update(){

            $query = "UPDATE  " . $this->table_name . " A 
            join product_master B on B.id=A.product_id 
            join zone_master C on A.zone_id=C.id 
            SET price = :price ,updatedon= :datetime
            WHERE B.product= :product  and C.zone_name = :zone";
            $stmt = $this->conn->prepare($query);
 
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':price', $this->price);
    $stmt->bindParam(':product', $this->product);
    $stmt->bindParam(':zone', $this->zone);
    $stmt->bindParam(':datetime',$this->datetime );
    if($stmt->execute()){
        return true;
    }
 
    return false;
    }
}
?>