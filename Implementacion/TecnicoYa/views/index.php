<link rel="stylesheet" type="text/css" href="includes/css/bootstrap.css" media="screen" />
<link rel="stylesheet" type="text/css" href="includes/css/bootstrap-responsive.css" media="screen" />
<link rel="stylesheet" type="text/css" href="includes/css/market.css" media="screen" />
<link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" media="screen" />

<body>
<nav class="navbarFija navbar navbar-default " style="position: fixed !important;width: 100%;" role="navigation">
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
		<a class="navbar-brand" href="#">Tecnico Ya</a>
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
		
		<div class="col-md-2 pull-right">			
			<button class="btn btn-primary barraBusquedaHome" href="#registroUsuario" onclick="clickRegistroUsuario()">Registrarse</button>
			<button class="btn btn-primary barraBusquedaHome" onclick="clickLogin()">Login</button>	
		</div>
	</div>
</nav>
<!--
-->

	<div class="col-md-2" style="margin-left: auto; background-color: rgb(245, 245, 245);">
		<ul class="nav nav-list">
			<li class="nav-header">Encontra el tecnico que buscas</li>
			<li class="active"><a href="#">--</a></li>
			<li><a href="#">--</a></li>
			<li><a href="#">--</a></li>
			<li><a href="#">--</a></li>			
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Categorias<b class="caret"></b></a>
				<ul class="dropdown-menu pull-right">
					<li><a href="#">Electricistas</a></li>
					<li><a href="#">Sanitarios</a></li>
					<li><a href="#">Tecnicos PC</a></li>
					<li><a href="#">Construccion</a></li>
					<li><a href="#">Jardineros</a></li>
				</ul>
			</li></li>
			<li class="nav-header">Opciones</li>
			<li><a href="#">Perfil</a></li>
			<li><a href="#">Mis aplicaciones</a></li>		
		</ul>
	</div>
</div>	
<!--
	<div class="container-fluid carouselInicio">
	    <div class="col-md-10">
			<div id="myCarousel" class="carousel">
				<div class="carousel-inner">
					<div class="active item"><img src="includes/img/slide01.jpg"></img></div>
					<div class="item"><img src="includes/img/slide02.jpg"></img></div>
					<div class="item"><img src="includes/img/slide03.jpg"></img></div>
					<div class="item"><img src="includes/img/slide04.jpg"></img></div>
					<div class="item"><img src="includes/img/slide05.jpg"></img></div>
					<div class="item"><img src="includes/img/slide06.jpg"></img></div>
				</div>
				<a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
				<a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
			</div>
	    </div>
	</div>


	<div class="col-md-12 carousel slide container carouselInicio" id="myCarousel" style="padding-top:47px;background-color: rgb(245, 245, 245);">
			<div class="carousel-inner">
				<div class="active item"><img src="includes/img/slide01.jpg"></img></div>
				<div class="item"><img src="includes/img/slide02.jpg"></img></div>
				<div class="item"><img src="includes/img/slide03.jpg"></img></div>
				<div class="item"><img src="includes/img/slide04.jpg"></img></div>
				<div class="item"><img src="includes/img/slide05.jpg"></img></div>
				<div class="item"><img src="includes/img/slide06.jpg"></img></div>
			</div>
			<a class="carousel-control left" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
			<a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
	</div>
