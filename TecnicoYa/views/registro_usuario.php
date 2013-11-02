<link rel="stylesheet" type="text/css" href="css/bootstrap.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/market.css" media="screen" />
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
		<a class="navbar-brand" href="#">Market Place Tecnologo</a>
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
					<li class="nav-header">Market Place</li>
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
			<li class="nav-header">Digital Chocolate</li>
			<li class="active"><a href="#">Inicio</a></li>
			<li><a href="#">Novedades</a></li>
			<li><a href="#">Top Ventas</a></li>
			<li><a href="#">Top Gratis</a></li>			
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Categorias<b class="caret"></b></a>
				<ul class="dropdown-menu pull-right">
					<li><a href="#">Deportes</a></li>
					<li><a href="#">Finanzas</a></li>
					<li><a href="#">Entretenimiento</a></li>
					<li><a href="#">Infantiles</a></li>
					<li><a href="#">Gastronomia</a></li>
				</ul>
			</li></li>
			<li class="nav-header">Opciones</li>
			<li><a href="#">Perfil</a></li>
			<li><a href="#">Mis aplicaciones</a></li>		
		</ul>
	</div>
</div>	
	<div class="container-fluid carouselInicio">
	    <div class="col-md-10">
			<div id="myCarousel" class="carousel">
				<div class="carousel-inner">
					<div class="active item"><img src="img/slide01.jpg"></img></div>
					<div class="item"><img src="img/slide02.jpg"></img></div>
					<div class="item"><img src="img/slide03.jpg"></img></div>
					<div class="item"><img src="img/slide04.jpg"></img></div>
					<div class="item"><img src="img/slide05.jpg"></img></div>
					<div class="item"><img src="img/slide06.jpg"></img></div>
				</div>
				<a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
				<a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
			</div>
	    </div>
	</div>

<!--
	<div class="col-md-12 carousel slide container carouselInicio" id="myCarousel" style="padding-top:47px;background-color: rgb(245, 245, 245);">
			<div class="carousel-inner">
				<div class="active item"><img src="img/slide01.jpg"></img></div>
				<div class="item"><img src="img/slide02.jpg"></img></div>
				<div class="item"><img src="img/slide03.jpg"></img></div>
				<div class="item"><img src="img/slide04.jpg"></img></div>
				<div class="item"><img src="img/slide05.jpg"></img></div>
				<div class="item"><img src="img/slide06.jpg"></img></div>
			</div>
			<a class="carousel-control left" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
			<a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
	</div>
-->
<div class="col-md-12" style="height:50px;"></div>
<!-- APPS APPS APPS APPS APPS APPS APPS APPS APPS APPS APPS APPS APPS -->	
	<div class="col-md-12 divContenidosInicial color1Inicio" style="background-image: url(img/appsProy.png);">
		<h2 class="col-md-12 pull-right styleTits" style="color:black; text-align: left;">Aplicaciones</h2>
	</div>
	<div class="col-md-12 separador"></div>
	<div class="row">
		<div id="aplicacion1"  class="col-sm-5 col-md-3">
			<div class="thumbnail">
				<img src="img/mu1.jpg" alt="img/mu1.jpg" class="img-circle">
				<div class="caption">
					<h3>Aplicacion 4</h3>
					<p>Laslasdkamskldn dkla sjdklasd aklsjdkl ajskldjaskl djklasjd</p>
					<p class="precio">
						<a href="#" class="btn btn-primary" role="button">Ver</a>
						<a href="#" class="btn btn-default" role="button">Comprar</a>	
						USD 2.0
					</p>
				</div>
			</div>
		</div>
	  
		<div id="aplicacion2"  class="col-sm-5 col-md-3">
			<div class="thumbnail">
				<img src="img/mu2.jpg" alt="img/mu2.jpg" class="img-circle">
				<div class="caption">
					<h3>Aplicacion 3</h3>
					<p>Descripcion</p>
					<p class="precio">
						<a href="#" class="btn btn-primary" role="button">Ver</a>
						<a href="#" class="btn btn-default" role="button">Comprar</a>	
						USD 2.0
					</p>
				</div>
			</div>
		</div>

		<div id="aplicacion3"  class="col-sm-5 col-md-3">
			<div class="thumbnail">
				<img src="img/mu3.jpg" alt="img/mu3.jpg" class="img-circle">
				<div class="caption">
					<h3>Aplicacion 2</h3>
					<p>Descripcion</p>
					<p class="precio">
						<a href="#" class="btn btn-primary" role="button">Ver</a>
						<a href="#" class="btn btn-default" role="button">Comprar</a>	
						USD 2.0
					</p>
				</div>
			</div>
		</div>	

		<div id="aplicacion4" class="col-sm-5 col-md-3">
			<div class="thumbnail">
				<img src="img/mu4.jpg" alt="img/mu4.jpg" class="img-circle">
				<div class="caption">
					<h3>Aplicacion 1</h3>
					<p>Descripcion</p>
					<p class="precio">
						<a href="#" class="btn btn-primary" role="button">Ver</a>
						<a href="#" class="btn btn-default" role="button">Comprar</a>	
						USD 2.0
					</p>
				</div>
			</div>
		</div>
	</div>

