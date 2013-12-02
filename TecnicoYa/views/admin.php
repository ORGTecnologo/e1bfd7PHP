<?php
?>
<link rel="stylesheet" type="text/css" href="includes/css/bootstrap.css" media="screen" />
<link rel="stylesheet" type="text/css" href="includes/css/jquery-ui.css" media="screen" />
<link rel="stylesheet" type="text/css" href="includes/css/adminStyles.css" media="screen" />
<link rel="stylesheet" type="text/css" href="includes/css/market.css" media="screen" />
<link rel="stylesheet" type="text/css" href="includes/css/alertify.core.css" media="screen" />
<link rel="stylesheet" type="text/css" href="includes/css/alertify.default.css" media="screen" />
<link rel="stylesheet" type="text/css" href="includes/css/bootstrap-select.css" media="screen" />

<script src="includes/js/jquery.min.js"></script>
<script src="includes/js/init.js"></script>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Administración</title>
	</head>
	<body>
		<div class="container">
		<div class="row">
			<div class="navbar-wrapper">
				<div class="container">
					<div class="navbar navbar-inverse">
						<div class="navbar-inner ">
							<center><h4 style="color: white; font-size: 26px; ">Modulo de Administrador</h4></center>
						</div>
						
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-2">
				<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu" style="display: block; position: static; margin-bottom: 5px; *width: 180px;padding-left: 15px;padding-right: 15px;">
		  			<li style="text-align: center;"><h3>Administración</h3></li>
		  			<li role="presentation" class="divider"></li>
					<li role="presentation">
				  		<div style="text-align:center;"><?php echo $_SESSION["usuario"][0] ?></div>
				  	</li>
		  			<li role="presentation" class="divider"></li>
		  			<li role="presentation">
				  		<a role="menuitem" tabindex="-1" href="/e1bfd7PHP/TecnicoYa/index.html" target="_blank">Página de inicio</a>
				  	</li>
		  			<li role="presentation" class="divider"></li>
		  			<li role="presentation">
				  		<a role="menuitem" tabindex="-1" href="#" onclick="gestionServicios()">Servicios</a>
				  	</li>
				  	<li role="presentation">
				  		<a role="menuitem" tabindex="-1" href="#" onclick="gestionPaises()">Países</a>
				  	</li>
				  	<li role="presentation">
				  		<a role="menuitem" tabindex="-1" href="#" onclick="gestionDepartamentos()">Departamentos</a>
				  	</li>
				  	<li role="presentation">
				  		<a role="menuitem" tabindex="-1" href="#" onclick="gestionLocalidades()">Localidades</a>
				  	</li>
				  	<li role="presentation">
				  		<a role="menuitem" tabindex="-1" href="#">Barrios</a>
				  	</li>
				  	<li role="presentation">
				  		<a role="menuitem" tabindex="-1" href="#">Usuarios</a>
				  	</li>
				  	<!--
					<li class="dropdown-submenu">
		    			<a tabindex="-1" href="#">Auditoría</a>
		    				<ul class="dropdown-menu">
		      					<li><a tabindex="-1" href="/SERVER-MODULE-PRESENTATION/admin/partialAuditoria.xhtml">Registro de accesos</a></li>
		    				</ul>
	  				</li>
					-->
		  			<li role="presentation" class="divider"></li>
			  		<li role="presentation">
				  		<a role="menuitem" tabindex="-1" href="/e1bfd7PHP/TecnicoYa/?rt=admin/logout">Salir del sistema</a>
				  	</li>
				</ul>  
			</div>
			<div class="col-md-10">
				<div class="container marketing" style="height: 75%">
					<div class="row-fluid">
						<div id="wrapperDivAdministracion" aling="center">
							
						</div>
					</div>
				</div>
			</div>
			</div>
		</body>
	</html>
	<script src="includes/js/jquery-ui.js"></script>
	<script src="includes/js/holder.js"></script>
	<script src="includes/js/bootstrap.js"></script>
	<script src="includes/js/LlamadasAjax.js"></script>
	<script src="includes/js/main.js"></script>
	<script src="includes/js/alertify.min.js"></script>
	<script src="includes/js/bootstrap-select.js"></script>

	<?php
		if (isset($nextAccion)){
			if (strcmp($nextAccion, "mensaje_operacion") == 0){
				echo '<script>';
				echo 	'$("#wrapperDivAdministracion").load("/e1bfd7PHP/TecnicoYa/?rt=index/mensajeOperacion&mensaje=' . str_replace(" " , "+" , $mensaje) . '&operacion=' . $operacion . '")';
				echo '</script>';
			}
		}
	?>