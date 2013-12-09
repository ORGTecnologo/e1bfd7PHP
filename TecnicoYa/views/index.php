<link rel="stylesheet" type="text/css" href="includes/css/bootstrap.css" media="screen" />
<link rel="stylesheet" type="text/css" href="includes/css/market.css" media="screen" />
<link rel="stylesheet" type="text/css" href="includes/css/jquery-ui.css" media="screen" />
<link rel="stylesheet" type="text/css" href="includes/css/alertify.core.css" media="screen" />
<link rel="stylesheet" type="text/css" href="includes/css/alertify.default.css" media="screen" />
<link rel="stylesheet" type="text/css" href="includes/css/datepicker.css" media="screen" />
<link rel="stylesheet" type="text/css" href="includes/css/tecnico-ya.css" media="screen" />
<link rel="stylesheet" type="text/css" href="includes/css/bootstrap-select.css" media="screen" />
<script src="includes/js/jquery.min.js"></script>
<script src="includes/js/LlamadasAjax.js"></script>
<body>
	<head>
		<meta charset="UTF-8">
		<title>Tecnico Ya!</title>
	</head>
	<div class="container">
	<nav class="navbar navbar-default " role="navigation">
		<!-- El logotipo y el icono que despliega el menú se agrupan
		para mostrarlos mejor en los dispositivos móviles -->
		<div class="row">
		<div class="col-md-2">
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
		</div>
		<!-- Agrupar los enlaces de navegación, los formularios y cualquier
		otro elemento que se pueda ocultar al minimizar la barra -->
		<div class="col-md-5">
		<input type="text" class="form-control" placeholder="Buscar">
		</div>
		<div class="col-md-1">
		<button class="btn btn-primary barraBusquedaHome" style="margin-top: initial;">
			<span class="glyphicon glyphicon-search">
			</span> 
			Buscar
		</button>
	</div>
			
			<div class="col-md-offset-1 col-md-3">                
				<?php
					if (!isset($_SESSION["autenticado"]) || !$_SESSION["autenticado"]){
						echo "<a href='/e1bfd7PHP/TecnicoYa/?rt=usuario/registroUsuario'><button class='btn btn-primary barraBusquedaHome'>Registrarme</button></a>";
						echo "<a href='/e1bfd7PHP/TecnicoYa/?rt=usuario/login'><button class='btn btn-primary barraBusquedaHome'>Login</button></a>";
					} else {
						$usr = $_SESSION["usuario"];

						echo '<div class="btn-group">';
						echo '  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">';
						echo    $usr[0] . ' <span class="caret"></span>';
					  	echo '	</button>';						 
						echo '  <ul class="dropdown-menu" role="menu">';
						echo '    <li><a href="#" onclick="ofrecerNuevoServicio()">Ofrecer servicio</a></li>';
						echo '    <li><a href="#" onclick="misServicios()">Mis servicios</a></li>';
						echo '    <li><a href="#">Ver mapa</a></li>';
						echo '    <li class="divider"></li>';
						echo '    <li><a href="#" onclick="logOff()">Salir</a></li>';
						echo '  </ul>';
						echo '</div>';
					}
				?>
			</div>
		</div>
	</nav>
	<div id="wrapperFrontEnd">


	</div>
	<?php
		if (isset($nextAccion)){
			if (strcmp($nextAccion, "mensaje_operacion") == 0){
				echo '<script>';
				echo 	'$("#wrapperFrontEnd").load("/e1bfd7PHP/TecnicoYa/?rt=index/mensajeOperacion&mensaje=' . str_replace(" " , "+" , $mensaje) . '&operacion=' . $operacion . '")';
				echo '</script>';
			}
		} else {
			echo '<script>listadoServiciosPublicados()</script>';
		}
	?>
</div>
</body>

<script src="includes/js/bootstrap-datepicker.js"></script>
<script src="includes/js/holder.js"></script>
<script src="includes/js/bootstrap.js"></script>
<script src="includes/js/main.js"></script>
<script src="includes/js/alertify.min.js"></script>
<script src="includes/js/objetos.js"></script>
<script src="includes/js/bootstrap-select.js"></script>
<script src="includes/js/tecnico-ya.js"></script>