-->
<div class="col-md-12" style="height:50px;"></div>
<!-- APPS APPS APPS APPS APPS APPS APPS APPS APPS APPS APPS APPS APPS -->	
	<div class="col-md-12 divContenidosInicial color1Inicio" style="background-image: url(includes/img/olivier.jpg);">
		<h2 class="col-md-12 pull-right styleTits" style="color:black; text-align: left;">Electricistas</h2>
	</div>
	<div class="col-md-12 separador"></div>
	<div class="row">
		<div id="aplicacion1"  class="col-sm-5 col-md-3">
			<div class="thumbnail">
				<img src="includes/img/el1.jpg" alt="includes/img/el1.jpg" class="img-circle">
				<div class="caption">
					<h3>Electricista 4</h3>
					<p>Laslasdkamskldn dkla sjdklasd aklsjdkl ajskldjaskl djklasjd</p>
					<p class="precio">
						<a href="#" class="btn btn-primary" role="button">Ver</a>
						<a href="#" class="btn btn-default" role="button">Contratar</a>	
						UYU 2.0
					</p>
				</div>
			</div>
		</div>
	  
		<div id="aplicacion2"  class="col-sm-5 col-md-3">
			<div class="thumbnail">
				<img src="includes/img/el2.jpeg" alt="includes/img/el2.jpeg" class="img-circle">
				<div class="caption">
					<h3>Electricista 3</h3>
					<p>Descripcion</p>
					<p class="precio">
						<a href="#" class="btn btn-primary" role="button">Ver</a>
						<a href="#" class="btn btn-default" role="button">Contratar</a>	
						UYU 2.0
					</p>
				</div>
			</div>
		</div>

		<div id="aplicacion3"  class="col-sm-5 col-md-3">
			<div class="thumbnail">
				<img src="includes/img/el3.jpg" alt="includes/img/el3.jpg" class="img-circle">
				<div class="caption">
					<h3>Electricista 2</h3>
					<p>Descripcion</p>
					<p class="precio">
						<a href="#" class="btn btn-primary" role="button">Ver</a>
						<a href="#" class="btn btn-default" role="button">Contratar</a>	
						UYU 2.0
					</p>
				</div>
			</div>
		</div>	

		<div id="aplicacion4" class="col-sm-5 col-md-3">
			<div class="thumbnail">
				<img src="includes/img/el4.jpg" alt="includes/img/el4.jpg" class="img-circle">
				<div class="caption">
					<h3>Electricista 1</h3>
					<p>Descripcion</p>
					<p class="precio">
						<a href="#" class="btn btn-primary" role="button">Ver</a>
						<a href="#" class="btn btn-default" role="button">Contratar</a>	
						UYU 2.0
					</p>
				</div>
			</div>
		</div>
	</div>

<!--	</div>	-->
<!-- APPS APPS APPS APPS APPS APPS APPS APPS APPS APPS APPS APPS APPS -->	
	<div class="col-md-12 separador"></div>
<!--Sanitario Sanitario Sanitario Sanitario  Sanitario  Sanitario  Sanitario  Sanitario -->	
	<div class="col-md-12 divContenidosInicial color2Inicio" style="background-image: url(includes/img/Infrastructure.jpg);">
		<h2 class="col-md-12 pull-right styleTits" style="color:white; text-align: right;">Sanitario</h2>
	</div>
	<div class="col-md-12 separador"></div>
	<div class="row">
		<div id="libro1"  class="col-sm-5 col-md-3">
			<div class="thumbnail">
				<img src="includes/img/san1.jpg" alt="includes/img/san1.jpg" class="img-circle">
				<div class="caption">
					<h3>Sanitario 1</h3>
					<p>Laslasdkamskldn dkla sjdklasd aklsjdkl ajskldjaskl djklasjd</p>
					<p class="precio">
						<a href="#" class="btn btn-primary" role="button">Ver</a>
						<a href="#" class="btn btn-default" role="button">Contratar</a>	
						UYU 2.0
					</p>
				</div>
			</div>
		</div>
		
		<div id="libro2"  class="col-sm-5 col-md-3">
			<div class="thumbnail">
				<img src="includes/img/san2.jpg" alt="includes/img/san2.jpg" class="img-circle">
				<div class="caption">
					<h3>Sanitario 1</h3>
					<p>Laslasdkamskldn dkla sjdklasd aklsjdkl ajskldjaskl djklasjd</p>
					<p class="precio">
						<a href="#" class="btn btn-primary" role="button">Ver</a>
						<a href="#" class="btn btn-default" role="button">Contratar</a>	
						UYU 2.0
					</p>
				</div>
			</div>
		</div>
		
		<div id="libro3"  class="col-sm-5 col-md-3">
			<div class="thumbnail">
				<img src="includes/img/san3.jpg" alt="includes/img/san3.jpg" class="img-circle">
				<div class="caption">
					<h3>Sanitario 1</h3>
					<p>Laslasdkamskldn dkla sjdklasd aklsjdkl ajskldjaskl djklasjd</p>
					<p class="precio">
						<a href="#" class="btn btn-primary" role="button">Ver</a>
						<a href="#" class="btn btn-default" role="button">Contratar</a>	
						UYU 2.0
					</p>
				</div>
			</div>
		</div>
		
		<div id="libro4"  class="col-sm-5 col-md-3">
			<div class="thumbnail">
				<img src="includes/img/san4.jpg" alt="includes/img/san4.jpg" class="img-circle">
				<div class="caption">
					<h3>Sanitario 1</h3>
					<p>Laslasdkamskldn dkla sjdklasd aklsjdkl ajskldjaskl djklasjd</p>
					<p class="precio">
						<a href="#" class="btn btn-primary" role="button">Ver</a>
						<a href="#" class="btn btn-default" role="button">Contratar</a>
						UYU 2.0
					</p>
				</div>
			</div>
		</div>

	</div>
