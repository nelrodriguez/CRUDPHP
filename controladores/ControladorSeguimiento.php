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
require '../modelo.dao/SeguimientoDao.php';
require '../modelo.dto/SeguimientoDto.php';
require '../datos/Conexion.php';


if (isset($_POST['btnRegistrarSeguimiento']) || isset($_POST['btnRegistrarSeguimientoSena']) ) {
   $_SESSION['time'] = time();
    $seguimientoDao = new SeguimientoDao();
    
    $seguimientoDto = new SeguimientoDto();
    //$seguimientoDto->setIdSeguimiento($_POST['txtIdSeguimiento']);
    $seguimientoDto->setObservacion($_POST['txtObservacionR']);
    $seguimientoDto->setFechaInicioFase($_POST['txtFechaInicioFaseR']);
    $seguimientoDto->setFechaFinFase($_POST['txtFechaFinFaseR']);
    $seguimientoDto->setPorcentajeAvance($_POST['txtPorcentajeAvanceR']);
   
    $seguimientoDto->setIdProyecto($_POST['txtIdProyectoR']);
    $seguimientoDto->setIdFase($_POST['txtIdFaseR']);
     $ruta=subir_fichero("Proyecto".$_POST['txtIdProyectoR']."Fase".$_POST['txtIdFaseR'],'txtArchivoSoporteR');
   
    $seguimientoDto->setArchivoSoporte($ruta);

    $_SESSION['mensaje']= $seguimientoDao->registrarSeguimiento($seguimientoDto);
       if(isset($_POST['btnRegistrarSeguimiento'])){
   echo "<script> 

window.location.replace('../seguimiento.php'); 

</script>"; 
}
else if(isset($_POST['btnRegistrarSeguimientoSena'])){
   echo "<script> 

window.location.replace('../seguimientoSena.php'); 

</script>"; 
}
   
    
} 
else if (isset($_POST['btnEliminarSeguimiento']) || isset($_POST['btnEliminarSeguimientoSena'])) {
    $_SESSION['time'] = time();
    $seguimientoDao = new SeguimientoDao();
    $_SESSION['mensaje'] = $seguimientoDao->eliminarSeguimiento($_POST['txtIdSeguimientoEliminar']);
    
     if(isset($_POST['btnEliminarSeguimiento'])){
   echo "<script> 

window.location.replace('../seguimiento.php'); 

</script>"; 
}
else if(isset($_POST['btnEliminarSeguimientoSena'])){
   echo "<script> 

window.location.replace('../seguimientoSena.php'); 

</script>"; 
}
   
    
} 
else if (isset($_POST['btnModificarSeguimiento']) || isset($_POST['btnModificarSeguimientoSena'])) {
   $_SESSION['time'] = time();
   $seguimientoDao = new SeguimientoDao();
    
    $seguimientoDto = new SeguimientoDto();
    $seguimientoDto->setIdSeguimiento($_POST['txtIdSeguimientoM']);
    
    $seguimientoDto->setObservacion($_POST['txtObservacionM']);
    $seguimientoDto->setFechaInicioFase($_POST['txtFechaInicioFaseM']);
    $seguimientoDto->setFechaFinFase($_POST['txtFechaFinFaseM']);
    $seguimientoDto->setPorcentajeAvance($_POST['txtPorcentajeAvanceM']);
    $ruta=subir_fichero("Proyecto".$_POST['txtIdProyectoM']."Fase".$_POST['txtIdFaseM'],'txtArchivoSoporteM');
    if($ruta!=""){
    $seguimientoDto->setArchivoSoporte($ruta);
    }
    else{
        $seguimientoDto->setArchivoSoporte($_POST['txtSoporteM']);
    }
    $seguimientoDto->setIdFase($_POST['txtIdFaseM']);

    $_SESSION['mensaje'] = $seguimientoDao->modificarSeguimiento($seguimientoDto);
     if(isset($_POST['btnModificarSeguimiento'])){
   echo "<script> 

window.location.replace('../seguimiento.php'); 

</script>"; 
}
else if(isset($_POST['btnModificarSeguimientoSena'])){
   echo "<script> 

window.location.replace('../seguimientoSena.php'); 

</script>"; 
}
   
    
} 
function subir_fichero($nombre_soporte, $nombre_fichero)
{

    $ruta="";
    $tmp_name = $_FILES[$nombre_fichero]['tmp_name'];
    
    if (is_uploaded_file($tmp_name))
    {
        $img_file = $_FILES[$nombre_fichero]['name'];
        

        

            $nombre=$nombre_soporte.".".pathinfo($img_file,PATHINFO_EXTENSION);

            if (move_uploaded_file($tmp_name,  '../soporte/'.$nombre))
            {
                $ruta='soporte/'.$nombre;
                
            }
        
    }

    return $ruta;
}

