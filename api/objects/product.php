<?php
class Product{
 
    private $conn;
    private $table_name = "product_master";
 
    public $id;
    public $product_name;
    public $clients;
    public $zone_name;
 
    public function __construct($db){
        $this->conn = $db;
    }
 
    public function read(){
        $query = "SELECT * FROM " . $this->table_name . " WHERE product = ?";
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->product);
        $stmt->execute();
        return $stmt;
    }

    function read_price(){

        $query = "SELECT A.product,B.service_rate_id,B.price,C.zone_name FROM " . $this->table_name . " A 
        join rate_matrix_master B on A.id=B.product_id 
        join zone_master C on B.zone_id=C.id 
        WHERE A.product = ? and C.zone_name = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->product_name);
        $stmt->bindParam(2, $this->zone_name);
        $stmt->execute();
        return $stmt;
    }
}
?>