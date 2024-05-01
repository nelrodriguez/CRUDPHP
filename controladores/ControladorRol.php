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
require '../modelo.dao/RolDao.php';
require '../modelo.dto/RolDto.php';
require '../datos/Conexion.php';


if (isset($_POST['btnRegistrarRol'])) {
   $_SESSION['time'] = time();
    $rolDao = new RolDao();
    $rolDto = new RolDto();
    //$rolDto->setIdRol($_POST['txtIdRolR']);
    $rolDto->setNombreRol($_POST['txtNombreRolR']);
      
    $_SESSION['mensaje'] = $rolDao->registrarRol($rolDto);
     
    echo "<script> window.location.replace('../rol.php');</script>"; 
 
    
} 
else if (isset($_POST['btnEliminarRol'])) {
    $_SESSION['time'] = time();
    $rolDao = new RolDao();
    $rolDao->eliminarRol($_POST['txtIdRolEliminar']);
    echo "<script> window.location.replace('../rol.php'); </script>"; 
    
    
} 
else if (isset($_POST['btnModificarRol'])) {
  $_SESSION['time'] = time();
   $rolDao = new RolDao();
    
    $rolDto = new RolDto();
    $rolDto->setIdRol($_POST['txtIdRolM']);
    $rolDto->setNombreRol($_POST['txtNombreRolM']);
    
    $rolDao->modificarRol($rolDto);
    echo "<script> window.location.replace('../rol.php'); </script>"; 
  
    } 