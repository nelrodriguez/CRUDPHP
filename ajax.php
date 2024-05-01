	<?php
	include 'modelo.dao/SeguimientoDao.php';
	include 'modelo.dao/FaseDao.php';
	require 'datos/Conexion.php';
	if(isset($_POST["idDepto"]))
	{
		$id = $_POST["idDepto"];
		$ciudadDao=new CiudadDao();
		$ciudadesdb = $ciudadDao->listarCiudadesDepto($id);


		foreach ($ciudadesdb as $key => $value) {
			echo '<option value="'.$value["idCiudad"].'">'.$value["nombre"].'</option>';
		}
	}

	else if(isset($_POST["idCiudad"]))
	{
		$id = $_POST["idCiudad"];
		$localidadDao=new LocalidadDao();
		$localidadesdb = $localidadDao->listarLocalidadCiudad($id);


		foreach ($localidadesdb as $key => $value) {
			echo '<option value="'.$value["idLocalidad"].'">'.$value["nombre"].'</option>';
		}
	}
	else if(isset($_POST["idProyecto"]))
	{
		$id = $_POST["idProyecto"];
		$seguimientoDao=new SeguimientoDao();
		$seguimientosdb = $seguimientoDao->obtenerSeguimientoIdProyecto($id);

 echo "<thead>
                                <tr>
                                  <th>Id</th>
                                  <th>Observaci&oacute;n</th>
                                  <th>Fase</th>
                                  <th>Fecha Inicio Fase</th>
                                  
                                  <th>Fecha Final Fase</th>
                                  <th>Avance</th>
                                  <th>Soporte</th>
                                  
                                  

                                  <th>Aciones</th>

                                </tr>
                              </thead>
                              <tbody>";
        foreach($seguimientosdb as $key => $value)
		{
		 echo "
			<tr>
			<td>".$value['idSeguimiento']."</td>
			<td>".$value['observacion']."</td>
			<td>".$value['idFase']."</td>
			<td>".$value['fechaInicioFase']."</td>
			<td>".$value['fechaFinFase']."</td>
			<td>".$value['porcentajeAvance']."</td>
			<td>".$value['archivoSoporte']."</td>


			<td class='project-actions text-right'>

			<a class='btn btn-info btn-sm' alt='Editar' title='Editar' data-toggle='modal' href='#modal-modificar".$value['idSeguimiento']."'>
			<i class='fas fa-pencil-alt' >
			</i>

			</a>
			<a class='btn btn-danger btn-sm' alt='Eliminar' title='Eliminar' data-toggle='modal' href='#modal-eliminar".$value['idSeguimiento']."'>
			<i class='fas fa-trash'>
			</i>

			</a>
			</td>
			</tr>
			<div class='modal fade' id='modal-modificar".$value['idSeguimiento']."'>
			<div class='modal-dialog'>
			<div class='modal-content'>
			<div class='modal-header bg-dark'>
			<h4 class='modal-title text-center text-light'>Actualizar</h4>
			<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
			<span aria-hidden='true'>&times;</span>
			</button>
			</div>
			<div class='modal-body'>
			<form action='controladores/ControladorSeguimiento.php' method='POST'>
			<div class='row'>

			<div class='col-12'>

			<input type='hidden' id='txtIdSeguimientoM' name='txtIdSeguimientoM' class='form-control' placeholder='IdSeguimiento'  value='".$value['idSeguimiento']."'>

			</input>
			</div>
			<div class='col-12'>
			<label for='txtObservacionM'><strong>Observaci&oacute;n </strong></label>

			<input type='text' id='txtObservacionM' name='txtObservacionM' class='form-control' placeholder='Observación' required minlength='3' maxlength='45' value='".$value['observacion']."'>

			</input>

			</div>
<div class='col-12'>
            <label  for='txtFechaInicioFaseM'><strong>Fecha Inicio Fase *</strong></label>
            <input type='date' id='txtFechaInicioFaseM' name='txtFechaInicioFaseM' class='form-control' required

   min='1940-01-01' max='".date('Y-m-d')." required pattern='[0-9]{4}-[0-9]{2}-[0-9]{2}' value='".$value['fechaInicioFase']."'>

          </input>
        </div>

        <div class='col-12'>
            <label  for='txtFechaFinFaseM'><strong>Fecha Inicio *</strong></label>
            <input type='date' id='txtFechaFinFaseM' name='txtFechaFinFaseM' class='form-control' required

   min='1940-01-01'  required pattern='[0-9]{4}-[0-9]{2}-[0-9]{2}' value='".$value['fechaFinFase']."'>

          </input>
        </div>

 <div class='col-12'>
            <label  for='txtAvanceM'><strong>Porcentaje Avance *</strong></label>
            <input type='text' id='txtAvanceM' name='txtAvanceM' class='form-control' required

     pattern='[0-9]+' maxlength='3' value='".$value['porcentajeAvance']."'>

          </input>
        </div>


        <div class='col-12'>
          <label  for='txtArchivoSoporteM'><strong>Soporte *</strong></label>
          <input type='text' id='txtArchivoSoporteM' name='txtArchivoSoporteM' placeholder='Soporte' class='form-control' required='true'  value='".$value['archivoSoporte']."'>

        </input>

      </div>
      
<div class='col-12'>
            <label for='txtIdFaseM'><strong>Fase </strong></label>
            <select id='txtIdFaseM' name='txtIdFaseM'  class='form-control' required='true'>
             <option value=''>Seleccione</option>";
             foreach($fases as $fase) {
             	echo "<option value='".$fase['idFase']."'";
             	if($value['idFase']==$fase['idFase']){
             		echo "selected='selected'>"; 
             		 } 
                 echo $entidad['nombreEntidad']."</option>";
              } 
                          echo "</select>
          </div>
			</div>
			<div class='modal-footer justify-content-between'>
			<button type='button' class='btn btn-default' data-dismiss='modal'>Cerrar</button>
			<input type='submit' class='btn btn-primary' name='btnModificarSeguimiento' value='Actualizar' />
			</div>
			</form>  
			</div>
			</div>
			<!-- /.modal-content -->
			</div>
			<!-- /.modal-dialog -->
			</div>
			<div class='modal fade' id='modal-eliminar".$value['idSeguimiento']."'>
			<div class='modal-dialog'>
			<div class='modal-content'>
			<div class='modal-header bg-dark'>
			<h4 class='modal-title text-center text-light'>Eliminar Proyecto</h4>
			<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
			<span aria-hidden='true'>&times;</span>
			</button>
			</div>
			<div class='modal-body'>
			<form action='controladores/ControladorSeguimiento.php' method='POST'>
			<input type='hidden' name='txtIdSeguimientoEliminar' class='form-control' placeholder='IdSeguimiento'  value='".$value['idSeguimiento']."'/>


			<p class='text-center'>¿Esta seguro de eliminar el proyecto?</p>
			<h2 class='text-center'>".$value['observacion']."</h2>







			<div class='modal-footer justify-content-between'>
			<button type='button' class='btn btn-default' data-dismiss='modal'>Cancelar</button>
			<input type='submit' class='btn btn-danger' name='btnEliminarSeguimiento' value='Aceptar' />
			</div>
			</form>  
			</div>
			</div>
			<!-- /.modal-content -->
			</div>
			<!-- /.modal-dialog -->
			</div>";
		}
		echo	"</tbody>";





		
	}