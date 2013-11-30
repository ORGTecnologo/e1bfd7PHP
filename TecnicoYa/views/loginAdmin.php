<html>
	<head>
		<meta charset="UTF-8">
		<title>Login administración</title>
	</head>
	<link rel="stylesheet" type="text/css" href="includes/css/bootstrap.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="includes/css/market.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="includes/css/jquery-ui.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="includes/css/alertify.core.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="includes/css/alertify.default.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="includes/css/adminStyles.css" media="screen" />
	<body>
		<div class="row-fluid">
			<div id="loginUsuarioAdministrador" class="span4 offset4">
				<form action="/e1bfd7PHP/TecnicoYa/" method="post">
					<input class="hidden" name="rt" value="admin/login">
					<div class="modal-header">
						<h3>Login de administrador</h3>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-md-12" style="margin-left: auto;margin-right: auto;">
								<h4>Datos de administrador</h4>
								<p>Correo               <input name="usuario" type="text" class="col-md-12 form-control" id="loginCorreo"></p>
								<p>Contrase&ntilde;a    <input name="contrasenia" type="password" class="col-md-12 form-control" id="loginPass"></p>
							</div>
							<div class="col-md-12" style="margin-left: auto;margin-right: auto;color:red;">
								<?php 
									if (isset($error))
										echo $error;
								?>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary">Confirmar</button>
					</div>
				</form>
			</div>
		</div>
	</body>
<script src="includes/js/jquery.min.js"></script>
<script src="includes/js/jquery-ui.js"></script>
<script src="includes/js/holder.js"></script>
<script src="includes/js/bootstrap.js"></script>
<script src="includes/js/LlamadasAjax.js"></script>
<script src="includes/js/main.js"></script>
<script src="includes/js/alertify.min.js"></script>

</html>