<!--	</div>	-->
<!-- APPS APPS APPS APPS APPS APPS APPS APPS APPS APPS APPS APPS APPS -->	
	<div class="col-md-12 separador"></div>
<!--LIBROS LIBROS LIBROS LIBROS  LIBROS  LIBROS  LIBROS  LIBROS -->	
	<div class="col-md-12 divContenidosInicial color2Inicio" style="background-image: url(img/olivier.jpg);">
		<h2 class="col-md-12 pull-right styleTits" style="color:white; text-align: right;">Libros</h2>
	</div>
	<div class="col-md-12 separador"></div>
	<div class="row">
		<div id="libro1"  class="col-sm-5 col-md-3">
			<div class="thumbnail">
				<img src="img/li1.jpg" alt="img/mu1.jpg" class="img-circle">
				<div class="caption">
					<h3>Libro 1</h3>
					<p>Laslasdkamskldn dkla sjdklasd aklsjdkl ajskldjaskl djklasjd</p>
					<p class="precio">
						<a href="#" class="btn btn-primary" role="button">Ver</a>
						<a href="#" class="btn btn-default" role="button">Comprar</a>	
						USD 2.0
					</p>
				</div>
			</div>
		</div>
		
		<div id="libro2"  class="col-sm-5 col-md-3">
			<div class="thumbnail">
				<img src="img/li2.jpg" alt="img/mu2.jpg" class="img-circle">
				<div class="caption">
					<h3>Libro 1</h3>
					<p>Laslasdkamskldn dkla sjdklasd aklsjdkl ajskldjaskl djklasjd</p>
					<p class="precio">
						<a href="#" class="btn btn-primary" role="button">Ver</a>
						<a href="#" class="btn btn-default" role="button">Comprar</a>	
						USD 2.0
					</p>
				</div>
			</div>
		</div>
		
		<div id="libro3"  class="col-sm-5 col-md-3">
			<div class="thumbnail">
				<img src="img/li3.jpg" alt="img/mu3.jpg" class="img-circle">
				<div class="caption">
					<h3>Libro 1</h3>
					<p>Laslasdkamskldn dkla sjdklasd aklsjdkl ajskldjaskl djklasjd</p>
					<p class="precio">
						<a href="#" class="btn btn-primary" role="button">Ver</a>
						<a href="#" class="btn btn-default" role="button">Comprar</a>	
						USD 2.0
					</p>
				</div>
			</div>
		</div>
		
		<div id="libro4"  class="col-sm-5 col-md-3">
			<div class="thumbnail">
				<img src="img/li4.png" alt="img/mu4.jpg" class="img-circle">
				<div class="caption">
					<h3>Libro 1</h3>
					<p>Laslasdkamskldn dkla sjdklasd aklsjdkl ajskldjaskl djklasjd</p>
					<p class="precio">
						<a href="#" class="btn btn-primary" role="button">Ver</a>
						<a href="#" class="btn btn-default" role="button">Comprar</a>
						USD 2.0
					</p>
				</div>
			</div>
		</div>

	</div>
<!--LIBROS LIBROS LIBROS LIBROS  LIBROS  LIBROS  LIBROS  LIBROS -->	
	<div class="col-md-12 separador"></div>
