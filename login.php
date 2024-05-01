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
 <nav class="navbar navbar-dark bg-success navbar-expand-md">

   <img src="resources/img/SENA11.png" width="50px" />

   <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#menu">
    <span class="navbar-toggler-icon"></span>
  </button>
               <div class="collapse navbar-collapse" id="menu">
                    <ul class="navbar-nav ml-auto">
                        
                         <li class="nav-item"><a href="registro.php" class="navbar-nav text-light">Registrarse</a></li>
                    </ul>
                   
              </div> 
                </nav>

                
                <div class="container mt-5 mb-5">
                  <div class="row justify-content-center">
                    <div class="col-12 col-md-5">
                      <div class="card">
                        <div class="card-header bg-dark">
                          <h3 class="card-title text-center text-light">Login</h3>
                        </div>
                        <div class="card-body">
                          <!--Formulario para ingreso al sistema-->
                          <form action="controladores/ControladorUsuario.php" method="POST">
                            <dv class="row">
                             <div class="col-12">
                              <label for="numeroDoc">Número de documento</label>
                              <input type="text"  id="txtNumDocumento" name="txtNumDocumento" class="form-control" required placeholder="Documento" pattern="[0-9]+" maxlength="15"  />


                            </div>
                            <div class="col-12">
                              <label  for="contrasena">Contraseña</label>
                              <input type="password"  id="txtClave" name="txtClave" class="form-control" minlength="6" placeholder="Contraseña" required />


                              <input type="submit" id="btnLogin" name="btnLogin" class="btn btn-primary btn-block text-light mt-3" value="Ingresar"/>
                            
                            </div>

                          </dv>
                        <?php
session_start();
  if (isset($_SESSION['mensaje'])) {

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
                <script type="text/javascript">
                  var documento=document.getElementById("numeroDoc");
                  var clave=document.getElementById("contrasena");
                  function validarRol(){
                   if (documento.value=="40654987" && clave.value=="123456") {
                     window.location="menu.php";



                   }
                   else  if (documento.value=="80160531" && clave.value=="123456") {
                    
                    window.location="menuInstructor.php";




                  }

                  else{ 
                    swal("Error!", "¡Credeciales de acceso incorrectas, intente nuevamente!" ,"error");
                    

                    return false;

                  }

                }
                </script>
                <script src="resources/js/jquery-3.3.1.min.js" type="text/javascript"></script>
                <script src="resources/js/popper.min.js" type="text/javascript"></script>
                <script src="resources/js/bootstrap.min.js" type="text/javascript"></script>
              </body>
              </html>