<!--Sanitario Sanitario Sanitario Sanitario  Sanitario  Sanitario  Sanitario  Sanitario -->	
	<div class="col-md-12 separador"></div>
<!-- Tecnico PCS Tecnico PCS Tecnico PCS Tecnico PCS Tecnico PCS Tecnico PCS Tecnico PCS Tecnico PCS Tecnico PCS Tecnico PCS -->
		<div class="col-md-12 divContenidosInicial color1Inicio" style="background-image: url(includes/img/candy.png);">
			<h2 class="col-md-12 pull-right styleTits" style="color:black; text-align: left;">Tecnico PC</h2>
		</div>
	<div class="col-md-12 separador"></div>
	<div class="row">
		<div id="Tecnico PC1"  class="col-sm-5 col-md-3">
			<div class="thumbnail">
				<img src="includes/img/tpc4.jpg" alt="includes/img/tpc4.jpg" class="img-circle">
				<div class="caption">
					<h2>Tecnico PC 1</h2>
					<p>Laslasdkamskldn dkla sjdklasd aklsjdkl ajskldjaskl djklasjd</p>
					<p class="precio">
						<a href="#" class="btn btn-primary" role="button">Ver</a>
						<a href="#" class="btn btn-default" role="button">Contratar</a>	
						UYU 2.0
					</p>
				</div>
			</div>
		</div>
		
		<div id="Tecnico PC2"  class="col-sm-5 col-md-3">
			<div class="thumbnail">
				<img src="includes/img/tpc1.jpg" alt="includes/img/tpc1.jpg" class="img-circle">
				<div class="caption">
					<h2>Tecnico PC 2</h2>
					<p>Laslasdkamskldn dkla sjdklasd aklsjdkl ajskldjaskl djklasjd</p>
					<p class="precio">
						<a href="#" class="btn btn-primary" role="button">Ver</a>
						<a href="#" class="btn btn-default" role="button">Contratar</a>	
						UYU 2.0
					</p>
				</div>
			</div>
		</div>
		
		<div id="Tecnico PC3"  class="col-sm-5 col-md-3">
			<div class="thumbnail">
				<img src="includes/img/tpc2.jpg" alt="includes/img/tpc2.jpg" class="img-circle">
				<div class="caption">
					<h2>Tecnico PC 3</h2>
					<p>Laslasdkamskldn dkla sjdklasd aklsjdkl ajskldjaskl djklasjd</p>
					<p class="precio">
						<a href="#" class="btn btn-primary" role="button">Ver</a>
						<a href="#" class="btn btn-default" role="button">Contratar</a>	
						UYU 2.0
					</p>
				</div>
			</div>
		</div>
		
		<div id="Tecnico PC4"  class="col-sm-5 col-md-3">
			<div class="thumbnail">
				<img src="includes/img/tpc3.jpg" alt="includes/img/tpc3.jpg" class="img-circle">
				<div class="caption">
					<h2>Tecnico PC 4</h2>
					<p>Laslasdkamskldn dkla sjdklasd aklsjdkl ajskldjaskl djklasjd</p>
					<p class="precio">
						<a href="#" class="btn btn-primary" role="button">Ver</a>
						<a href="#" class="btn btn-default" role="button">Contratar</a>	
						UYU 2.0
					</p>
				</div>
			</div>
		</div>
	</div>		
