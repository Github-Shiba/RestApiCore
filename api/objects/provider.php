<?php
class Provider{
 
    private $conn;
    private $table_name = "provider_master";
 
    public $id;
    public $provider_id;
    public $provider_name;
    
 
    public function __construct($db){
        $this->conn = $db;
    }
 
    public function read(){
        $query = "SELECT * FROM " . $this->table_name . "";
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        return $stmt;
    }
    function read_provider(){

        $query = "SELECT provider_id ,service_id FROM " . $this->table_name . "   WHERE provider_name = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->provider_name);
        $stmt->execute(); 
        return $stmt;
    }
    function update(){

        $query = "UPDATE
                " . $this->table_name . "
            SET
                provider_name = :provider_name
            WHERE
            provider_id = :provider_id";
 
    $stmt = $this->conn->prepare($query);
    $this->provider_name=htmlspecialchars(strip_tags($this->provider_name));
    $this->provider_id=htmlspecialchars(strip_tags($this->provider_id));
    $stmt->bindParam(':provider_name', $this->provider_name);
    $stmt->bindParam(':provider_id', $this->provider_id);
    if($stmt->execute()){
        return true;
    }
 
    return false;
    }
}
?>