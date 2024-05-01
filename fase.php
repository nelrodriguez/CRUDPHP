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
    <link rel="stylesheet" href="resources/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="resources/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
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
       

     </head>
     <!-- skin-red -->
     <body class="hold-transition skin-red sidebar-mini">
      <?php

      if(!isset($_SESSION['idUsuario'])){
        echo "<script> 

        window.location.replace('login.php'); 

        </script>"; 
      }else if($_SESSION['rol']!="1"){
        header('location: logout.php');
      }else{
      if((time() - $_SESSION['time']) > 300){
        header('location: logout.php');
      }
    }

      require 'modelo.dao/FaseDao.php';
      require 'datos/Conexion.php';
      
      

      
      $faseDao=new FaseDao();
      
      $listaFases=$faseDao->listarTodos();
      ?>
      <div class="wrapper">

        <header class="main-header">

          <!-- Logo -->
          <div href="" class="logo bg-success">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>SIGPROSOFT</b>I</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Administrador</b><link rel="shortcut icon" href="resources/img/sena.11.ico"> </span>
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
                <a href="" class="d-block"><h6 ><?php echo $_SESSION['nombre']; ?></h6></a>
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
                    <a href="menu.php">
                      <i class="fa fa-user"></i>
                      <span>Usuarios</span>
                    </i>
                  </a>

                </li>
                <li>
                    <a href="rol.php">
                      <i class="fa fa-user"></i>
                      <span>Roles</span>
                    </i>
                  </a>
                </li>
                <li>
                    <a href="tipodocumento.php">
                      <i class="fa fa-user"></i>
                      <span>Tipos Documento</span>
                    </i>
                  </a>
                </li>
                <li>
                    <a href="entidad.php">
                      <i class="fa nav-icon fas fa-table"></i>
                      <span>Entidad</span>
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
                    <a href="proyecto.php">
                      <i class="fa nav-icon far fa-calendar-alt"></i>
                      Proyecto
                      
                    </a>
                   

                      <li><a href="grupo.php"><i class="fa fa-btn fa-users"></i> Grupo</a>
                      </li>
                      <li><a href="seguimiento.php"><i class="fa nav-icon fas fa-edit"></i> Seguimiento</a></li>

  <li><a href="fase.php"><i class="fa nav-icon fas fa-columns"></i> Fase</a></li>


                    


                  </li>
                </ul>
              </li>





            <li class="treeview">
              <a href="#">
                <svg width="1.4em" height="1em" viewBox="0 0 16 16" class="bi bi-file-earmark-text-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M2 2a2 2 0 0 1 2-2h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm7.5 1.5v-2l3 3h-2a1 1 0 0 1-1-1zM4.5 8a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7zM4 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5z"/>
                </svg>
              </i> <span>Reportes</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">

              <li><a href=""><i class="fa fa-line-chart"></i> Proyectos</a></li>
              <li><a href=""><i class="fa nav-icon far fa-image"></i> Usuarios</a></li>


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

        <div class="row">
          <div class="col-md-12">
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Aplicativo Web Laboratorio Software</h3>
                <div class="box-tools pull-right">
                  <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>


                </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
               <div class="row">
                <div class="col-md-12">
                  <!--Contenido-->
                  <div class="container">
                    <div class="row justify-content-center">
                      <div class="col-12">
                        <div class="card">
                          <div class="card-header bg-dark">
                            <h3 class="card-title text-center text-light">Fases</h3>
                          </div>
                          <div class="card-body">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                              Nuevo
                            </button>


                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                              <thead>
                                <tr>
                                  <th>Id</th>
                                  <th>Nombre</th>
                                  
                                  <th>Aciones</th>

                                </tr>
                              </thead>
                              <tbody>
                                <?php 
                                foreach($listaFases as $fase)
                                {
                                  ?>
                                  <tr>
                                    <td><?php echo $fase['idFase']; ?></td>
                                    
                                    <td><?php echo $fase['nombreFase']; ?></td>
                                    
                                    
                                    
                                    <td class="project-actions text-right">

                                      <a class="btn btn-info btn-sm" alt="Editar" title="Editar" data-toggle="modal" href="#modal-modificar<?php echo $fase['idFase']; ?>">
                                        <i class="fas fa-pencil-alt" >
                                        </i>

                                      </a>
                                      <a class="btn btn-danger btn-sm" alt="Eliminar" title="Eliminar" data-toggle="modal" href="#modal-eliminar<?php echo $fase['idFase']; ?>">
                                        <i class="fas fa-trash">
                                        </i>

                                      </a>
                                    </td>
                                  </tr>
                                  <div class="modal fade" id="modal-modificar<?php echo $fase['idFase']; ?>">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header bg-dark">
                                          <h4 class="modal-title text-center text-light">Actualizar</h4>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                          <form action="controladores/ControladorFase.php" method="POST">
                                            <div class="row">

                                              <div class="col-12">

                                                <input type="hidden" id="txtIdFaseM" name="txtIdFaseM" class="form-control" placeholder="IdFase"  value="<?php echo $fase['idFase']; ?>">

                                              </input>
                                            </div>
                                            
         

        




        <div class="col-12">
          <label  for="txtNombreFaseM"><strong>Nombre *</strong></label>
          <input type="text" id="txtNombreFaseM" name="txtNombreFaseM" placeholder="Nombre" class="form-control" required="true"  value="<?php echo $fase['nombreFase']; ?>">

        </input>

      </div>
      

                                    </div>




                                    <div class="modal-footer justify-content-between">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                      <input type="submit" class="btn btn-primary" name="btnModificarFase" value="Actualizar" />
                                    </div>
                                  </form>  
                                </div>
                              </div>
                              <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                          </div>
                          <div class="modal fade" id="modal-eliminar<?php echo $fase['idFase']; ?>">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header bg-dark">
                                  <h4 class="modal-title text-center text-light">Eliminar Fase</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <form action="controladores/ControladorFase.php" method="POST">
                                    <input type="hidden" name="txtIdFaseEliminar" class="form-control" placeholder="IdFase"  value="<?php echo $fase['idFase']; ?>"/>


                                    <p class="text-center">¿Esta seguro de eliminar la fase?</p>
                                    <h2 class="text-center"><?php echo $fase['nombreFase']; ?></h2>







                                    <div class="modal-footer justify-content-between">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                      <input type="submit" class="btn btn-danger" name="btnEliminarFase" value="Aceptar" />
                                    </div>
                                  </form>  
                                </div>
                              </div>
                              <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                          </div>
                          <?php

                        }
                        ?>


                      </tbody>

                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>







              </div>
            </div>
          </div>
        </div>

        <!--Fin Contenido-->
      </div>
    </div>

  </div>
  </div><!-- /.row -->
  </div><!-- /.box-body -->


  <div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-dark">
          <h4 class="modal-title text-center text-light">Registrar Fase</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="form1" action="controladores/ControladorFase.php"  enctype="multipart/form-data" method="POST" >
            <div class="row">
              <div class="col-12 text-md-right"><strong> * Campo requerido</strong> </div>
              
          

        <div class="col-12">
          <label  for="txtNombreFaseR"><strong>Nombre *</strong></label>
          <input type="text" id="txtNombreFaseR" name="txtNombreFaseR" placeholder="Nombre" class="form-control" required="true" >

        </input>

      </div>
      
    

  </div>


  <div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
    <input type="submit" class="btn btn-primary" name="btnRegistrarFase" value="Registrar"/> 
  </div>
  
  </form>  
  </div>
  </div>
  <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
  </div>
  <?php
  if (isset($_SESSION['mensaje'] )) {

   $mensaje =  $_SESSION['mensaje'] ;

   if($mensaje=="Registro Exitoso" || $mensaje=="Registro Actualizado" || $mensaje=="Registro Eliminado"){
     echo "<script> swal('Exito!', '$mensaje','success');</script>";
   }
   else{
    echo "<script> swal('Error!', '$mensaje','error');</script>";
  }
   unset($_SESSION['mensaje']);
  }


  ?>
  </section><!-- /.content -->
  </div><!-- /.content-wrapper -->
  <!--Fin-Contenido-->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b></b>        </div>
      <strong></a></strong> 
    </footer>
    
    <!-- jQuery -->
    <script src="resources/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="resources/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="resources/js/app.min.js"></script>
    <!-- DataTables -->
    <script src="resources/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="resources/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="resources/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="resources/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script>
      $(function () {
        $("#example1").DataTable({
          "responsive": true,
          "autoWidth": false,
          "language": {
            "lengthMenu": "Mostrar _MENU_ registros por página",
            "zeroRecords": "Sin registros",
            "info": "Mostrando la página _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            "search": "Buscar:",
            "paginate": {
              "first": "Primero",
              "last": "Ultimo",
              "next": "Siguiente",
              "previous": "Anterior"
            }

          }
        });
      });
    </script>

  </body>
  </html>