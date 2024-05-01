<?php

class UsuarioDao {

    public function registrarUsuario(UsuarioDto $usuarioDto) {
        $cnn = Conexion::getConexion();
        $mensaje = "";
        try {
            $query = $cnn->prepare("INSERT INTO usuario(idTipoDocumento, documentoUsuario, nombreUsuario, apellidoUsuario, correoUsuario, telefonoUsuario, foto, claveUsuario, idRol) VALUES(?,?,?,?,?,?,?,?,?)");

            $tipoDocumento=$usuarioDto->getIdTipoDocumento();
            $numDocumento =$usuarioDto->getDocumentoUsuario() ;
            
            $nombres=$usuarioDto->getNombreUsuario();
            $apellidos=$usuarioDto->getApellidoUsuario();
            
            $foto=$usuarioDto->getFoto();
            
            $telefonoUsuario=$usuarioDto->getTelefonoUsuario();
            
            $correo=$usuarioDto->getCorreoUsuario();
            
            $clave=$usuarioDto->getClaveUsuario();
            $idRol=$usuarioDto->getIdRol();

            $query->bindParam(1,  $tipoDocumento);
            $query->bindParam(2, $numDocumento);
            $query->bindParam(3, $nombres);
            $query->bindParam(4, $apellidos);
            $query->bindParam(5, $correo);
            $query->bindParam(6, $telefonoUsuario);
            $query->bindParam(7, $foto);
            $query->bindParam(8, $clave);
            $query->bindParam(9, $idRol);
            
            $query->execute();
            $mensaje="Registro Exitoso";
        } catch (Exception $ex) {
            $mensaje = $ex->getMessage();
        }
        $cnn =null;
        return $mensaje;
    }
    public function modificarUsuario(UsuarioDto $usuarioDto) {
        $cnn = Conexion::getConexion();
        $mensaje = "";
        try {
            $query = $cnn->prepare("UPDATE usuario SET idTipoDocumento=?,documentoUsuario=?,nombreUsuario=?,apellidoUsuario=?,correoUsuario=?,telefonoUsuario=?,idRol=? WHERE idUsuario=?");
           $idUsuario=$usuarioDto->getIdUsuario();
            $tipoDocumento=$usuarioDto->getIdTipoDocumento();
            $numDocumento =$usuarioDto->getDocumentoUsuario() ;
            
            $nombres=$usuarioDto->getNombreUsuario();
            $apellidos=$usuarioDto->getApellidoUsuario();
            
            
            $telefonoUsuario=$usuarioDto->getTelefonoUsuario();
            
            $correo=$usuarioDto->getCorreoUsuario();
            
            
            $idRol=$usuarioDto->getIdRol();

            $query->bindParam(1,  $tipoDocumento);
            $query->bindParam(2, $numDocumento);
            $query->bindParam(3, $nombres);
            $query->bindParam(4, $apellidos);
            $query->bindParam(5, $correo);
            $query->bindParam(6, $telefonoUsuario);
            
            $query->bindParam(7, $idRol);
           
            $query->bindParam(8, $idUsuario);
            $query->execute();
            $mensaje = "Registro Actualizado";
        } catch (Exception $ex) {
            $mensaje = $ex->getMessage();
        }
        $cnn=null;
        return $mensaje;
    }
    public function obtenerUsuario($idUsuario) {
        $cnn = Conexion::getConexion();        
        try {
            $query = $cnn->prepare('SELECT * FROM usuario WHERE idUsuario = ?');
            $query->bindParam(1, $idUsuario);
            $query->execute();
            return $query->fetch();
        } catch (Exception $ex) {
            echo 'Error' . $ex->getMessage();
        }
        $cnn=null;
    }
    public function eliminarUsuario($idUsuario) {
        $cnn = Conexion::getConexion();  
        $mensaje = "";
        try {
            $query = $cnn->prepare("DELETE FROM usuario WHERE idUsuario = ?");
            $query->bindParam(1, $idUsuario);
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
        $listarUsuarios = 'Select * from instructor';
        $query = $cnn->prepare($listarUsuarios);
        $query->execute();
        return $query->fetchAll();
    } catch (Exception $ex) {
        echo 'Error' . $ex->getMessage();
    }
}

public function login($numDocumento,$clave) {
        $cnn = Conexion::getConexion();        
        try {
            $query = $cnn->prepare('SELECT usuario.*, rol.*
FROM usuario 
    LEFT JOIN rol ON usuario.idRol = rol.idRol
where documentoUsuario=? and claveUsuario=?');
            $query->bindParam(1, $numDocumento);
            $query->bindParam(2, $clave);
            $query->execute();
            return $query->fetch();
        } catch (Exception $ex) {
            echo 'Error' . $ex->getMessage();
        }
        $cnn=null;
    }

public function modificarFoto($numDocumento,$foto) {
        $cnn = Conexion::getConexion();        
        try {
            $query = $cnn->prepare('UPDATE usuario SET foto=? WHERE documentoUsuario=?');
            $query->bindParam(1, $foto);
            $query->bindParam(2, $numDocumento);
            $query->execute();
            $mensaje="Foto actualizada";
        } catch (Exception $ex) {
             $mensaje= 'Error' . $ex->getMessage();
        }
        $cnn=null;
        return $mensaje;
    }

    
     public function listarUsuarios()
     {
 $cnn = Conexion::getConexion();

    try {
        $listarUsuarios = 'SELECT usuario.*, rol.*
FROM usuario 
    LEFT JOIN rol ON usuario.idRol = rol.idRol';
        $query = $cnn->prepare($listarUsuarios);
        $query->execute();
        return $query->fetchAll();
    } catch (Exception $ex) {
        echo 'Error' . $ex->getMessage();
    }
        
     }


     public function listarIntegrantes()
     {
 $cnn = Conexion::getConexion();

    try {
        $listarUsuarios = "SELECT usuario.*, rol.*
FROM usuario 
    LEFT JOIN rol ON usuario.idRol = rol.idRol where rol.nombreRol<>'Administrador'";
        $query = $cnn->prepare($listarUsuarios);
        $query->execute();
        return $query->fetchAll();
    } catch (Exception $ex) {
        echo 'Error' . $ex->getMessage();
    }
        
     }
}
