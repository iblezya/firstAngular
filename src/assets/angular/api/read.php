<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    
    require_once '../database/conexion.php';
    require_once '../class/productos.php';

    $database = new ConexionProducto();
    $db = $database->Conectar();

    $items = new Producto($db);
    $stmt = $items->readProducto();
    $database->Desconectar();

    $itemCount = $stmt->rowCount();


    /* echo json_encode($itemCount); */

    if($itemCount > 0){
        
        $employeeArr = array();
        /* $employeeArr["itemCount"] = $itemCount; */

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $e = array(
                "codigo" => $codigo,
                "descripcion" => $descripcion,
                "marca" => $marca,
                "precio" => $precio,
                "stock" => $stock
            );

            array_push($employeeArr,$e);
        }
        echo json_encode($employeeArr);
    }

    else{
        http_response_code(404);
        echo json_encode(
            array("messprecio" => "No record found.")
        );
    }
    
?>