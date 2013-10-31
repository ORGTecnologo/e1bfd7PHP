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
			operation		  : 'registrarUsuario'
		}),
		datatype: "json",
		contentType: "application/json",
	})
	.done(function(msg){
		console.log(msg);
	})
	.fail(function(msg){
		console.log(msg);
	})
}