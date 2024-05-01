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
require '../modelo.dao/ProyectoDao.php';
require '../modelo.dto/ProyectoDto.php';
require '../datos/Conexion.php';


if (isset($_POST['btnRegistrarProyecto'])) {
   $_SESSION['time'] = time();
    $proyectoDao = new ProyectoDao();
    
    $proyectoDto = new ProyectoDto();
    //$proyectoDto->setIdProyecto($_POST['txtIdProyecto']);
    $proyectoDto->setNombreProyecto($_POST['txtNombreProyectoR']);
    $proyectoDto->setFechaCreacion($_POST['txtFechaCreacionR']);
    $proyectoDto->setFechaInicio($_POST['txtFechaInicioR']);
    $proyectoDto->setFechaFinal($_POST['txtFechaFinalR']);
    $proyectoDto->setEstadoProyecto("Creado");
    $proyectoDto->setPresupuesto($_POST['txtPresupuestoR']);
   $proyectoDto->setIdEntidad($_POST['txtIdEntidadR']);
  // $proyectoDto->setIdGrupo($_POST['txtIdGrupoR']);
    

    $_SESSION['mensaje']= $proyectoDao->registrarProyecto($proyectoDto);
    echo "<script> 

window.location.replace('../proyecto.php'); 

</script>"; 
 
    
} 
else if (isset($_POST['btnEliminarProyecto']) || isset($_POST['btnEliminarProyectoSena'])) {
    $_SESSION['time'] = time();
    $proyectoDao = new ProyectoDao();
   $_SESSION['mensaje']= $proyectoDao->eliminarProyecto($_POST['txtIdProyectoEliminar']);
    
      if(isset($_POST['btnEliminarProyecto'])){
   echo "<script> 

window.location.replace('../proyecto.php'); 

</script>"; 
}
else if(isset($_POST['btnEliminarProyectoSena'])){
   echo "<script> 

window.location.replace('../menuSena.php'); 

</script>"; 
}
 
    
} 
else if (isset($_POST['btnModificarProyecto']) || isset($_POST['btnModificarProyectoSena']) ) {
  $_SESSION['time'] = time();
   $proyectoDao = new ProyectoDao();
    
    $proyectoDto = new ProyectoDto();
    $proyectoDto->setIdProyecto($_POST['txtIdProyectoM']);
     $proyectoDto->setNombreProyecto($_POST['txtNombreProyectoM']);
    $proyectoDto->setFechaCreacion($_POST['txtFechaCreacionM']);
    $proyectoDto->setFechaInicio($_POST['txtFechaInicioM']);
    $proyectoDto->setFechaFinal($_POST['txtFechaFinalM']);
    $proyectoDto->setEstadoProyecto($_POST['txtEstadoProyectoM']);
    $proyectoDto->setPresupuesto($_POST['txtPresupuestoM']);
   $proyectoDto->setIdEntidad($_POST['txtIdEntidadM']);
   //$proyectoDto->setIdGrupo($_POST['txtIdGrupoM']);
   
    

    $_SESSION['mensaje'] = $proyectoDao->modificarProyecto($proyectoDto);
    if(isset($_POST['btnModificarProyecto'])){
   echo "<script> 

window.location.replace('../proyecto.php'); 

</script>"; 
}
else if(isset($_POST['btnModificarProyectoSena'])){
   echo "<script> 

window.location.replace('../menuSena.php'); 

</script>"; 
}
 
    
} 