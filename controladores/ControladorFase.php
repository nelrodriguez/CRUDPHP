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
require '../modelo.dao/FaseDao.php';
require '../modelo.dto/FaseDto.php';
require '../datos/Conexion.php';


if (isset($_POST['btnRegistrarFase'])) {
   $_SESSION['time'] = time();
    $faseDao = new FaseDao();
    
    $faseDto = new FaseDto();
    //$faseDto->setIdFase($_POST['txtIdFaseR']);
    $faseDto->setNombreFase($_POST['txtNombreFaseR']);
    


    
    
    $_SESSION['mensaje'] = $faseDao->registrarFase($faseDto);
    
   
    echo "<script> window.location.replace('../fase.php');</script>"; 
 
    
} 
else if (isset($_POST['btnEliminarFase'])) {
    $_SESSION['time'] = time();
    $faseDao = new FaseDao();
    $_SESSION['mensaje']= $faseDao->eliminarFase($_POST['txtIdFaseEliminar']);
    echo "<script> 

window.location.replace('../fase.php'); 

</script>"; 
    
    
} 
else if (isset($_POST['btnModificarFase'])) {
  $_SESSION['time'] = time();
   $faseDao = new FaseDao();
    
    $faseDto = new FaseDto();
    $faseDto->setIdFase($_POST['txtIdFaseM']);
    $faseDto->setNombreFase($_POST['txtNombreFaseM']);
    
    
    

    $_SESSION['mensaje']= $faseDao->modificarFase($faseDto);
    echo "<script> 

window.location.replace('../fase.php$_SESSION['mensaje']'); 

</script>"; 
  
    
} 