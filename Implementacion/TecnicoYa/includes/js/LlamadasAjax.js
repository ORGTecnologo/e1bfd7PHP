//Registro de Usuario
var ip = '/e1bfd7PHP/Implementacion/TecnicoYa/';

function registroUsuario(usuario,contrasenia,mail,nombre,apellido,sexo,nacimiento,cel,ci,direccion){
	$.ajax({
		url: ip + '/?rt=services',
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
			operation		  : 'registrarUsuario'
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
		url: ip + '/?rt=services',
		type: 'POST',
		data:JSON.stringify({
			nombres 	: nombre,
			descripcion : descripcion,
			operation	: 'altaServicio'
		}),
		datatype: "json",
		contentType: "application/json",
	})
	.done(function(msg){
		console.log('EXITO, SERVIDOR RESPONDE:  ' + msg);
		cerrarPanelAltaServicio();
	})
	.fail(function(msg){
		console.log('FALLO, SERVIDOR RESPONDE:  ' + msg);
		alert("Houston, tenemos un problema!!!");
	})
}