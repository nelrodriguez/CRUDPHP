<?php

class FaseDao {

    public function registrarFase(FaseDto $faseDto) {
        $cnn = Conexion::getConexion();
        $mensaje = "";
        try {
            $query = $cnn->prepare("INSERT INTO Fase(nombreFase) VALUES (?)");

           
            $nombreFase =$faseDto->getNombreFase();
            
                 
         
            $query->bindParam(1, $nombreFase);
                    
            
            $query->execute();
            $mensaje="Registro Exitoso";
        } catch (Exception $ex) {
            $mensaje = $ex->getMessage();
        }
        $cnn =null;
        return $mensaje;
    }
    public function modificarFase(FaseDto $faseDto) {
        $cnn = Conexion::getConexion();
        $mensaje = "";
        try {
            $query = $cnn->prepare("UPDATE Fase SET nombreFase=? WHERE  idFase=?");
            $idFase=$faseDto->getIdFase();

             
            $nombreFase =$faseDto->getNombreFase();
            
            $query->bindParam(1, $nombreFase);
            $query->bindParam(2,  $idFase);
            $query->execute();
            $mensaje = "Registro Actualizado";
        } catch (Exception $ex) {
            $mensaje = $ex->getMessage();
        }
        $cnn=null;
        return $mensaje;
    }
    public function obtenerFase($idFase) {
        $cnn = Conexion::getConexion();        
        try {
            $query = $cnn->prepare('SELECT * FROM fase WHERE idFase = ?');
            $query->bindParam(1, $idFase);
            $query->execute();
            return $query->fetch();
        } catch (Exception $ex) {
            echo 'Error' . $ex->getMessage();
        }
        $cnn=null;
    }
    public function eliminarFase($idFase) {
        $cnn = Conexion::getConexion();  
        $mensaje = "";
        try {
            $query = $cnn->prepare("DELETE FROM fase WHERE idFase = ?");
            $query->bindParam(1, $idFase);
            $query->execute();
            $mensaje = "Registro Eliminado";
        } catch (Exception $ex) {
         $mensaje = $ex->getMessage();  
     }
     return $mensaje;
 }
 public function listarTodos() {
    $cnn = Conexion::getConexion();

    try {
        $listarFase= 'Select * from Fase';
        $query = $cnn->prepare($listarFase);
        $query->execute();
        return $query->fetchAll();
    } catch (Exception $ex) {
        echo 'Error' . $ex->getMessage();
    }
}


}
