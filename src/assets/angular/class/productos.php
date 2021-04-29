<?php
class Producto
{

  // Conexion
  private $conex;

  // Tabla usada
  private $db_table = "productos";

  // Columnas de la BD
  public $codigo;
  public $descripcion;
  public $marca;
  public $precio;
  public $stock;

  // Conexion a la BD
  public function __construct($data_base)
  {
    $this->conex = $data_base;
  }

  // CREATE
  public function createProducto()
  {
    $sqlQuery = "INSERT INTO " . $this->db_table . " SET descripcion = :descripcion, marca = :marca, precio = :precio, stock = :stock";

    $stmt = $this->conex->prepare($sqlQuery);

    $stmt->bindParam(":descripcion", $this->descripcion);
    $stmt->bindParam(":marca", $this->marca);
    $stmt->bindParam(":precio", $this->precio);
    $stmt->bindParam(":stock", $this->stock);
    $stmt->execute();
  }

  // READ
  public function readProducto()
  {
    $sqlQuery = "SELECT * FROM " . $this->db_table . "";
    $stmt = $this->conex->prepare($sqlQuery);
    $stmt->execute();
    return $stmt;
  }

  // UPDATE
  public function updateProducto()
  {
    $sqlQuery = "UPDATE " . $this->db_table . " SET descripcion = :descripcion, marca = :marca, precio = :precio, stock = :stock WHERE codigo = :codigo";

    $stmt = $this->conex->prepare($sqlQuery);

    $stmt->bindParam(":descripcion", $this->descripcion);
    $stmt->bindParam(":marca", $this->marca);
    $stmt->bindParam(":precio", $this->precio);
    $stmt->bindParam(":stock", $this->stock);
    $stmt->bindParam(":codigo", $this->codigo);

    $stmt->execute();    
    /* $stmt->fetchAll(PDO::FETCH_ASSOC); */
  }

  // DELETE
  function deleteProducto()
  {
    $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE codigo = $_GET[codigo]";
    $stmt = $this->conex->prepare($sqlQuery);

    $sqlRefresh = "ALTER TABLE " . $this->db_table . " AUTO_INCREMENT = 1;";
    $stmt2 = $this->conex->prepare($sqlRefresh);
    if ($stmt->execute() and $stmt2->execute()) {
      return true;
    }
  }

  // SELECT
  function selectProducto()
  {
    $sqlQuery = "SELECT * FROM " . $this->db_table . " WHERE codigo = $_GET[codigo]";
    $stmt = $this->conex->prepare($sqlQuery);
    $stmt->execute();
    if (!$stmt){
      echo 'Error en la consulta.';
    }else{
      $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
      echo json_encode($results);
    }
  }
}