<!-- Tecnico PCS Tecnico PCS Tecnico PCS Tecnico PCS Tecnico PCS Tecnico PCS Tecnico PCS Tecnico PCS Tecnico PCS Tecnico PCS -->	
	<div class="col-md-12 separador"></div>
<!-- Jardinero Jardinero Jardinero Jardinero Jardinero Jardinero Jardinero Jardinero Jardinero Jardinero-->	
	<div class="col-md-12 divContenidosInicial color2Inicio" style="background-image: url(includes/img/music.png);">
		<h2 class="col-md-12 pull-right styleTits" style="text-align: right;">Jardinero</h2>
	</div>
	<div class="col-md-12 separador"></div>
	<div class="row">
		<div id="Jardinero1"  class="col-sm-5 col-md-3">
			<div class="thumbnail">
				<img src="includes/img/ja1.jpg" alt="includes/img/ja1.jpg" class="img-circle">
				<div class="caption">
					<h2>Jardinero 1</h2>
					<p>Laslasdkamskldn dkla sjdklasd aklsjdkl ajskldjaskl djklasjd</p>
					<p class="precio">
						<a href="#" class="btn btn-primary" role="button">Ver</a>
						<a href="#" class="btn btn-default" role="button">Contratar</a>	
						UYU 2.0
					</p>
				</div>
			</div>
		</div>
		
		<div id="Jardinero2"  class="col-sm-5 col-md-3">
			<div class="thumbnail">
				<img src="includes/img/ja2.jpg" alt="includes/img/ja2.jpg" class="img-circle">
				<div class="caption">
					<h2>Jardinero 2</h2>
					<p>Laslasdkamskldn dkla sjdklasd aklsjdkl ajskldjaskl djklasjd</p>
					<p class="precio">
						<a href="#" class="btn btn-primary" role="button">Ver</a>
						<a href="#" class="btn btn-default" role="button">Contratar</a>	
						UYU 2.0
					</p>
				</div>
			</div>
		</div>
		
		<div id="Jardinero3"  class="col-sm-5 col-md-3">
			<div class="thumbnail">
				<img src="includes/img/ja3.jpg" alt="includes/img/ja3.jpg" class="img-circle">
				<div class="caption">
					<h2>Jardinero 3</h2>
					<p>Laslasdkamskldn dkla sjdklasd aklsjdkl ajskldjaskl djklasjd</p>
					<p class="precio">
						<a href="#" class="btn btn-primary" role="button">Ver</a>
						<a href="#" class="btn btn-default" role="button">Contratar</a>	
						UYU 2.0
					</p>
				</div>
			</div>
		</div>
		
		<div id="Jardinero4"  class="col-sm-5 col-md-3">
			<div class="thumbnail">
				<img src="includes/img/ja4.jpg" alt="includes/img/ja4.jpg" class="img-circle">
				<div class="caption">
					<h2>Jardinero 4</h2>
					<p>Laslasdkamskldn dkla sjdklasd aklsjdkl ajskldjaskl djklasjd</p>
					<p class="precio">
						<a href="#" class="btn btn-primary" role="button">Ver</a>
						<a href="#" class="btn btn-default" role="button">Contratar</a>	
						UYU 2.0
					</p>
				</div>
			</div>
		</div>
		
	</div>
