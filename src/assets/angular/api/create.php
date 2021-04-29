<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-marca: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    require_once '../database/conexion.php';
    require_once '../class/productos.php';

    $data = json_decode(file_get_contents("php://input"));
    $database = new ConexionProducto();
    $db = $database->Conectar();

    $item = new Producto($db);

    $item->descripcion = $data->descripcion;
    $item->marca = $data->marca;
    $item->precio = $data->precio;
    $item->stock = $data->stock;
    
    $item->createProducto();
    $database->Desconectar();
?>