<!-- VIDEOS VIDEOS VIDEOS VIDEOS VIDEOS VIDEOS VIDEOS VIDEOS VIDEOS VIDEOS -->
		<div class="col-md-12 divContenidosInicial color1Inicio" style="background-image: url(img/candy.png);">
			<h2 class="col-md-12 pull-right styleTits" style="color:black; text-align: left;">Videos</h2>
		</div>
	<div class="col-md-12 separador"></div>
	<div class="row">
		<div id="video1"  class="col-sm-5 col-md-3">
			<div class="thumbnail">
				<img src="img/mu1.jpg" alt="img/mu1.jpg" class="img-circle">
				<div class="caption">
					<h2>Video 1</h2>
					<p>Laslasdkamskldn dkla sjdklasd aklsjdkl ajskldjaskl djklasjd</p>
					<p class="precio">
						<a href="#" class="btn btn-primary" role="button">Ver</a>
						<a href="#" class="btn btn-default" role="button">Comprar</a>	
						USD 2.0
					</p>
				</div>
			</div>
		</div>
		
		<div id="video2"  class="col-sm-5 col-md-3">
			<div class="thumbnail">
				<img src="img/mu1.jpg" alt="img/mu1.jpg" class="img-circle">
				<div class="caption">
					<h2>Video 2</h2>
					<p>Laslasdkamskldn dkla sjdklasd aklsjdkl ajskldjaskl djklasjd</p>
					<p class="precio">
						<a href="#" class="btn btn-primary" role="button">Ver</a>
						<a href="#" class="btn btn-default" role="button">Comprar</a>	
						USD 2.0
					</p>
				</div>
			</div>
		</div>
		
		<div id="video3"  class="col-sm-5 col-md-3">
			<div class="thumbnail">
				<img src="img/mu1.jpg" alt="img/mu1.jpg" class="img-circle">
				<div class="caption">
					<h2>Video 3</h2>
					<p>Laslasdkamskldn dkla sjdklasd aklsjdkl ajskldjaskl djklasjd</p>
					<p class="precio">
						<a href="#" class="btn btn-primary" role="button">Ver</a>
						<a href="#" class="btn btn-default" role="button">Comprar</a>	
						USD 2.0
					</p>
				</div>
			</div>
		</div>
		
		<div id="video4"  class="col-sm-5 col-md-3">
			<div class="thumbnail">
				<img src="img/mu1.jpg" alt="img/mu1.jpg" class="img-circle">
				<div class="caption">
					<h2>Video 4</h2>
					<p>Laslasdkamskldn dkla sjdklasd aklsjdkl ajskldjaskl djklasjd</p>
					<p class="precio">
						<a href="#" class="btn btn-primary" role="button">Ver</a>
						<a href="#" class="btn btn-default" role="button">Comprar</a>	
						USD 2.0
					</p>
				</div>
			</div>
		</div>
	</div>		
<!-- VIDEOS VIDEOS VIDEOS VIDEOS VIDEOS VIDEOS VIDEOS VIDEOS VIDEOS VIDEOS -->	
	<div class="col-md-12 separador"></div>
