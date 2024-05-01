<?php
class RolDao {
    public function registrarRol(RolDto $rolDto) {
        $cnn = Conexion::getConexion();
        $mensaje = "";
        try {
            $query = $cnn->prepare("INSERT INTO rol(nombreRol) VALUES (?)");
            $nombreRol =$rolDto->getNombreRol();
            $query->bindParam(1, $nombreRol);
            $query->execute();
            $mensaje="Registro Exitoso";
        } catch (Exception $ex) {
            $mensaje = $ex->getMessage();
        }
        $cnn =null;
        return $mensaje;
    }
    public function modificarRol(RolDto $rolDto) {
        $cnn = Conexion::getConexion();
        $mensaje = "";
        try {
            $query = $cnn->prepare("UPDATE rol SET nombreRol=? WHERE  idRol=?");
            $idRol=$rolDto->getIdRol();
            $nombreRol =$rolDto->getNombreRol();
            $query->bindParam(1, $nombreRol);
            $query->bindParam(2,  $idRol);
            $query->execute();
            $mensaje = "Registro Actualizado";
        } catch (Exception $ex) {
            $mensaje = $ex->getMessage();
        }
        $cnn=null;
        return $mensaje;
    }
  public function eliminarRol($idRol) {
        $cnn = Conexion::getConexion();  
        $mensaje = "";
        try {
            $query = $cnn->prepare("DELETE FROM rol WHERE idRol = ?");
            $query->bindParam(1, $idRol);
            $query->execute();
            $mensaje = "Registro Eliminado";
        } catch (Exception $ex) {
         $mensaje = $ex->getMessage();  
     }
     return $mensaje;
 }
     public function listarRolId($idRol) {
        $cnn = Conexion::getConexion();        
        try {
            $query = $cnn->prepare('SELECT * FROM rol where idRol=?');
           $query->bindParam(1, $idRol);
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
        $listarRoles = "Select * from rol where nombreRol in('Aprendiz','Instructor')";
        $query = $cnn->prepare($listarRoles);
        $query->execute();
        return $query->fetchAll();
    } catch (Exception $ex) {
        echo 'Error' . $ex->getMessage();
    }
}
public function listarTodosAdmin() {
    $cnn = Conexion::getConexion();

    try {
        $listarRoles = 'Select * from rol';
        $query = $cnn->prepare($listarRoles);
        $query->execute();
        return $query->fetchAll();
    } catch (Exception $ex) {
        echo 'Error' . $ex->getMessage();
    }
}


}