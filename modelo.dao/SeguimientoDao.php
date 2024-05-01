<?php

class SeguimientoDao {

    public function registrarSeguimiento(SeguimientoDto $seguimientoDto) {
        $cnn = Conexion::getConexion();
        $mensaje = "";
        try {
            $query = $cnn->prepare("INSERT INTO seguimiento( observacion, fechaInicioFase, fechaFinFase, porcentajeAvance, archivoSoporte, idProyecto, idFase) VALUES (?,?,?,?,?,?,?)");

            $observacion=$seguimientoDto->getObservacion();
            $fechaInicioFase =$seguimientoDto->getFechaInicioFase() ;
            $fechaFinFase =$seguimientoDto->getFechaFinFase();
            $porcentajeAvance=$seguimientoDto->getPorcentajeAvance();
            $archivoSoporte=$seguimientoDto->getArchivoSoporte();
            $idProyecto=$seguimientoDto->getIdProyecto();
            $idFase=$seguimientoDto->getIdFase();
           
            
            $query->bindParam(1,   $observacion);
            $query->bindParam(2, $fechaInicioFase);
            $query->bindParam(3, $fechaFinFase);
            $query->bindParam(4, $porcentajeAvance);
            $query->bindParam(5, $archivoSoporte);
            $query->bindParam(6, $idProyecto);
            $query->bindParam(7, $idFase);
            $query->execute();
            $mensaje="Registro Exitoso";
        } catch (Exception $ex) {
            $mensaje = $ex->getMessage();
        }
        $cnn =null;
        return $mensaje;
    }
    public function modificarSeguimiento(SeguimientoDto $seguimientoDto) {
        $cnn = Conexion::getConexion();
        $mensaje = "";
        try {
            $query = $cnn->prepare("UPDATE seguimiento SET observacion=?,fechaInicioFase=?,fechaFinFase=?,porcentajeAvance=?,archivoSoporte=?,idFase=? WHERE idSeguimiento=?");
           
            $idSeguimiento=$seguimientoDto->getIdSeguimiento();
            $observacion=$seguimientoDto->getObservacion();
            $fechaInicioFase =$seguimientoDto->getFechaInicioFase() ;
            $fechaFinFase =$seguimientoDto->getFechaFinFase();
            $porcentajeAvance=$seguimientoDto->getPorcentajeAvance();
            $archivoSoporte=$seguimientoDto->getArchivoSoporte();
            
            $idFase=$seguimientoDto->getIdFase();
           
            
            $query->bindParam(1,   $observacion);
            $query->bindParam(2, $fechaInicioFase);
            $query->bindParam(3, $fechaFinFase);
            $query->bindParam(4, $porcentajeAvance);
            $query->bindParam(5, $archivoSoporte);
           
            $query->bindParam(6, $idFase);
            $query->bindParam(7, $idSeguimiento);

            $query->execute();
            $mensaje = "Registro Actualizado";
        } catch (Exception $ex) {
            $mensaje = $ex->getMessage();
        }
        $cnn=null;
        return $mensaje;
    }
    public function obtenerSeguimiento($idSeguimiento) {
        $cnn = Conexion::getConexion();        
        try {
            $query = $cnn->prepare('SELECT * FROM seguimiento WHERE idSeguimiento = ?');
            $query->bindParam(1, $idSeguimiento);
            $query->execute();
            return $query->fetch();
        } catch (Exception $ex) {
            echo 'Error' . $ex->getMessage();
        }
        $cnn=null;
    }
    public function eliminarSeguimiento($idSeguimiento) {
        $cnn = Conexion::getConexion();  
        $mensaje = "";
        try {
            $query = $cnn->prepare("DELETE FROM seguimiento WHERE idSeguimiento = ?");
            $query->bindParam(1, $idSeguimiento);
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
        $listarSeguimiento= 'Select * from seguimiento';
        $query = $cnn->prepare($listarSeguimiento);
        $query->execute();
        return $query->fetchAll();
    } catch (Exception $ex) {
        echo 'Error' . $ex->getMessage();
    }
}
public function obtenerSeguimientoIdProyecto($idProyecto) {
        $cnn = Conexion::getConexion();        
        try {
            $query = $cnn->prepare('SELECT * FROM Seguimiento  WHERE idProyecto = ?');
            $query->bindParam(1, $idProyecto);
            $query->execute();
            return $query->fetchAll();
        } catch (Exception $ex) {
            echo 'Error' . $ex->getMessage();
        }
        $cnn=null;
    }
    

}
