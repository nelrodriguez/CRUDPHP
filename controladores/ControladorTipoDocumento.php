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
require '../modelo.dao/TipoDocumentoDao.php';
require '../modelo.dto/TipoDocumentoDto.php';
require '../datos/Conexion.php';


if (isset($_POST['btnRegistrarTipoDocumento'])) {
   $_SESSION['time'] = time();
    $tipoDocumentoDao = new TipoDocumentoDao();
    
    $tipoDocumentoDto = new TipoDocumentoDto();
    //$tipoDocumentoDto->setIdTipoDocumento($_POST['txtIdTipoDocumentoR']);
    $tipoDocumentoDto->setTipoDocumento($_POST['txtTipoDocumentoR']);
    


    
    
    $_SESSION['mensaje']= $tipoDocumentoDao->registrarTipoDocumento($tipoDocumentoDto);
    
   
    echo "<script> window.location.replace('../tipoDocumento.php');</script>"; 
 
    
} 
else if (isset($_POST['btnEliminarTipoDocumento'])) {
    $_SESSION['time'] = time();
    $tipoDocumentoDao = new TipoDocumentoDao();
    $_SESSION['mensaje'] = $tipoDocumentoDao->eliminarTipoDocumento($_POST['txtIdTipoDocumentoEliminar']);
    echo "<script> 

window.location.replace('../tipodocumento.php'); 

</script>"; 
    
    
} 
else if (isset($_POST['btnModificarTipoDocumento'])) {
  $_SESSION['time'] = time();
   $tipoDocumentoDao = new TipoDocumentoDao();
    
    $tipoDocumentoDto = new TipoDocumentoDto();
    $tipoDocumentoDto->setIdTipoDocumento($_POST['txtIdTipoDocumentoM']);
    $tipoDocumentoDto->setTipoDocumento($_POST['txtTipoDocumentoM']);
    
    
    

    $_SESSION['mensaje'] = $tipoDocumentoDao->modificarTipoDocumento($tipoDocumentoDto);

    echo "<script> 

window.location.replace('../tipodocumento.php'); 

</script>"; 
  
    
} 