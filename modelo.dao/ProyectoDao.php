<?php

class ProyectoDao {

    public function registrarProyecto(ProyectoDto $proyectoDto) {
        $cnn = Conexion::getConexion();
        $mensaje = "";
        try {
            $query = $cnn->prepare("INSERT INTO proyecto(nombreProyecto, fechaCreacion, fechaInicio, fechaFinal, estadoProyecto, presupuesto, idEntidad) VALUES (?,?,?,?,?,?,?)");

            $nombreProyecto=$proyectoDto->getNombreProyecto();
            $fechaCreacion =$proyectoDto->getFechaCreacion() ;
            $fechaInicio =$proyectoDto->getFechaInicio();
            $fechaFinal=$proyectoDto->getFechaFinal();
            $estadoProyecto=$proyectoDto->getEstadoProyecto();
            $presupuesto=$proyectoDto->getPresupuesto();
            $idEntidad=$proyectoDto->getIdEntidad();
            
            
            $query->bindParam(1,   $nombreProyecto);
            $query->bindParam(2, $fechaCreacion);
            $query->bindParam(3, $fechaInicio);
            $query->bindParam(4, $fechaFinal);
            $query->bindParam(5, $estadoProyecto);
            $query->bindParam(6,  $presupuesto);
            $query->bindParam(7, $idEntidad);
            $query->execute();
            $mensaje="Registro Exitoso";
        } catch (Exception $ex) {
            $mensaje = $ex->getMessage();
        }
        $cnn =null;
        return $mensaje;
    }
    public function modificarProyecto(ProyectoDto $proyectoDto) {
        $cnn = Conexion::getConexion();
        $mensaje = "";
        try {
            $query = $cnn->prepare("UPDATE proyecto SET nombreProyecto=?,fechaCreacion=?,fechaInicio=?,fechaFinal=?,estadoProyecto=?,presupuesto=?,idEntidad=? where idProyecto=?");
            $idProyecto=$proyectoDto->getIdProyecto();
            $nombreProyecto=$proyectoDto->getNombreProyecto();
            $fechaCreacion =$proyectoDto->getFechaCreacion() ;
            $fechaInicio =$proyectoDto->getFechaInicio();
            $fechaFinal=$proyectoDto->getFechaFinal();
            $estadoProyecto=$proyectoDto->getEstadoProyecto();
            $presupuesto=$proyectoDto->getPresupuesto();
            $idEntidad=$proyectoDto->getIdEntidad();
            
            $query->bindParam(1,   $nombreProyecto);
            $query->bindParam(2, $fechaCreacion);
            $query->bindParam(3, $fechaInicio);
            $query->bindParam(4, $fechaFinal);
            $query->bindParam(5, $estadoProyecto);
            $query->bindParam(6,  $presupuesto);
            $query->bindParam(7, $idEntidad);
            $query->bindParam(8,  $idProyecto);

            
            $query->execute();
            $mensaje = "Registro Actualizado";
        } catch (Exception $ex) {
            $mensaje = $ex->getMessage();
        }
        $cnn=null;
        return $mensaje;
    }
    public function obtenerProyectoId($idProyecto) {
        $cnn = Conexion::getConexion();        
        try {
            $query = $cnn->prepare('SELECT * FROM proyecto WHERE idProyecto = ?');
            $query->bindParam(1, $idProyecto);
            $query->execute();
            return $query->fetch();
        } catch (Exception $ex) {
            echo 'Error' . $ex->getMessage();
        }
        $cnn=null;
    }
    public function eliminarProyecto($idProyecto) {
        $cnn = Conexion::getConexion();  
        $mensaje = "";
        try {
            $query = $cnn->prepare("DELETE FROM proyecto WHERE idProyecto = ?");
            $query->bindParam(1, $idProyecto);
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
        $listarProyectos= 'SELECT proyecto.*, entidad.nombreEntidad FROM proyecto LEFT JOIN entidad ON proyecto.idEntidad = entidad.idEntidad';
        $query = $cnn->prepare($listarProyectos);
        $query->execute();
        return $query->fetchAll();
    } catch (Exception $ex) {
        echo 'Error' . $ex->getMessage();
    }
}

public function listarProyectosEntidad($idEntidad) {
    $cnn = Conexion::getConexion();

    try {
        $listarProyectos= 'Select * from proyecto where idEntidad=$idEntidad';
        $query = $cnn->prepare($listarProyectos);
        $query->bindParam(1, $idEntidad);
        $query->execute();
        return $query->fetchAll();
    } catch (Exception $ex) {
        echo 'Error' . $ex->getMessage();
    }
}
public function listarProyectosPorUsuario($idUsuario) {
    $cnn = Conexion::getConexion();

    try {
        $listarProyectos= 'SELECT proyecto.*, entidad.nombreEntidad
        FROM entidad 
        LEFT JOIN proyecto ON proyecto.idEntidad = entidad.idEntidad 
        LEFT JOIN grupo ON grupo.idProyecto = proyecto.idProyecto 
        LEFT JOIN usuario ON grupo.idUsuario = usuario.idUsuario
        where usuario.idUsuario=?';
        $query = $cnn->prepare($listarProyectos);
        $query->bindParam(1, $idUsuario);
        $query->execute();
        return $query->fetchAll();
    } catch (Exception $ex) {
        echo 'Error' . $ex->getMessage();
    }
}
public function listarProyectosUsuario($idUsuario) {
    $cnn = Conexion::getConexion();

    try {
        $listarProyectos= 'SELECT usuario.nombreUsuario, grupo_integrante.idGrupo, grupo.nombreGrupo, proyecto.nombreProyecto
        FROM usuario 
        LEFT JOIN grupo_integrante ON grupo_integrante.idUsuario = usuario.idUsuario 
        LEFT JOIN grupo ON grupo_integrante.idGrupo = grupo.idGrupo 
        LEFT JOIN proyecto ON proyecto.idGrupo = grupo.idGrupo
        where usuario.idUsuario=?';
        $query = $cnn->prepare($listarProyectos);
        $query->bindParam(1, $idUsuario);
        $query->execute();
        return $query->fetchAll();
    } catch (Exception $ex) {
        echo 'Error' . $ex->getMessage();
    }
}
}
