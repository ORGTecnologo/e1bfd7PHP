<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<link rel="stylesheet" type="text/css" href="includes/css/bootstrap.css" media="screen" />
<link rel="stylesheet" type="text/css" href="includes/css/bootstrap-responsive.css" media="screen" />
<link rel="stylesheet" type="text/css" href="includes/css/jquery-ui.css" media="screen" />
<link rel="stylesheet" type="text/css" href="includes/css/Admin_Home.css" media="screen" />
<link rel="stylesheet" type="text/css" href="includes/css/market.css" media="screen" />
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
			</div>
		</div>
	</div>
	<div class="col-md-12">
		<div class="col-md-2" style="margin-left: auto; background-color: rgb(230, 230, 230)">
			<ul class="nav nav-list">
				<li class="nav-header">Administracion</li>
				<li class="active"><a href="#">Inicio</a></li>
				<li><a href="#">Servicios</a></li>
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
					<div class="span3">
						<div class="item"><img class="span12" src="includes/img/servicios.jpg"></img></div>
					</div>
					<div class="span8" aling="center">
						<p class="col-md-8" style="font-size: 25px;">Alta, Baja y Modificacion Servicios</p>
						<p class="col-md-1" onclick="clickAltaServicio()"><img class="span12" src="includes/img/agregarServicio.jpeg"></img></p>
					</div>
		                <div class="span8" aling="center">
		                    <table class="table table-striped">  
		                        <thead>  
		                          <tr>    
		                            <th>Servicio</th>  
		                            <th>Descripcion</th>   
		                            <th></th>
		                            <th></th>
		                          </tr>  
		                        </thead>  
		                        <tbody>  
		                          <tr>  
		                            <td>Carpintero</td>  
		                            <td>Persona que hace o arregla muebles.</td>
		                            <td><a>modificar</a></td>
		                            <td><a>eliminar</a></td>
		                          </tr>  
		                          <tr>  
		                            <td>Electrisista</td>  
		                            <td>Se encarga de arreglar instalaciones electricas.</td>  
		                            <td><a>modificar</a></td>
		                            <td><a>eliminar</a></td>
		                          </tr>  
		                          <tr>  
		                            <td>Reparador Pc</td>  
		                            <td>Arregla computadoras.</td>  
		                            <td><a>modificar</a></td>
		                            <td><a>eliminar</a></td>
		                          </tr>  
		                        </tbody>  
		                    </table>
		                </div>
					</div>
		</div>
	</div>
	<!--
		<div id="footer" class="footer">
		    <div class="container">
		        <p class="muted credit">
		        	<div class="row-fluid">
						<center>
			            	<a>Tecnologo en Informática</a>
			              	-
			            	<a>Fing</a>
			              	-
			              	<a>UTU</a>
			              	-
		            		<a>Designed by Grupo 4</a>
		            	</center>
		            </div>
		        </p>
		    </div>
		</div>
	-->
	<div hidden id="div_altaServicio" class="modalChocolate modal pelo" style="overflow-y: auto;display: block;width: 26%;min-width: 300px;margin-right: auto;">
	  <div class="modal-header">
		    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="cerrarPanelLogin()">X</button>
		    <h3>Alta de Servicio</h3>
	  </div>
	  <div class="modal-body">
            <div class="row">
                <div class="col-md-12" style="margin-left: auto;margin-right: auto;">
                    <h4>Datos de Usuario</h4>
                    <p>Correo               <input type="text" class="col-md-12 form-control" id="loginCorreo"></p>
                    <p>Contrase&ntilde;a    <input type="password" class="col-md-12 form-control" id="loginPass"></p>
                </div>
            </div>
	  </div>
	  <div class="modal-footer">
	    <button type="button" data-dismiss="modal" class="btn" onclick="cerrarPanelLogin()">Cerrar</button>
	    <button type="button" class="btn btn-primary" onclick="IniciarSesion()">Confirmar</button>
	  </div>
	</div>

</body>

</html>
<script src="includes/js/jquery.min.js"></script>
<script src="includes/js/jquery-ui.js"></script>
<script src="includes/js/holder.js"></script>
<script src="includes/js/bootstrap.js"></script>
<script src="includes/js/LlamadasAjax.js"></script>
<script src="includes/js/main.js"></script>