<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    require_once '../database/conexion.php';
    require_once '../class/productos.php';
    
    $database = new ConexionProducto();
    $db = $database->Conectar();
    
    $item = new Producto($db); 
    
    if($item->deleteProducto()){
        echo json_encode("Employee deleted.");
    } else{
        echo json_encode("Data could not be deleted");
    }
    $database->Desconectar();
?>