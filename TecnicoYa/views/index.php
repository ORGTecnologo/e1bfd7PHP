<link rel="stylesheet" type="text/css" href="includes/css/bootstrap.css" media="screen" />
<link rel="stylesheet" type="text/css" href="includes/css/market.css" media="screen" />
<link rel="stylesheet" type="text/css" href="includes/css/jquery-ui.css" media="screen" />
<link rel="stylesheet" type="text/css" href="includes/css/alertify.core.css" media="screen" />
<link rel="stylesheet" type="text/css" href="includes/css/alertify.default.css" media="screen" />
<link rel="stylesheet" type="text/css" href="includes/css/datepicker.css" media="screen" />
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