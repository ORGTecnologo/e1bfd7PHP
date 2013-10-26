
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
