//Registro de Usuario
function registroUsuario(usuario,contrasenia,mail,nombre,apellido,sexo,nacimiento,cel,ci,direccion){
	$.ajax({
		url: '/?rt=services',
		type: 'POST',
		data:JSON.stringify({
			usuario           : usuario,
			contrasenia       : contrasenia,
			nombres           : nombre,
			apellidos   	  : apellido,
			sexo			  : sexo,
			fechaNacimiento   : nacimiento,
			telefonoMovil	  : cel,
			correoElectronico : mail,
			ci 				  : ci,
			direccion		  : direccion,
			operacion		  : 'registrarUsuario'
		}),
		datatype: "json",
		contentType: "application/json",
	})
	.done(function(msg){
		console.log('Guardado con exito!!');
		cerrarPanelRegistro();
	})
	.fail(function(){
		console.log('Fallo al guardar!!');
		alert("Houston, tenemos un problema!!!");
	})
}

function altaServicio(nombre,descripcion){
	$.ajax({
		url: '/?rt=services',
		type: 'POST',
		data:JSON.stringify({
			nombres 	: nombre,
			descripcion : descripcion,
			operacion	: 'altaServicio'
		}),
		datatype: "json",
		contentType: "application/json",
	})
	.done(function(msg){
		console.log('Guardado con exito!!');
		cerrarPanelAltaServicio();
	})
	.fail(function(){
		console.log('Fallo al guardar!!');
		alert("Houston, tenemos un problema!!!");
	})
}