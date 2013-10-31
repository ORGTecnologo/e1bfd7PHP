<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<link rel="stylesheet" type="text/css" href="../includes/css/bootstrap.css" media="screen" />
<link rel="stylesheet" type="text/css" href="../includes/css/bootstrap-responsive.css" media="screen" />
<link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" media="screen" />
<link rel="stylesheet" type="text/css" href="../includes/css/Admin_Home.css" media="screen" />
<!DOCTYPE html>
<html>

<script type="text/javascript">
!function ($) {
  $(function(){
    // carousel demo
    $('#myCarousel').carousel()
  })
}(window.jQuery)

</script>



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
	<div class="container marketing" style="height: 75%">
		<div class="row-fluid">
			<div class="span3">
				<div class="item"><img class="span12" src="../includes/img/servicios.jpg"></img></div>
			</div>
			<div class="span8" aling="center">
				<p style="font-size: 25px;">Alta, Baja y Modificacion Servicios</p>
			</div>
                    <div class="span1"><a href="http://localhost/Implementacion/TecnicoYa/views/AgregarServicio.php"><img class="span12" src="../includes/img/agregarServicio.jpeg"></img></a></div>
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
		<div class="row-fluid">
		</div>
	
	</div>
	<div id="footer">
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
</body>

</html>
<script src="../includes/js/jquery.min.js"></script>
<script src="../includes/http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script src="../includes/js/jquery-ui.js"></script>
<script src="../includes/js/holder.js"></script>
<script src="../includes/js/bootstrap.js"></script>
<script src="../includes/js/LlamadasAjax.js"></script>
<script src="../includes/js/main.js"></script>