<!-- MUSICA MUSICA MUSICA MUSICA MUSICA MUSICA MUSICA MUSICA MUSICA MUSICA-->	
	<div class="col-md-12 divContenidosInicial color2Inicio" style="background-image: url(img/music.png);">
		<h2 class="col-md-12 pull-right styleTits" style="text-align: right;">Musica</h2>
	</div>
	<div class="col-md-12 separador"></div>
	<div class="row">
		<div id="musica1"  class="col-sm-5 col-md-3">
			<div class="thumbnail">
				<img src="img/mu1.jpg" alt="img/mu1.jpg" class="img-circle">
				<div class="caption">
					<h2>Musica 1</h2>
					<p>Laslasdkamskldn dkla sjdklasd aklsjdkl ajskldjaskl djklasjd</p>
					<p class="precio">
						<a href="#" class="btn btn-primary" role="button">Ver</a>
						<a href="#" class="btn btn-default" role="button">Comprar</a>	
						USD 2.0
					</p>
				</div>
			</div>
		</div>
		
		<div id="musica2"  class="col-sm-5 col-md-3">
			<div class="thumbnail">
				<img src="img/mu2.jpg" alt="img/mu2.jpg" class="img-circle">
				<div class="caption">
					<h2>Musica 2</h2>
					<p>Laslasdkamskldn dkla sjdklasd aklsjdkl ajskldjaskl djklasjd</p>
					<p class="precio">
						<a href="#" class="btn btn-primary" role="button">Ver</a>
						<a href="#" class="btn btn-default" role="button">Comprar</a>	
						USD 2.0
					</p>
				</div>
			</div>
		</div>
		
		<div id="musica3"  class="col-sm-5 col-md-3">
			<div class="thumbnail">
				<img src="img/mu3.jpg" alt="img/mu3.jpg" class="img-circle">
				<div class="caption">
					<h2>Musica 3</h2>
					<p>Laslasdkamskldn dkla sjdklasd aklsjdkl ajskldjaskl djklasjd</p>
					<p class="precio">
						<a href="#" class="btn btn-primary" role="button">Ver</a>
						<a href="#" class="btn btn-default" role="button">Comprar</a>	
						USD 2.0
					</p>
				</div>
			</div>
		</div>
		
		<div id="musica4"  class="col-sm-5 col-md-3">
			<div class="thumbnail">
				<img src="img/mu4.jpg" alt="img/mu4.jpg" class="img-circle">
				<div class="caption">
					<h2>Musica 4</h2>
					<p>Laslasdkamskldn dkla sjdklasd aklsjdkl ajskldjaskl djklasjd</p>
					<p class="precio">
						<a href="#" class="btn btn-primary" role="button">Ver</a>
						<a href="#" class="btn btn-default" role="button">Comprar</a>	
						USD 2.0
					</p>
				</div>
			</div>
		</div>
		
	</div>
<!-- MUSICA MUSICA MUSICA MUSICA MUSICA MUSICA MUSICA MUSICA MUSICA MUSICA-->		
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

<script src="js/jquery.min.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/holder.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/LlamadasAjax.js"></script>
<script src="js/main.js"></script>



<!--
<div class="row-fluid">
	<div class="span12"/>
</div>
<div class="row-fluid">
	<div class="span6">
		<div class="row-fluid">			
			<div class="span6 offset2"><h3><span class="label label-default">Datos de usuario</span></h3></div>
		</div>
		<div class="row-fluid">
			<div class="span6 offset2">
				Usuario
				<input id="campoUsuario" type="text" class="form-control" placeholder="">
			</div>
		</div>
		<div class="row-fluid">
			<div class="span6 offset2">
				Contraseña
				<input id="campoContrasenia1" type="password" class="form-control" placeholder="">
			</div>
		</div>
		<div class="row-fluid">
			<div class="span6 offset2">
				Confirmacion
				<input id="campoContrasenia2" type="password" class="form-control" placeholder="">
			</div>
		</div>
	</div>
	<div class="span6">
		<div class="row-fluid">
			<div class="span6 offset2"><h3><span class="label label-default">Datos personales</span></h3></div>
		</div>
		<div class="row-fluid">
			<div class="span6 offset2">
				Nombre
				<input id="campoNombre" type="text" class="form-control" placeholder="">
			</div>
		</div>
		<div class="row-fluid">
			<div class="span6 offset2">
				Apellido
				<input id="campoApellido" type="text" class="form-control" placeholder="">
			</div>
		</div>
		<div class="row-fluid">
			<div class="span6 offset2">
				Fecha de nacimiento
				<input id="campoFechaNacimiento" type="text" class="form-control span12" value="02-16-2012" id="dp1">
			</div>
		</div>
		<div class="row-fluid">
			<div class="span6 offset2">
				Soy un usuario
				<select id="campoTipoUsuario" class="selectpicker">
					<option>Tecnico</option>
					<option>Cliente</option>
				</select>
			</div>
		</div>
	</div>
</div>
<div class="row-fluid">
	<div class="span12"/>
</div>
<div class="row-fluid">
	<div class="span6 offset1">
		<button class="btn span6" onclick="registrarUsuario()">Enviar</button>
	</div>
</div>
-->