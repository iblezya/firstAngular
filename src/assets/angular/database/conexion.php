<?php

class ConexionProducto {
  private $db = "project";
  private $server = "192.168.17.3:3306";
  private $user = "root";
  private $pass = "uhet";

  public $conexion;

  public function Conectar() {
    $this->conexion = null;
    try {
      $this->conexion = new PDO("mysql:host=" . $this->server . ";" . "dbname=" . $this->db, $this->user, $this->pass);
      $this->conexion->exec("set names utf8");
    } catch (PDOException $e) {
      echo "No se pudo establecer conexion con la base de datos: " . $e->getMessage();
    }
    return $this->conexion;
  }

  public function Desconectar(){
    return $this->conexion = null;
  }

}

?>