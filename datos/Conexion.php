<?php
$con=Conexion::getConexion();
class Conexion {
 
    public static function getConexion() {
        $conn = null;

        try {
            $conn = new PDO("mysql:host=localhost;dbname=semillero", "root", "");
            $conn->setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $ex) {
            echo 'ERROR: ' . $ex->getMessage();
        }
        return $conn;
    }

}



