<?php
session_start();
require '../modelo.dao/UsuarioDao.php';
require '../modelo.dto/UsuarioDto.php';
require '../datos/Conexion.php';
if(isset($_POST['btnLogin'])){
    
    $usuarioDao = new UsuarioDao();
    $usuario = $usuarioDao->login($_POST['txtNumDocumento'],$_POST['txtClave']);
    if($usuario['idUsuario']!= null){
        $_SESSION['time'] = time();
        $_SESSION['idUsuario']=$usuario['idUsuario'];
        $_SESSION['documento']=$usuario['documentoUsuario'];
      
        $_SESSION['nombre']=$usuario['nombreUsuario'];
        $_SESSION['foto']=$usuario['foto'];
        $_SESSION['rol']=$usuario['idRol'];
        $_SESSION['nombreRol']=$usuario['nombreRol'];
        if($_SESSION['nombreRol']=="Administrador"){
             echo "<script> 

window.location.replace('../menu.php'); 

</script>"; 
           
        }
        else{
            echo "<script> 

window.location.replace('../menuSena.php'); 

</script>"; 
           
       }


   }
   else{
    $_SESSION['mensaje']="Usuario y/o contraseña incorrectos";
    echo "<script> 

window.location.replace('../login.php'); 

</script>"; 
    
   }

   
}
else if(!isset($_SESSION['idUsuario'])){
        echo "<script> 

        window.location.replace('../login.php'); 

        </script>"; 
      }else{
      if((time() - $_SESSION['time']) > 300){
        header('location: ../logout.php');
      }
    }



if (isset($_POST['btnRegistro']) || isset($_POST['btnRegistrarUsuario'])) {
    $_SESSION['time'] = time();
    $usuarioDao = new UsuarioDao();
    
    $usuarioDto = new UsuarioDto();
    //$instructorDto->setIdInstructor($_POST['txtIdInstructor']);
    $usuarioDto->setIdTipoDocumento($_POST['txtTipoDocumento']);
    $usuarioDto->setDocumentoUsuario($_POST['txtNumDocumento']);
    
    $usuarioDto->setNombreUsuario($_POST['txtNombres']);
    $usuarioDto->setApellidoUsuario($_POST['txtApellidos']);
    $ruta=subir_fichero($_POST['txtNumDocumento'], 'txtFoto');
    if($ruta!=""){
        $usuarioDto->setFoto($ruta);
    }
    else
    {
        $usuarioDto->setFoto('foto/perfil.jpg');
    }
    
    
    $usuarioDto->setTelefonoUsuario($_POST['txtCelular']);
    $usuarioDto->setCorreoUsuario($_POST['txtCorreoPersonal']);
   
    $usuarioDto->setClaveUsuario($_POST['txtClave']);
    $usuarioDto->setIdRol($_POST['txtRol']);

    $_SESSION['mensaje']= $usuarioDao->registrarUsuario($usuarioDto);
    if(isset($_POST['btnRegistro'])){
     echo "<script> 
    

window.location.replace('../registro.php'); 

</script>"; 
}
 if(isset($_POST['btnRegistrarUsuario'])){
     echo "<script> 
    

window.location.replace('../menu.php'); 

</script>"; 
}
    
    
} 
else if (isset($_POST['btnEliminarUsuario'])) {
    $_SESSION['time'] = time();
    $usuarioDao = new UsuarioDao();
    $_SESSION['mensaje'] = $usuarioDao->eliminarUsuario($_POST['txtIdUsuarioEliminar']);
    
    echo "<script> 

window.location.replace('../menu.php'); 

</script>"; 
   
    
} 
else if (isset($_POST['btnModificarUsuario'])) {
    $_SESSION['time'] = time();
    
   $usuarioDao = new UsuarioDao();

   $usuarioDto = new UsuarioDto();
   $usuarioDto->setIdUsuario($_POST['txtIdUsuario']);
  $usuarioDto->setIdTipoDocumento($_POST['txtTipoDocumento']);
    $usuarioDto->setDocumentoUsuario($_POST['txtNumDocumento']);
    
    $usuarioDto->setNombreUsuario($_POST['txtNombres']);
    $usuarioDto->setApellidoUsuario($_POST['txtApellidos']);

$usuarioDto->setTelefonoUsuario($_POST['txtCelular']);
    $usuarioDto->setCorreoUsuario($_POST['txtCorreoPersonal']);
   
   
    $usuarioDto->setIdRol($_POST['txtRol']);

$_SESSION['mensaje'] = $usuarioDao->modificarUsuario($usuarioDto);
 echo "<script> 

window.location.replace('../menu.php'); 

</script>"; 


} 
else if (isset($_POST['btnModificarPerfil'])) {
    $_SESSION['time'] = time();
    
   $usuarioDao = new UsuarioDao();

   $usuarioDto = new UsuarioDto();
   $usuarioDto->setIdUsuario($_SESSION['idUsuario']);
  $usuarioDto->setIdTipoDocumento($_POST['txtTipoDocumentoPerfil']);
    $usuarioDto->setDocumentoUsuario($_POST['txtNumDocumentoPerfil']);
    
    $usuarioDto->setNombreUsuario($_POST['txtNombresPerfil']);
    $usuarioDto->setApellidoUsuario($_POST['txtApellidosPerfil']);

$usuarioDto->setTelefonoUsuario($_POST['txtCelularPerfil']);
    $usuarioDto->setCorreoUsuario($_POST['txtCorreoPersonalPerfil']);
   
   
    $usuarioDto->setIdRol($_SESSION['rol']);

$_SESSION['mensaje'] = $usuarioDao->modificarUsuario($usuarioDto);
 echo "<script> 

window.location.replace('../editarPerfil.php'); 

</script>"; 


} 
else if (isset($_POST['btnCambiarFoto'])){
   $_SESSION['time'] = time();
    $usuarioDao = new UsuarioDao();
    $ruta=subir_fichero($_SESSION['documento'], 'file-input');
    if($ruta==""){
        $ruta='foto/perfil.jpg';
    }
    
    $_SESSION['mensaje'] = $usuarioDao->modificarFoto($_SESSION['documento'],$ruta);
    if($_SESSION['mensaje']  =='Foto actualizada'){
        $_SESSION['foto']=$ruta;
    }
    
 echo "<script> 

window.location.replace('../editarPerfil.php'); 

</script>"; 
 

}
function subir_fichero($documento, $nombre_fichero)
{

    $ruta="";
    $tmp_name = $_FILES[$nombre_fichero]['tmp_name'];
    
    if (is_uploaded_file($tmp_name))
    {
        $img_file = $_FILES[$nombre_fichero]['name'];
        $img_type = $_FILES[$nombre_fichero]['type'];

        if (((strpos($img_type, "gif") || strpos($img_type, "jpeg") ||
           strpos($img_type, "jpg")) || strpos($img_type, "png")))
        {

            $nombre=$documento.".".pathinfo($img_file,PATHINFO_EXTENSION);

            if (move_uploaded_file($tmp_name,  '../foto/'.$nombre))
            {
                $ruta='foto/'.$nombre;
                
            }
        }
    }

    return $ruta;
}