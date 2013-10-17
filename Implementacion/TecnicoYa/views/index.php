<html>
	<head>
		<link rel="stylesheet" href="includes/css/tecnico-ya.css">
		<link rel="stylesheet" href="includes/css/bootstrap.min.css">
		<link rel="stylesheet" href="includes/css/bootstrap-responsive.css">
	</head>
	<body id="body">
		<div class="container">
			<nav class="navbar navbar-default" role="navigation">
			  <!-- Brand and toggle get grouped for better mobile display -->
			  <div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				  <span class="sr-only">Toggle navigation</span>
				  <span class="icon-bar"></span>
				  <span class="icon-bar"></span>
				  <span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">TecnicoYa!</a>
			  </div>

			  <!-- Collect the nav links, forms, and other content for toggling -->
			  <div class="collapse navbar-collapse navbar-ex1-collapse offset2">			
				<div class="col-lg-8">
					<form class="navbar-form navbar-left" role="search">
						<div class="input-group">
							<span class="input-group-btn">
								<button class="btn btn-default" type="button">Buscar</button>
							</span>
							<input id="inputBusquedaPrincipal" type="text" class="form-control" placeHolder=" servicios o zonas...">
						</div>	
						</form>			  
				</div>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#" onclick="getFormRegistroUsuario()">Registrarme</a></li>
					<li><a href="#">Ingresar</a></li>
				</ul>
			  </div><!-- /.navbar-collapse -->
			</nav>
		</div>
		<div class="container">
			<div class="container-fluid">
			  <div class="row-fluid">
				<div class="span2">
					<!--Sidebar content-->
					<ul class="nav nav-pills nav-stacked">
					  <li><a id="btnSidebarServicios" href="#" onclick="selectButton(event)">Servicios</a></li>
					  <li><a id="btnSidebarZonas" href="#" onclick="selectButton(event)">Zonas</a></li>
					  <li><a id="btnSidebarTecnicos" href="#" onclick="selectButton(event)">Tecnicos</a></li>
					</ul>
				</div>
				<div id="contentWrapper" class="span10">
				  <!--Body content-->
				</div>
			  </div>
			</div>
		</div>
	</body>	
</html>

<script src="includes/js/jquery.min.js"></script>
<script src="includes/js/bootstrap.min.js"></script>
<script src="includes/js/tecnico-ya.js"></script>
<script src="includes/js/ajax-calls.js"></script>
