<?php

class Conexion {
    private $servidor = "localhost";
    private $usuario = "root";
    private $password = "";
    private $bd = "album";
    private $conexion;
    
    // Conexion a la base de datos
    public function __construct() {
        try{
            $this->conexion = new PDO("mysql:host=$this->servidor; dbname=$this->bd", $this->usuario, $this->password);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e){
            return "Error: " . $e->getMessage();
        }
    }

    // Insertar datos en la base de datos
    public function ejecutar($sql) {
        $this->conexion->exec($sql);
        return $this->conexion->lastInsertId();
    }

    // Obtener/consultar datos de la base de datos
    public function consultar($sql) {
        $sentencia = $this->conexion->prepare($sql);
        $sentencia->execute();
        return $sentencia->fetchAll();
    }

    

}



?>