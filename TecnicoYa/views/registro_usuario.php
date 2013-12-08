<link rel="stylesheet" type="text/css" href="includes/css/bootstrap.css" media="screen" />
<link rel="stylesheet" type="text/css" href="includes/css/market.css" media="screen" />
<link rel="stylesheet" type="text/css" href="includes/css/jquery-ui.css" media="screen" />
<link rel="stylesheet" type="text/css" href="includes/css/alertify.core.css" media="screen" />
<link rel="stylesheet" type="text/css" href="includes/css/alertify.default.css" media="screen" />
<link rel="stylesheet" type="text/css" href="includes/css/datepicker.css" media="screen" />
<link rel="stylesheet" type="text/css" href="includes/css/tecnico-ya.css" media="screen" />
<script src="includes/js/jquery.min.js"></script>
<body>
	<head>
		<meta charset="UTF-8">
		<title>Tecnico Ya!</title>
	</head>
	<div class="container">
	<nav class="navbar navbar-default " role="navigation">
		<!-- El logotipo y el icono que despliega el menú se agrupan
		para mostrarlos mejor en los dispositivos móviles -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse"
			data-target=".navbar-ex1-collapse">
			<span class="sr-only">Desplegar navegación</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/e1bfd7PHP/TecnicoYa/?rt=index/index">Tecnico Ya</a>
		</div>
		<!-- Agrupar los enlaces de navegación, los formularios y cualquier
		otro elemento que se pueda ocultar al minimizar la barra -->
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<form class="navbar-form navbar-left" role="search">
				<div class="form-group">
					<input type="search" class="form-control" placeholder="Buscar">
				</div>
				<button class="btn btn-primary barraBusquedaHome" style="margin-top: initial;">
				<span class="glyphicon glyphicon-search"></span> Buscar</button>
			</form>
			<div class="col-md-1">
				<a href="#" class="btn btn-primary barraBusquedaHome" role="button" data-toggle="dropdown">Opciones</a>
				<ul class="dropdown-menu col-md-3 ">
					<li class="nav-header">Tecnicos</li>
					<li class="active"><a href="#">Inicio</a></li>
					<li><a href="#">Novedades</a></li>
					<li><a href="#">Top Ventas</a></li>
					<li><a href="#">Top Gratis</a></li>
					<li class="divider"></li>
					<li class="nav-header">Opciones</li>
					<li><a href="#">Perfil</a></li>
					<li><a href="#">Mis aplicaciones</a></li>
				</ul>
			</div>
			
			<div class="col-md-4 pull-right">                
				<?php
					if (!isset($_SESSION["autenticado"]) || !$_SESSION["autenticado"]){
						echo "<a href='/e1bfd7PHP/TecnicoYa/?rt=usuario/registroUsuario'><button class='btn btn-primary barraBusquedaHome'>Registrarme</button></a>";
						echo "<a href='/e1bfd7PHP/TecnicoYa/?rt=usuario/login'><button class='btn btn-primary barraBusquedaHome'>Login</button></a>";
					} else {
						$usr = $_SESSION["usuario"];
						echo 'Hola ' . $usr[0] . '!(' . '<a href="/e1bfd7PHP/TecnicoYa/?rt=usuario/logout">Salir</a>' . ')';
					}
				?>
			</div>
		</div>
	</nav>
	<div id="wrapperFrontEnd">
<div class="container">
	<div class="col-md-12">

	</div>
	<div class="col-md-12">
		<form action="/e1bfd7PHP/TecnicoYa/" method="post">
			<div id="registroUsuario"style="overflow-y: auto;	display: block;margin-left: auto;margin-right: auto;">
				<div class="modal-header">
					<h3>Registro de usuario</h3>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6">
							<h4>Datos de Usuario</h4>
							<input class="hidden" name="rt" value="usuario/registroUsuario">
							<p>Correo    			<input name="correoElectronico" maxlength="44" type="email" class="col-md-12 form-control" id="inputCorreo"></p>
							<p>Contrase&ntilde;a    <input name="contrasenia" maxlength="44" type="password" class="col-md-12 form-control" id="inputPass"></p>
							<p>Nombre Usuario  		<input name="usuario" maxlength="44" type="text" class="col-md-12 form-control" id="inputNick"></p>
							<p>Fecha de Nacimiento  <input name="fechaNacimiento" maxlength="44" type="text" class="col-md-12 form-control" id="inputFecha"></p>
							<p>Cedula     			<input name="ci" maxlength="14" type="tel" class="col-md-12 form-control" id="inputCi" onkeypress="return onlyNumbersDano(event)"></p>
						</div>
						<div class="col-md-6">
							<h4>Mas Datos</h4>
							<p>Nombres	 <input name="nombres" maxlength="100" type="text" class="col-md-12 form-control" id="inputNombre"></p>
							<p>Apellidos <input name="apellidos" maxlength="100" type="text" class="col-md-12 form-control" id="inputApellido"></p>
							<p>Sexo
							<select name="sexo" id="inputSexo" class="col-md-12 form-control">
								<option value="masculino" selected>Hombre</option>
								<option value="femenino">Mujer</option>
							</select>
							</p>
							<p>Estoy aca para...
							<select name="tipoUsuario" id="inputSexo" class="col-md-12 form-control">
								<option value="usr_cliente" selected>Contratar servicios</option>
								<option value="usr_tecnico">Ofrecer servicios</option>
							</select>
							</p>
							<p>Direccion 			<input name="direccion" maxlength="500" type="text" class="col-md-12 form-control" id="inputDireccion"></p>
							<p>Telefono Movil     	<input name="telefonoMovil" maxlength="9" type="tel" class="col-md-12 form-control" id="inputTel" onkeypress="return onlyNumbersDano(event)"></p>
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
	<?php
		if (isset($nextAccion)){
			if (strcmp($nextAccion, "mensaje_operacion") == 0){
				echo '<script>';
				echo 	'$("#wrapperFrontEnd").load("/e1bfd7PHP/TecnicoYa/?rt=index/mensajeOperacion&mensaje=' . str_replace(" " , "+" , $mensaje) . '&operacion=' . $operacion . '")';
				echo '</script>';
			}
		}
	?>
</div>
</body>

<script src="includes/js/bootstrap-datepicker.js"></script>
<script src="includes/js/holder.js"></script>
<script src="includes/js/bootstrap.js"></script>
<script src="includes/js/LlamadasAjax.js"></script>
<script src="includes/js/main.js"></script>
<script src="includes/js/alertify.min.js"></script>
<script src="includes/js/objetos.js"></script>