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
require '../modelo.dao/GrupoDao.php';
require '../modelo.dto/GrupoDto.php';
require '../datos/Conexion.php';


if (isset($_POST['btnRegistrarGrupo'])) {
   $_SESSION['time'] = time();
    $grupoDao = new GrupoDao();
    $proyecto=$_POST['txtIdProyectoGrupoR'];
    $integrantes=$_POST['txtIdIntegranteR'];

    for ($i=0; $i <count($integrantes) ; $i++) { 
        $grupoDto = new GrupoDto();
    $grupoDto->setIdProyecto($proyecto);
    $grupoDto->setIdUsuario($integrantes[$i]);
    
$_SESSION['mensaje'] = $grupoDao->registrarGrupo($grupoDto);
    }
    
  
   
   echo "<script> window.location.replace('../grupo.php');</script>"; 
 
    
} 
else if (isset($_POST['btnEliminarGrupo'])) {
    $_SESSION['time'] = time();
    $grupoDao = new GrupoDao();
    $_SESSION['mensaje'] = $grupoDao->eliminarGrupo($_POST['txtIdGrupoEliminar']);
    echo "<script> 

window.location.replace('../grupo.php'); 

</script>"; 
    
    
} 
