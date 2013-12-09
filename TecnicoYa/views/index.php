<link rel="stylesheet" type="text/css" href="includes/css/bootstrap.css" media="screen" />
<link rel="stylesheet" type="text/css" href="includes/css/market.css" media="screen" />
<link rel="stylesheet" type="text/css" href="includes/css/jquery-ui.css" media="screen" />
<link rel="stylesheet" type="text/css" href="includes/css/alertify.core.css" media="screen" />
<link rel="stylesheet" type="text/css" href="includes/css/alertify.default.css" media="screen" />
<link rel="stylesheet" type="text/css" href="includes/css/datepicker.css" media="screen" />
<link rel="stylesheet" type="text/css" href="includes/css/tecnico-ya.css" media="screen" />
<link rel="stylesheet" type="text/css" href="includes/css/bootstrap-select.css" media="screen" />
<link rel="stylesheet" type="text/css" href="includes/css/themeProy.css" media="screen" />

<script src="includes/js/jquery.min.js"></script>
<script src="includes/js/LlamadasAjax.js"></script>
<body style="background-color: gainsboro;">
	<head>
    <title>Tecnico Ya!</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >
    <meta name="description" content="Bienvenidos al Tecnico Ya, donde ecnotraras todo lo que te imagines y mas.">
	</head>

<!-- BARRA DE NAVEGACION -->
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
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
  <div class="collapse navbar-collapse navbar-ex1-collapse"> 
    <ul class="navbar-form navbar-left" role="search">
		<div class="form-group col-xs-6">
			<input id="input-busqueda" type="search" class="form-control input-md" placeholder="Buscar" style="height: initial;min-width: 25em;">
		</div>
		<ul class="btn-group">
			<button onclick="" class="btn btn-primary" style="margin-top: initial;">
				<span class="glyphicon glyphicon-search"></span> Buscar</button>
		</ul>
	</ul>
    <ul class="nav navbar-nav navbar-right" id="Login-Registro-Div">
				<?php
					if (!isset($_SESSION["autenticado"]) || !$_SESSION["autenticado"]){
						echo "<a href='/e1bfd7PHP/TecnicoYa/?rt=usuario/registroUsuario'><button class='btn btn-primary barraBusquedaHome'>Registrarme</button></a>";
						echo "<a href='/e1bfd7PHP/TecnicoYa/?rt=usuario/login'><button class='btn btn-primary barraBusquedaHome'>Login</button></a>";
					} else {
						$usr = $_SESSION["usuario"];

						echo '<div class="btn-group">';
						echo '  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" style="margin-top: 0.5em;">';
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
	</ul>
	</div>
</nav>

	<div class="container" id="wrapperFrontEnd" style="margin-top:50px">


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
</body>

<script src="includes/js/bootstrap-datepicker.js"></script>
<script src="includes/js/holder.js"></script>
<script src="includes/js/bootstrap.js"></script>
<script src="includes/js/main.js"></script>
<script src="includes/js/alertify.min.js"></script>
<script src="includes/js/objetos.js"></script>
<script src="includes/js/bootstrap-select.js"></script>
<script src="includes/js/tecnico-ya.js"></script>
<script src="includes/js/bootstrap-select.min.js"></script>
