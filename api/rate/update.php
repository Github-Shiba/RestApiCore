<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: PATCH");
header("Access-Control-Max-Age: 3600");
if ($_SERVER['REQUEST_METHOD'] === 'PATCH') {
include_once '../config/database.php';
include_once '../objects/provider.php';
include_once '../objects/rate.php';
include_once '../objects/product.php';
include_once '../objects/zone.php';
$database = new Database();
$db = $database->getConnection();
$provider = new Provider($db);
$rate = new Ratematrix($db);
$product = new Product($db);
$zone = new Zone($db);
$data = json_decode(file_get_contents("php://input"));


    $provider->provider_name = $data->provider_name;
    $rate->product = $data->product;
    $product->product = $data->product;
    $rate->price = $data->price;
    $rate->zone = $data->zone;
    $zone->zone = $data->zone;
    
    $stmt_provider = $provider->read_provider();
    $num_provider = $stmt_provider->rowCount();
    
    $stmt_product = $product->read();
    $num_product = $stmt_product->rowCount();
    
    $stmt_zone = $zone->read();
    $num_zone = $stmt_zone->rowCount();
    
    if($num_product>0){
        if($num_zone){
            if($rate->update()){
                http_response_code(200);
                echo json_encode(array("message" => "Updated Successfully."));
            }
            else{
                http_response_code(503);
                echo json_encode(array("message" => "Unable to Update."));
            }
        }else{
            http_response_code(404);
            echo json_encode(array("message" => "Zone Not Found"));
        }
       
    }else{
        http_response_code(404);
        echo json_encode(array("message" => "Product Not Found"));
    }



}else{
    http_response_code(405);
    echo json_encode(array("message" => "Use PATCH Method"));
}
?>