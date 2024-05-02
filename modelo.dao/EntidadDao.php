<?php

class EntidadDao {

    public function registrarEntidad(EntidadDto $entidadDto) {
        $cnn = Conexion::getConexion()
        $mensaje = ""
        try {
            $query = $cnn->prepare("INSERT INTO entidad( idTipoDocumento, NIT, nombreEntidad, correoEntidad, telefonoEntidad) VALUES (?,?,?,?,?)");

            $idTipoDocumento=$entidadDto->getIdTipoDocumento();
            $nit =$entidadDto->getNit() ;
            $nombreEntidad =$entidadDto->getNombreEntidad();
            $correoEntidad=$entidadDto->getCorreoEntidad();
            $telefonoEntidad=$entidadDto->getTelefonoEntidad();
                    
            $query->bindParam(1,   $idTipoDocumento);
            $query->bindParam(2, $nit);
            $query->bindParam(3, $nombreEntidad);
            $query->bindParam(4, $correoEntidad);
            $query->bindParam(5, $telefonoEntidad);
            
            $query->execute();
            $mensaje="Registro Exitoso";
        } catch (Exception $ex) {
            $mensaje = $ex->getMessage();
        }
        $cnn =null;
        return $mensaje
    }
    public function modificarEntidad(EntidadDto $entidadDto) {
        $cnn = Conexion::getConexion();
        $mensaje = "";
        try {
            $query = $cnn->prepare("UPDATE entidad SET idTipoDocumento=?,NIT=?,nombreEntidad=?,correoEntidad=?,telefonoEntidad=? WHERE  idEntidad=?");
            $idEntidad=$entidadDto->getIdEntidad();

             $idTipoDocumento=$entidadDto->getIdTipoDocumento();
            $nit =$entidadDto->getNit() ;
            $nombreEntidad =$entidadDto->getNombreEntidad();
            $correoEntidad=$entidadDto->getCorreoEntidad();
            $telefonoEntidad=$entidadDto->getTelefonoEntidad();
           
            
            $query->bindParam(1,   $idTipoDocumento);
            $query->bindParam(2, $nit);
            $query->bindParam(3, $nombreEntidad);
            $query->bindParam(4, $correoEntidad);
            $query->bindParam(5, $telefonoEntidad);
            
            $query->bindParam(6,  $idEntidad);
            $query->execute();
            $mensaje = "Registro Actualizado";
        } catch (Exception $ex) {
            $mensaje = $ex->getMessage();
        }
        $cnn=null;
        return $mensaje;
    }
    public function obtenerEntidad($idEntidad) {
        $cnn = Conexion::getConexion();        
        try {
            $query = $cnn->prepare('SELECT * FROM entidad WHERE idEntidad = ?');
            $query->bindParam(1, $idEntidad);
            $query->execute();
            return $query->fetch();
        } catch (Exception $ex) {
            echo 'Error' . $ex->getMessage();
        }
        $cnn=null;
    }
    public function eliminarEntidad($idEntidad) {
        $cnn = Conexion::getConexion();  
        $mensaje = "";
        try {
            $query = $cnn->prepare("DELETE FROM entidad WHERE idEntidad = ?");
            $query->bindParam(1, $idEntidad);
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
        $listarEntidad= 'Select * from entidad';
        $query = $cnn->prepare($listarEntidad);
        $query->execute();
        return $query->fetchAll();
    } catch (Exception $ex) {
        echo 'Error' . $ex->getMessage();
    }
}


}
