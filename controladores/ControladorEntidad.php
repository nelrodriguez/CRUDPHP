<?php
session_start();
if(!isset($_SESSION['idUsuario'])){
        echo "<script> 

        window.location.replace('../login.php'); 

        </script>"; 
      }else{
      if((time() - $_SESSION['time']) > 300){
        header('location: ../logout.php');
      }
    }
require '../modelo.dao/EntidadDao.php';
require '../modelo.dto/EntidadDto.php';
require '../datos/Conexion.php';


if (isset($_POST['btnRegistrarEntidad'])) {
    $_SESSION['time'] = time();
    $entidadDao = new EntidadDao();
    
    $entidadDto = new EntidadDto();
    //$EntidadDto->setIdEntidad($_POST['txtIdEntidad']);
    $entidadDto->setNit($_POST['txtNitR']);
    $entidadDto->setNombreEntidad($_POST['txtNombreEntidadR']);
    $entidadDto->setCorreoEntidad($_POST['txtCorreoEntidadR']);
    $entidadDto->setTelefonoEntidad($_POST['txtTelefonoEntidadR']);
$entidadDto->setIdTipoDocumento($_POST['txtIdTipoDocumentoR']);

    
    

    $_SESSION['mensaje'] = $entidadDao->registrarEntidad($entidadDto);
      echo "<script> 

window.location.replace('../entidad.php'); 

</script>"; 
   
    
} 
else if (isset($_POST['btnEliminarEntidad'])) {
    $_SESSION['time'] = time();
    $entidadDao = new EntidadDao();
     $_SESSION['mensaje']  = $entidadDao->eliminarEntidad($_POST['txtIdEntidadEliminar']);
    
   echo "<script> 

window.location.replace('../entidad.php'); 

</script>"; 
    
} 
else if (isset($_POST['btnModificarEntidad'])) {
    $_SESSION['time'] = time();
   
   $entidadDao = new EntidadDao();
    
    $entidadDto = new EntidadDto();
    $entidadDto->setIdEntidad($_POST['txtIdEntidadM']);
    
    $entidadDto->setNit($_POST['txtNitM']);
    $entidadDto->setNombreEntidad($_POST['txtNombreEntidadM']);
    $entidadDto->setCorreoEntidad($_POST['txtCorreoEntidadM']);
    $entidadDto->setTelefonoEntidad($_POST['txtTelefonoEntidadM']);
$entidadDto->setIdTipoDocumento($_POST['txtIdTipoDocumentoM']);

     $_SESSION['mensaje']  = $entidadDao->modificarEntidad($entidadDto);
    
  echo "<script> 

window.location.replace('../entidad.php'); 

</script>"; 
    
} 