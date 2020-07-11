<?php
class Zone{
 
    private $conn;
    private $table_name = "zone_master";
 
    public $id;
    public $zone;
    
 
    public function __construct($db){
        $this->conn = $db;
    }
 
   
    function read(){

        $query = "SELECT *  FROM " . $this->table_name . "  WHERE zone_name = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->zone);
        $stmt->execute();
        return $stmt;
    }
}
?>