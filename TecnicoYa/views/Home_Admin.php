<?php
?>
<link rel="stylesheet" type="text/css" href="includes/css/bootstrap.css" media="screen" />
<link rel="stylesheet" type="text/css" href="includes/css/bootstrap-responsive.css" media="screen" />
<link rel="stylesheet" type="text/css" href="includes/css/jquery-ui.css" media="screen" />
<link rel="stylesheet" type="text/css" href="includes/css/Admin_Home.css" media="screen" />
<link rel="stylesheet" type="text/css" href="includes/css/market.css" media="screen" />
<link rel="stylesheet" type="text/css" href="includes/css/alertify.core.css" media="screen" />
<link rel="stylesheet" type="text/css" href="includes/css/alertify.default.css" media="screen" />
<script src="includes/js/jquery.min.js"></script>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="ISO-8859-1">
		<title>Modulo Administrador</title>
	</head>
	<body>
		<div class="row-fluid">
			<div class="navbar-wrapper">
				<div class="container">
					<div class="navbar navbar-inverse">
						<div class="navbar-inner ">
							<center><h4 style="color: white; font-size: 26px; ">Modulo de Administrador</h4></center>
						</div>
						
					</div>
					<?php
							if (!isset($_SESSION["autenticado"]) || !$_SESSION["autenticado"]){
								echo '<button class="btn btn-primary barraBusquedaHome" href="#registroUsuario" onclick="clickRegistroUsuario()">Registrarse</button>';
										echo '<button class="btn btn-primary barraBusquedaHome" onclick="clickLogin()">Login</button>';
							} else {
								$usr = $_SESSION["usuario"];
								echo 'Hola ' . $usr[0] . '!(' . '<a href="/e1bfd7PHP/TecnicoYa/?rt=admin/logout">Salir</a>' . ')';
							}
					?>
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<div class="col-md-2" style="margin-left: auto; background-color: rgb(230, 230, 230)">
				<ul class="nav nav-list">
					<li class="nav-header">Administracion</li>
					<li class="active"><a href="#">Inicio</a></li>
					<li><a href="#" onclick="gestionServicios()">Servicios</a></li>
					<li><a href="#">Usuarios</a></li>
					<li><a href="#">Tecnicos</a></li>
					<li><a href="#">Barrios</a></li>
					<li><a href="#">Paises</a></li>
					<li><a href="#">Localidades</a></li>
				</ul>
			</div>
			<div class="col-md-10">
				<div class="container marketing" style="height: 75%">
					<div class="row-fluid">
						<div id="wrapperDivAdministracion" class="span8" aling="center">
							
						</div>
					</div>
				</div>
			</div>

			<div hidden id="div_altaServicio" class="modalChocolate modal pelo" style="overflow-y: auto;display: block;width: 26%;min-width: 300px;margin-right: auto;">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="cerrarPanelAltaServicio()">X</button>
					<h3>Alta de Servicio</h3>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12" style="margin-left: auto;margin-right: auto;">
							<h4>Datos de Usuario</h4>
							<p>Nombre del Servicio <input type="text" class="col-md-12 form-control" id="alta_serv_nombre"></p>
							<p>Descripcion   <textarea type="textarea" class="col-md-12 form-control" id="alta_serv_desc"></textarea></p>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" data-dismiss="modal" class="btn" onclick="cerrarPanelAltaServicio()">Cerrar</button>
					<button type="button" class="btn btn-primary" onclick="AltaServicio()">Confirmar</button>
				</div>
			</div>
			<?php
				if (isset($postAction)){
					if (strcmp($postAction , "viewServicios") == 0 ){
			echo '<script>$("#wrapperGrillasAdministracion").load("/e1bfd7PHP/TecnicoYa/?rt=admin/obtenerTodosServicios");</script>';
			}
			}
			?>
		</body>
	</html>
	<script src="includes/js/jquery-ui.js"></script>
	<script src="includes/js/holder.js"></script>
	<script src="includes/js/bootstrap.js"></script>
	<script src="includes/js/LlamadasAjax.js"></script>
	<script src="includes/js/main.js"></script>
	<script src="includes/js/alertify.min.js"></script>