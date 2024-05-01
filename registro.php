  <!DOCTYPE html >
  <html >
  <head>
    <title>SIGPROSOFT</title>
    <meta charset="UTF-8"/>

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="resources/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link rel="shortcut icon" href="resources/img/logo.png">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


  </head>
  <body>
    <?php
    session_start();
    require 'modelo.dao/TipoDocumentoDao.php';
    require 'modelo.dao/RolDao.php';
    
    
    require 'datos/Conexion.php';
    $tipoDocumentoDao = new TipoDocumentoDao();
    $tiposDocumento = $tipoDocumentoDao->listarTodos();
    $rolDao = new RolDao();
    $roles = $rolDao->listarTodos();
    ?>
    <nav class="navbar navbar-dark bg-success navbar-expand-md">

     <img src="resources/img/SENA11.png" width="50px" />

     <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#menu">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="menu">
      <ul class="navbar-nav ml-auto">

       <li class="nav-item"><a href="login.php" class="navbar-nav text-light">Iniciar Sesión</a></li>
     </ul>

   </div> 

  </nav>


  <div class="container mt-5 mb-5">
    <div class="row justify-content-center">
      <div class="col-12 col-md-12">
        <div class="card">
          <div class="card-header bg-dark">
            <h3 class="card-title text-center text-light">Registrarse</h3>
          </div>
          <div class="card-body">
            <form id="form1" action="controladores/ControladorUsuario.php" onsubmit="return verificarClaves();" enctype="multipart/form-data" method="POST" >
              <div class="row">
                <div class="col-12 text-md-right"><strong> * Campo requerido</strong> </div>
                <div class="col-12 col-md-6">
                  <label  for="txtFoto" ><strong>Foto *</strong></label>
                  <input type="file" id="txtFoto" name="txtFoto"  class="form-control-file" accept="image/jpeg" placeholder="Foto" required >

                </input>
                
              </div>
              <div class="col-12 col-md-6" >
               <label  for="fotoPerfil"><strong>Foto Perfil</strong></label>
               <p id="status"></p>
               <div align="center">
                <img id="fotoPerfil" width="150px">
              </div>

            </div>
            <div class="col-12 col-md-6">
              <label for="txtTipoDocumento"><strong>Tipo Documento *</strong></label>
              <select id="txtTipoDocumento" name="txtTipoDocumento"  class="form-control" required="true">
               <option value="">Seleccione</option>
      <?php  foreach($tiposDocumento as $tipoDocumento) {?>
       <option value="<?php echo $tipoDocumento['idTipoDocumento']; ?>">
        <?php echo $tipoDocumento['tipoDocumento']; ?></option>
     <?php } ?>
   </select>


           </div>
           <div class="col-12 col-md-6">
            <label  for="txtNumDocumento"><strong>Documento *</strong></label>
            <input type="text" id="txtNumDocumento" name="txtNumDocumento" class="form-control" placeholder="Documento" required pattern="[0-9]+" maxlength="15" alt="Ingrese un documento!" >

          </input>
        </div>
        
      
     



    <div class="col-12 col-md-6">
      <label  for="txtNombres"><strong>Nombres *</strong></label>
      <input type="text" id="txtNombres" name="txtNombres" placeholder="Nombres" class="form-control" required="true" pattern="[A-Za-z ]+" maxlength="45">

    </input>

  </div>
  <div class="col-12 col-md-6">
    <label  for="txtApellidos"><strong> Apellidos *</strong></label>
    <input type="text" id="txtApellidos" name="txtApellidos" class="form-control" placeholder="Apellidos" required pattern="[A-Za-z ]+" maxlength="45">

  </input>

  </div>


 
 
  
  
    


  
  <div class="col-12 col-md-6">
    <label  for="txtCelular"><strong>Celular *</strong></label>
    <input type="number" id="txtCelular" name="txtCelular" class="form-control" placeholder="Celular" required >

  </input>


  </div>

  
  <div class="col-12 col-md-6">
    <label  for="txtCorreoPersonal"><strong>Correo Personal *</strong></label>
    <input type="email" id="txtCorreoPersonal" name="txtCorreoPersonal" class="form-control" placeholder="Correo Personal" required >

  </input>


  </div>
  
  <div class="col-12 col-md-6">
    <label  for="txtClave"><strong>Clave *</strong></label>
    <input type="password" name="txtClave" id="txtClave" class="form-control" placeholder="***********" required minlength="6">

  </input>

  </div>
  <div class="col-12 col-md-6">
    <label  for="contrasenaV"><strong>Verificar clave *</strong></label>
    <input type="password"  id="contrasenaV" name="contrasenaV" placeholder="**********" class="form-control" required minlength="6">

  </input>

  </div>
   <div class="col-12 col-md-6">
              <label for="txtRol"><strong>Rol *</strong></label>
              <select id="txtRol" name="txtRol"  class="form-control" required="true">
               <option value="">Seleccione</option>
      <?php  foreach($roles as $rol) {?>
       <option value="<?php echo $rol['idRol']; ?>">
        <?php echo $rol['nombreRol']; ?></option>
     <?php } ?>
   </select>


           </div>
  <div class="col-12 mt-3">
    <input type="submit" name="btnRegistro"  class="btn btn-primary btn-block" value="Registrar"/>
  </div>
  </div>
  <?php

  if (isset($_SESSION['mensaje'])) {
echo $mensaje;
   $mensaje = $_SESSION['mensaje'];
   if($mensaje=="Registro Exitoso"){
   echo "<script> swal('Exito!', '$mensaje','success');</script>";
}
else{
  echo "<script> swal('Error!', '$mensaje','error');</script>";
}
unset($_SESSION['mensaje']);
  }


  ?>
  </form>  
  </div>
  </div>
  </div>
  </div>
  </div>
  <div class="container-fluid">
    <div class="row bg-success">
      <div class="col-12">

      </div>
    </div>
  </div>

  <script>
    const status = document.getElementById('status');
    const output = document.getElementById('fotoPerfil');
    if (window.FileList && window.File && window.FileReader) {
      document.getElementById('txtFoto').addEventListener('change', event => {
        output.src = '';
        status.textContent = '';
        const file = event.target.files[0];
        if (!file.type) {
         swal("Error!", "El archivo no es compatible con el navegador" ,"error"); 
         return;
       }
       if (!file.type.match('image.*')) {
        status.style.color='#d32e12';
        swal("Error!", "El archivo seleccionado no es una imagen" ,"error"); 
        document.getElementById("txtFoto").value = "";
        return;
      }
      const reader = new FileReader();
      reader.addEventListener('load', event => {
        output.src = event.target.result;
      });
      reader.readAsDataURL(file);
    }); 
    }
    function verificarClaves(){
      if (txtClave.value !== contrasenaV.value) {

        swal("Error!", "¡Las claves no coinciden!" ,"error");
        return false;           





      }
      else {
        return true;
      }

    }
    
  </script>
  <script src="resources/js/jquery-3.3.1.min.js" type="text/javascript"></script>
  <script src="resources/js/popper.min.js" type="text/javascript"></script>
  <script src="resources/js/bootstrap.min.js" type="text/javascript"></script>
  </body>
  </html>