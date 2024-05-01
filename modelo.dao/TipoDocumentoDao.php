<?php

class TipoDocumentoDao {

    public function registrarTipoDocumento(TipoDocumentoDto $tipoDocumentoDto) {
        $cnn = Conexion::getConexion();
        $mensaje = "";
        try {
            $query = $cnn->prepare("INSERT INTO tipodocumento(tipoDocumento) VALUES (?)");

           
            $tipoDocumento =$tipoDocumentoDto->getTipoDocumento();
            
                 
         
            $query->bindParam(1, $tipoDocumento);
                    
            
            $query->execute();
            $mensaje="Registro Exitoso";
        } catch (Exception $ex) {
            $mensaje = $ex->getMessage();
        }
        $cnn =null;
        return $mensaje;
    }
    public function modificarTipoDocumento(TipoDocumentoDto $tipoDocumentoDto) {
        $cnn = Conexion::getConexion();
        $mensaje = "";
        try {
            $query = $cnn->prepare("UPDATE tipodocumento SET tipoDocumento=? WHERE  idTipoDocumento=?");
            $idTipoDocumento=$tipoDocumentoDto->getIdTipoDocumento();

             
            $tipoDocumento =$tipoDocumentoDto->getTipoDocumento();
            
            $query->bindParam(1, $tipoDocumento);
            $query->bindParam(2,  $idTipoDocumento);
            $query->execute();
            $mensaje = "Registro Actualizado";
        } catch (Exception $ex) {
            $mensaje = $ex->getMessage();
        }
        $cnn=null;
        return $mensaje;
    }
  public function eliminarTipoDocumento($idTipoDocumento) {
        $cnn = Conexion::getConexion();  
        $mensaje = "";
        try {
            $query = $cnn->prepare("DELETE FROM tipodocumento WHERE idTipoDocumento = ?");
            $query->bindParam(1, $idTipoDocumento);
            $query->execute();
            $mensaje = "Registro Eliminado";
        } catch (Exception $ex) {
         $mensaje = $ex->getMessage();  
     }
     return $mensaje;
 }
    
     public function listarTipoDocumentoId($idTipoDocumento) {
        $cnn = Conexion::getConexion();        
        try {
            $query = $cnn->prepare('SELECT * FROM tipodocumento where idTipoDocuemnto=?');
           $query->bindParam(1, $idTipoDocumento);
            $query->execute();
            return $query->fetchAll();
        } catch (Exception $ex) {
            echo 'Error' . $ex->getMessage();
        }
        $cnn=null;
    }
 public function listarTodos() {
    $cnn = Conexion::getConexion();

    try {
        $listarTiposDocumentos = 'Select * from tipodocumento';
        $query = $cnn->prepare($listarTiposDocumentos);
        $query->execute();
        return $query->fetchAll();
    } catch (Exception $ex) {
        echo 'Error' . $ex->getMessage();
    }
}



}