<!-- Jardinero Jardinero Jardinero Jardinero Jardinero Jardinero Jardinero Jardinero Jardinero Jardinero-->		
	<div class="col-md-12 separador"></div>
	
	<div id="loginUsuario" class="modalChocolate modal" hidden>
	  <div class="modal-header">
	    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="cerrarPanelLogin()">X</button>
	    <h3>Iniciar Sesion</h3>
	  </div>
	  <div class="modal-body">
	    <div class="row">
	      <div class="col-md-12">
			<h4>Datos de Usuario</h4>
			<p>Correo    			<input type="text" class="col-md-12 form-control" id="loginCorreo"></p>
			<p>Contrase&ntilde;a    <input type="password" class="col-md-12 form-control" id="loginPass"></p>
	      </div>
	    </div>
	  </div>
	  <div class="modal-footer">
	    <button type="button" data-dismiss="modal" class="btn" onclick="cerrarPanelLogin()">Cerrar</button>
	    <button type="button" class="btn btn-primary" onclick="IniciarSesion()">Confirmar</button>
	  </div>
	</div>

	<div id="registroUsuario" class="modalChocolate modal" hidden>
	  <div class="modal-header">
	    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="cerrarPanelRegistro()">X</button>
	    <h3>Registro de Usuario</h3>
	  </div>
	  <div class="modal-body">
			<div class="rowo">
				<div class="col-md-6">
					<h4>Datos de Usuario</h4>
					<p>Correo    			<input type="email" class="col-md-12 form-control" id="inputCorreo"></p>
					<p>Contrase&ntilde;a    <input type="password" class="col-md-12 form-control" id="inputPass"></p>
					<p>Nombre Usuario  		<input type="text" class="col-md-12 form-control" id="inputNick"></p>     
				</div>
				<div class="col-md-6">
					<h4>Datos Personales</h4>
					<p>Nombres	    		<input type="text" class="col-md-12 form-control" id="inputNombre"></p>
					<p>Apellidos    		<input type="text" class="col-md-12 form-control" id="inputApellido"></p>
					<p>Sexo 
						<select id="inputSexo" class="col-md-12 form-control">
							<option value="masculino" selected>Hombre</option>
							<option value="femenino">Mujer</option>
						</select>
					</p>					
					<p>Fecha de Nacimiento  <input type="text" class="col-md-12 form-control" id="inputFecha"></p>
					<p>Telefono Movil    	<input type="tel" class="col-md-12 form-control" id="inputTel" onkeypress="return onlyNumbersDano(event)"></p>
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" data-dismiss="modal" class="btn" onclick="cerrarPanelRegistro()">Cerrar</button>
			<button type="button" class="btn btn-primary" onclick="crearUsuario()">Confirmar</button>
		</div>
	</div>
	
</body>

<script src="includes/js/jquery.min.js"></script>
<script src="includes/http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script src="includes/js/jquery-ui.js"></script>
<script src="includes/js/holder.js"></script>
<script src="includes/js/bootstrap.js"></script>
<script src="includes/js/LlamadasAjax.js"></script>
<script src="includes/js/main.js"></script>


<!--
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="includes/css/tecnico-ya.css">
		<link rel="stylesheet" href="includes/css/bootstrap.min.css">
		<link rel="stylesheet" href="includes/css/bootstrap-responsive.css">
		<link rel="stylesheet" href="includes/css/bootstrap-select.min.css">
		<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
		<script src="includes/js/google-maps.js"></script>
	<body id="body">
		<div class="container">
			<nav class="navbar navbar-default" role="navigation">
			  <div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				  <span class="sr-only">Toggle navigation</span>
				  <span class="icon-bar"></span>
				  <span class="icon-bar"></span>
				  <span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="/TecnicoYa/?rt=index">TecnicoYa!</a>
			  </div>

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
					<li><a href="#" onclick="getFormLogin()">Ingresar</a></li>
				</ul>
			  </div>
			</nav>
		</div>
		<div class="container">
			<div class="container-fluid">
			  <div class="row-fluid">
				<div class="span2">
					<ul class="nav nav-pills nav-stacked">
					  <li><a id="btnSidebarServicios" href="#" onclick="selectButton(event)">Servicios</a></li>
					  <li><a id="btnSidebarZonas" href="#" onclick="selectButton(event)">Zonas</a></li>
					  <li><a id="btnSidebarTecnicos" href="#" onclick="selectButton(event)">Tecnicos</a></li>
					</ul>
					<input type="text" class="form-control" placeholder="Usuario...">
					<input type="password" class="form-control" placeholder="Contrasenia...">
					<button class="btn" >ingresar</button>
				</div>
				<div id="contentWrapper" class="span10">
				</div>
			  </div>
			</div>
		</div>
		<div id="map_canvas" style="width:100%; height:100%" >
		</div>
	</body>	
</html>
<script src="includes/js/jquery.min.js"></script>
<script src="includes/js/bootstrap.min.js"></script>
<script src="includes/js/bootstrap-select.min.js"></script>
<script src="includes/js/tecnico-ya.js"></script>
<script src="includes/js/ajax-calls-usuario.js"></script>
<script src="includes/js/ajax-calls-zona.js"></script>
-->


