<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIGPROSOFT</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="resources/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="resources/css/font-awesome.css">
      <link rel="stylesheet" href="resources/plugins/fontawesome-free/css/all.min.css">

  <!-- Theme style -->
  <link href="resources/css/AdminLTE.min.css" rel="stylesheet" type="text/css"/>
  <link href="resources/css/AdminLTE.css" rel="stylesheet" type="text/css"/>
    <!-- AdminLTE Skins. Choose a skin from the css/skins
     folder instead of downloading all of them to reduce the load. -->
     <link rel="stylesheet" href="resources/css/_all-skins.min.css">
     <link rel="apple-touch-icon" href="resources/img/SENA.png">
     <link rel="shortcut icon" href="resources/img/logo.png">
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <style>
.image-upload > input
{
    display: none;

}

.image-upload img
{
    width: 50px;
    cursor: pointer;
    
}
</style>
     

   </head>
   <!-- skin-red -->
   <body class="hold-transition skin-red sidebar-mini">
<?php

if(!isset($_SESSION['idUsuario'])){
  echo "<script> 

window.location.replace('login.php'); 

</script>"; 
   
  
}else{
      if((time() - $_SESSION['time']) > 300){
        header('location: logout.php');
      }
    }

   require 'modelo.dao/UsuarioDao.php';
    require 'datos/Conexion.php';
    require 'modelo.dao/TipoDocumentoDao.php';
    require 'modelo.dao/RolDao.php';
    
   
    
    $usuarioDao = new UsuarioDao();
    $tipoDocumentoDao = new TipoDocumentoDao();
    $usuarioLog=$usuarioDao->obtenerUsuario($_SESSION['idUsuario']);
    $tiposDocumento=$tipoDocumentoDao->listarTodos();
    ?>
    <div class="wrapper">

      <header class="main-header">

        <!-- Logo -->
        <div href="" class="logo bg-success">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>SIGPROSOFT</b>I</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b><?php echo $_SESSION['nombreRol']; ?></b><link rel="shortcut icon" href="resources/img/sena.11.ico"> </span>
        </div>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top bg-success" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle bg-success" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>

          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->

              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">

                <p><a href="logout.php" class="btn  text-light">Cerrar Sesión</a></p>
                

              </li>

            </ul>
          </div>

        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel mt-2 pb-2 mb-2 d-flex">
            <div class="image">
              <img  style="border-radius: 50%;" src="<?php echo $_SESSION['foto']; ?>" class="img-circle" alt="User Image">
            </div>
            <div class="info">
              <a href="#" class="d-block"><h6 ><?php echo $_SESSION['nombre']; ?></h6></a>
            </div>
          </div>
           <!-- Sidebar user panel -->

            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
              <li class="header"></li>

              <!--Menu 01-->
              <li class="treeview">
                <a href="#">
                  
                  <i class="fa fa-laptop"></i>
                  <span>Administración</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                
                <ul class="treeview-menu">

                  <li>
                    <a href="editarPerfil.php">
                      <i class="fa fa-user"></i>
                      <span>Editar Perfil</span>
                    </i>
                  </a>

                </li>
                
                
                                
              </ul> 
              <li class="treeview">
                <a href="#">
                  <svg width="1.4em" height="1em" viewBox="0 0 16 16" class="bi bi-wallet-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1.5 2A1.5 1.5 0 0 0 0 3.5v2h6a.5.5 0 0 1 .5.5c0 .253.08.644.306.958.207.288.557.542 1.194.542.637 0 .987-.254 1.194-.542.226-.314.306-.705.306-.958a.5.5 0 0 1 .5-.5h6v-2A1.5 1.5 0 0 0 14.5 2h-13z"/>
                    <path d="M16 6.5h-5.551a2.678 2.678 0 0 1-.443 1.042C9.613 8.088 8.963 8.5 8 8.5c-.963 0-1.613-.412-2.006-.958A2.679 2.679 0 0 1 5.551 6.5H0v6A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-6z"/>
                  </svg>
                  <span class="semaforo">Proyectos</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>

                <ul class="treeview-menu">
                  <li>
                    <a href="menuSena.php">
                      <i class="fa nav-icon far fa-calendar-alt"></i>
                      Proyecto
                      
                    </a>
                   
                    
                      <li><a href="seguimientoSena.php"><i class="fa nav-icon fas fa-edit"></i> Seguimiento</a></li>

  


                    


                  </li>
                </ul>
              </li>





           


        </ul>
      </section>
        <!-- /.sidebar -->
      </aside>
      <!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">
 <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">

                  <img id="fotoPerfil" class="profile-user-img img-fluid img-circle"
                       src="<?php echo $_SESSION['foto']; ?>"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?php echo $_SESSION['nombre']; ?></h3>
                 <form id="form2" action="controladores/ControladorUsuario.php" enctype="multipart/form-data" method="POST" >
               <div class="image-upload">
     <center> <label for="file-input">
      <img  src="resources\img\foto.jpg" alt ="Seleccionar Foto" title ="Seleccionar Foto"  > 
    </label></center>

    <input id="file-input" name="file-input" type="file" accept="image/jpeg"/><button type="submit" class="btn btn-primary btn-block" name="btnCambiarFoto">Guardar Foto</button>
