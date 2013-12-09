
<input class="hidden" name="rt" value="usuario/bajaDeServicio">
<div class="row">	
	<h3>Información de servicio</h3>
	<div class="col-md-3" style="background-color: white;margin: 1em;">
		<div class="col-md-12 thumbnail img-thumbnail">
			<img class="img-thumbnail" style="height: 300px;width: 300px;" src="<?php echo $serv["ruta_imagen"] ?>">
		</div>
		<div class="col-md-12" style="margin: inherit;text-align: right;">
			<?php
				if (isset($_SESSION["usuario"]) && (strcmp($_SESSION["usuario"][2] , "usuario_cliente") == 0)){
		    	   echo '<button class="btn btn-primary" style="margin-right: 0.5em;" onclick="contratarServicio(' . '\'' . $serv["fk_tecnico"] . '\'' . ',' . $serv["id_servicio"]  . ',' . '\'' . $serv["nombres"] . '\'' . ')">Contratar</button>';
		    	}
			?>
			<a class="btn btn-info" href='/e1bfd7PHP/TecnicoYa/?rt=index/index'>Volver</a>
		</div>
	</div>
	<div class="col-md-5" style="margin-left: auto;margin-right: auto;">
		<p>Servicio             <input value="<?php echo $serv["nombre"] ?>" name="nombre" type="text" class="col-md-3 form-control"></p>
		<p>Técnico              <input value="<?php echo $serv["apellidos"] . ", " . $serv["nombres"] ?>" name="nombre" type="text" class="col-md-4 form-control"></p>
		<p>Descripción    		<input value="<?php echo $serv["descripcion"] ?>" name="descripcion" type="text" class="col-md-2 form-control"></p>
		<p>Precio    			<input value="<?php echo $serv["precio_servicio"] ?>" name="descripcion" type="text" class="col-md-5 form-control"></p>
		<p>Domicilio del técnico<input value="<?php echo $serv["direccion"] ?>" name="descripcion" type="text" class="col-md-6 form-control"></p>
		<p>Teléfono de contacto <input value="<?php echo $serv["celular"] ?>" name="descripcion" type="text" class="col-md-7 form-control"></p>
		<p>Correo electrónico   <input value="<?php echo $serv["fk_tecnico"] ?>" name="descripcion" type="text" class="col-md-8 form-control"></p>
	</div>
</div>