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
    
    $data = json_decode(file_get_contents("php://input"));
    
    $item->codigo = $data->codigo;
    
    // employee values
    $item->descripcion = $data->descripcion;
    $item->marca = $data->marca;
    $item->precio = $data->precio;
    $item->stock = $data->stock;
    
    if($item->updateProducto()){
        echo json_encode("Employee data updated.");
    } else{
        echo json_encode("Data could not be updated");
    }
    $database->Desconectar();
?>