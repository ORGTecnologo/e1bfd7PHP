function getFormRegistroUsuario(usuario,nombre,contrasenia,apellido,mail){
        $.ajax({
                url: '/TecnicoYa/?rt=usuario/getFormRegistro',
                type: 'GET',
                contentType: "text/html",
        })
        .done(function(msg){
			console.log(msg);
			var wrapper = document.getElementById("contentWrapper");
			wrapper.innerHTML = "";
			wrapper.innerHTML = msg;
			
        })
        .fail(function(){
                console.log('Fallo al invocar!!');
        })
}
