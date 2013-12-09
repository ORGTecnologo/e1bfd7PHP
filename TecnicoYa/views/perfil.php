<div class="container" id="wrapperFrontEnd" style="margin-top:50px">
<div class="container">
	<div class="col-md-12">

	</div>
	<div class="col-md-12">
		<form action="/e1bfd7PHP/TecnicoYa/" method="post">
			<div id="registroUsuario"style="overflow-y: auto;	display: block;margin-left: auto;margin-right: auto;background-color: beige;">
				<div class="modal-header">
					<h3>Registro de usuario</h3>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6">
							<h4>Datos de Usuario</h4>
							<input class="hidden" name="rt" value="usuario/registroUsuario">
							<p>Correo    			<input disabled value="<?php echo $usr[1] ?>" name="correoElectronico" maxlength="44" type="email" class="col-md-12 form-control" id="inputCorreo"></p>
							<p>Nombre Usuario  		<input disabled value="<?php echo $usr[0] ?>" name="usuario" maxlength="44" type="text" class="col-md-12 form-control" id="inputNick"></p>
							<p>Fecha de Nacimiento  <input disabled value="<?php echo $usr[9] ?>" name="fechaNacimiento" maxlength="44" type="text" class="col-md-12 form-control" id="inputFecha"></p>
							<p>Cedula     			<input disabled value="<?php echo $usr[3] ?>" name="ci" maxlength="14" type="tel" class="col-md-12 form-control" id="inputCi" onkeypress="return onlyNumbersDano(event)"></p>
						</div>
						<div class="col-md-6">
							<h4>Mas Datos</h4>
							<p>Nombres	 <input disabled value="<?php echo $usr[4] ?>" name="nombres" maxlength="100" type="text" class="col-md-12 form-control" id="inputNombre"></p>
							<p>Apellidos <input disabled value="<?php echo $usr[5] ?>" name="apellidos" maxlength="100" type="text" class="col-md-12 form-control" id="inputApellido"></p>
							<p>Sexo <input disabled value="<?php echo $usr[10] ?>" name="apellidos" maxlength="100" type="text" class="col-md-12 form-control" ></p>
							<p>Soy<input  disabled value="<?php echo $usr[2] ?>" name="apellidos" maxlength="100" type="text" class="col-md-12 form-control" ></p>							
							<p>Dirección 			<input disabled value="<?php echo $usr[7] ?>" name="direccion" maxlength="500" type="text" class="col-md-12 form-control" id="inputDireccion"></p>
							<p>Telefono Movil     	<input disabled value="<?php echo $usr[6] ?>" name="telefonoMovil" maxlength="9" type="tel" class="col-md-12 form-control" id="inputTel" onkeypress="return onlyNumbersDano(event)"></p>
						</div>
					</div>
				</div>
				<div class="errorDiv">
					<?php 
						if ( (isset($error)) && (!strcmp($error, "") == 0 ) ){
							echo $error;					
						}
					?>
				</div>
				<div class="modal-footer">
					<a href="/e1bfd7PHP/TecnicoYa/?rt=index/index"><button type="button" data-dismiss="modal" class="btn">Volver</button>
					<button type="submit" class="btn btn-primary">Confirmar</button>
				</div>
			</div>
		</form>
	</div>
	<script>
		$('#inputFecha').datepicker({
		    format: "dd-mm-yyyy"
		});
	</script>

	</div>