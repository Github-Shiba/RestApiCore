<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include_once '../config/database.php';
include_once '../objects/rate.php';
include_once '../objects/product.php';
include_once '../objects/provider.php';
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
$database = new Database();
$db = $database->getConnection();
$rate = new Ratematrix($db);
$product = new Product($db);
$provider = new Provider($db);

$product->product_name = isset($_GET['product_name']) ? $_GET['product_name'] : '';
$provider->provider_name = isset($_GET['provider_name']) ? $_GET['provider_name'] : '';
$product->zone_name = isset($_GET['zone_name']) ? $_GET['zone_name'] : 'All';

if(empty($product->product_name) || empty($provider->provider_name)) {
    http_response_code(206);
    echo json_encode(
        array("message" => "Please Provide All Parameters!!!")
    );
}

else{
    if(empty($product->zone_name)){
        $product->zone_name = 'All';
    }

$stmt_provider = $provider->read_provider();
$num_provider = $stmt_provider->rowCount();
$row_provider = $stmt_provider->fetch(PDO::FETCH_ASSOC);
$arr_service_id =json_decode($row_provider['service_id'] );

if($num_provider>0){
    $stmt = $product->read_price();
    $num = $stmt->rowCount();
    if($num>0){
        
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $provider_id = $row['service_rate_id'];
           if(in_array($provider_id,$arr_service_id)){
          
            http_response_code(200);
            echo json_encode(
                array("product"=>$row['product'],"monthly price" => $row['price'],"zone"=>$row['zone_name'])
            );
           }

           else{
            http_response_code(404);
            echo json_encode(
                array("message" => "Provider Does not provide this Service")
            ); 
           }
       
    }else{
        http_response_code(404);
        echo json_encode(
            array("message" => "Product Not Found")
        );
    }
} else{
    http_response_code(404);
    echo json_encode(
        array("message" => "Provider Not Found")
    );    
}



}
}
else{
    http_response_code(405);
    echo json_encode(array("message" => "Use GET Method"));
}