</div>
</form>
              </div>
              
              <!-- /.card-body -->
            </div>
            <!-- *************** -->
          </div>
      

          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header bg-dark">
            <h4 class="card-title text-center text-light">Editar Datos</h4>
          </div>
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div class="post">

                      <!-- ******CratsJS******* -->

                      <div class="content">
            <form id="form1" action="controladores/ControladorUsuario.php"  enctype="multipart/form-data" method="POST" >
              <div class="row">
                <div class="col-12 text-md-right"><strong> * Campo requerido</strong> </div>
                
            <div class="col-12 col-md-6">
              <label for="txtTipoDocumentoPerfil"><strong>Tipo Documento *</strong></label>
              <select id="txtTipoDocumentoPerfil" name="txtTipoDocumentoPerfil"  class="form-control" required="true" >
               <option value="">Seleccione</option>
      <?php  foreach($tiposDocumento as $tipoDocumento) {?>
       <option value="<?php echo $tipoDocumento['idTipoDocumento']; ?>" <?php if($usuarioLog['idTipoDocumento']==$tipoDocumento['idTipoDocumento']){echo 'selected="selected"';  }  ?> >
        <?php echo $tipoDocumento['tipoDocumento']; ?></option>
     <?php } ?>
   </select>


           </div>
           <div class="col-12 col-md-6">
            <label  for="txtNumDocumentoPerfil"><strong>Documento *</strong></label>
            <input type="text" id="txtNumDocumentoPerfil" name="txtNumDocumentoPerfil" class="form-control" placeholder="Documento" required pattern="[0-9]+" maxlength="15" alt="Ingrese un documento!" value="<?php echo $usuarioLog['documentoUsuario']; ?>">

          </input>
        </div>
        
      
     



    <div class="col-12 col-md-6">
      <label  for="txtNombresPerfil"><strong>Nombres *</strong></label>
      <input type="text" id="txtNombresPerfil" name="txtNombresPerfil" placeholder="Nombres" class="form-control" required="true" pattern="[A-Za-z ]+" maxlength="45" value="<?php echo $usuarioLog['nombreUsuario']; ?>">

    </input>

  </div>
  <div class="col-12 col-md-6">
    <label  for="txtApellidosPerfil"><strong> Apellidos *</strong></label>
    <input type="text" id="txtApellidosPerfil" name="txtApellidosPerfil" class="form-control" placeholder="Apellidos" required pattern="[A-Za-z ]+" maxlength="45" value="<?php echo $usuarioLog['apellidoUsuario']; ?>">

  </input>

  </div>


 
 
  
  
    


  
  <div class="col-12 col-md-6">
    <label  for="txtCelularPerfil"><strong>Celular *</strong></label>
    <input type="number" id="txtCelularPerfil" name="txtCelularPerfil" class="form-control" placeholder="Celular" required value="<?php echo $usuarioLog['telefonoUsuario']; ?>">

  </input>


  </div>

  
  <div class="col-12 col-md-6">
    <label  for="txtCorreoPersonalPerfil"><strong>Correo Personal *</strong></label>
    <input type="email" id="txtCorreoPersonalPerfil" name="txtCorreoPersonalPerfil" class="form-control" placeholder="Correo Personal" required value="<?php echo $usuarioLog['correoUsuario']; ?>">

  </input>


  </div>
  
  
  
<div class="col-12 mt-3">
    <input type="submit" name="btnModificarPerfil"  class="btn btn-primary btn-block" value="Actualizar"/>
  </div>
  </div>
  <?php

  if (isset($_SESSION['mensaje'])) {

   $mensaje = $_SESSION['mensaje'];
   
    if($mensaje=="Foto actualizada" || $mensaje=="Registro Actualizado"){
   echo "<script> swal('Exito!', '$mensaje','success');</script>";
}
else{
  echo "<script> swal('Error!', '$mensaje','error');</script>";
}
unset($_SESSION['mensaje']);
  }


  ?>
   
  
  </div>
 
  </form>  
   
</section><!-- /.content -->
</div><!-- /.content-wrapper -->
<!--Fin-Contenido-->

<footer class="main-footer">
  <div class="pull-right hidden-xs">
    <b></b>        </div>
    <strong></a></strong> 
  </footer>
  <script>
    
    const output = document.getElementById('fotoPerfil');
    if (window.FileList && window.File && window.FileReader) {
      document.getElementById('file-input').addEventListener('change', event => {
        
     
        const file = event.target.files[0];
        if (!file.type) {
         swal("Error!", "El archivo no es compatible con el navegador" ,"error"); 
         return;
       }
       if (!file.type.match('image.*')) {
       
        swal("Error!", "El archivo seleccionado no es una imagen" ,"error"); 
        document.getElementById("file-input").value = "";
        return;
      }
      const reader = new FileReader();
      reader.addEventListener('load', event => {
        output.src = event.target.result;
      });
      reader.readAsDataURL(file);
    }); 
    }

   
    
  </script>
  <!-- jQuery 2.1.4 -->
 <script src="resources/js/jquery-3.3.1.min.js" type="text/javascript"></script>
  <!-- Bootstrap 3.3.5 -->
  <script src="resources/js/bootstrap.min.js"></script>
  <!-- AdminLTE App -->
  <script src="resources/js/app.min.js"></script>

</body>
</html>