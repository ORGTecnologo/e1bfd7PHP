function getFormRegistroUsuario(){
	$.ajax({
			url: '/TecnicoYa/?rt=usuario/getFormRegistro',
			type: 'GET',
			contentType: "text/html",
	})
	.done(function(msg){
		var wrapper = document.getElementById("contentWrapper");
		wrapper.innerHTML = "";
		wrapper.innerHTML = msg;
		$('.selectpicker').selectpicker();
	})
	.fail(function(){
		console.log('Fallo al invocar!!');
	})
}

function getFormLogin(){
	$.ajax({
			url: '/TecnicoYa/?rt=usuario/getFormLogin',
			type: 'GET',
			contentType: "text/html",
	})
	.done(function(msg){
		var wrapper = document.getElementById("contentWrapper");
		wrapper.innerHTML = "";
		wrapper.innerHTML = msg;
		
	})
	.fail(function(){
		console.log('Fallo al invocar!!');
	})
}

function registrarUsuario(){
	
	var usuario = document.getElementById('campoUsuario');
	var contrasenia1 = document.getElementById('campoContrasenia1');
	var contrasenia2 = document.getElementById('campoContrasenia2');
	var nombre = document.getElementById('campoNombre');
	var apellido = document.getElementById('campoApellido');
	var fechaNacimiento = document.getElementById('campoFechaNacimiento');
	var tipo = document.getElementById("campoTipoUsuario");
	var op = "registrarUsuario";
	
	$.ajax({
			url: '/TecnicoYa/?rt=services',
			type: 'POST',
			contentType: "application/json",
			data:JSON.stringify({
				operation: op,
				usuario : usuario.value,
				contrasenia1 : contrasenia1.value,
				contrasenia2 : contrasenia2.value,
				nombre : nombre.value,
				apellido : apellido.value,
				fechaNacimiento : fechaNacimiento.value,
				tipo : tipo.value,
			}),
			datatype:"application/json",
	})
	.done(function(msg){
		alert(msg);		
	})
	.fail(function(){
		alert.log('Fallo al invocar!!');
	})
}
