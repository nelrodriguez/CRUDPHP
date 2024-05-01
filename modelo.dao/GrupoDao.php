<?php

class GrupoDao {

    public function registrarGrupo(GrupoDto $grupoDto) {
        $cnn = Conexion::getConexion();
        $mensaje = "";
         $idProyecto =$grupoDto->getIdProyecto();
            $idUsuario =$grupoDto->getIdUsuario();
        try {
if($this->validarIntegranteGrupo($idProyecto,$idUsuario)[0]==0){
            $query = $cnn->prepare("INSERT INTO grupo(idProyecto,idUsuario) VALUES (?,?)");
   
           
         
            $query->bindParam(1, $idProyecto);
            $query->bindParam(2, $idUsuario);
                    
            
            $query->execute();
            $mensaje="Registro Exitoso";}
            else{
                 $mensaje="El usuario ya se encuentra asigando al proyecto";
            }
        } catch (Exception $ex) {
            $mensaje = $ex->getMessage();
        }
        $cnn =null;
        return $mensaje;
    }
   
    public function obtenerGrupo($idGrupo) {
        $cnn = Conexion::getConexion();        
        try {
            $query = $cnn->prepare('SELECT * FROM grupo WHERE idGrupo = ?');
            $query->bindParam(1, $idGrupo);
            $query->execute();
            return $query->fetch();
        } catch (Exception $ex) {
            echo 'Error' . $ex->getMessage();
        }
        $cnn=null;
    }
    public function eliminarGrupo($idGrupo) {
        $cnn = Conexion::getConexion();  
        $mensaje = "";
        try {
            $query = $cnn->prepare("DELETE FROM grupo WHERE idGrupo = ?");
            $query->bindParam(1, $idGrupo);
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
        $listarGrupo= 'Select * from grupo';
        $query = $cnn->prepare($listarGrupo);
        $query->execute();
        return $query->fetchAll();
    } catch (Exception $ex) {
        echo 'Error' . $ex->getMessage();
    }
}

public function listarIntegrantesGrupo($idProyecto) {
    $cnn = Conexion::getConexion();

    try {
        $listarGrupo= 'SELECT grupo.idGrupo,  usuario.documentoUsuario, usuario.nombreUsuario, usuario.apellidoUsuario, usuario.foto
FROM proyecto 
    LEFT JOIN grupo ON grupo.idProyecto = proyecto.idProyecto 
    LEFT JOIN usuario ON grupo.idUsuario = usuario.idUsuario where proyecto.idProyecto=?';
        $query = $cnn->prepare($listarGrupo);
        $query->bindParam(1, $idProyecto);
        $query->execute();
        return $query->fetchAll();
    } catch (Exception $ex) {
        echo 'Error' . $ex->getMessage();
    }
}
public function validarIntegranteGrupo($idProyecto,$idUsuario){
$cnn = Conexion::getConexion();

    try {
        $listaIntegranteGrupo= 'SELECT count(idGrupo) from grupo where idProyecto=? and idUsuario=?';
        $query = $cnn->prepare($listaIntegranteGrupo);
        $query->bindParam(1, $idProyecto);
         $query->bindParam(2, $idUsuario);
        $query->execute();
        return $query->fetch();
    } catch (Exception $ex) {
        return 1;
    }
}
}
