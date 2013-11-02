
function getMapa(){
	$.ajax({
			url: '/TecnicoYa/?rt=zona/getMapa',
			type: 'GET',
			contentType: "text/html",
	})
	.done(function(msg){
		var wrapper = document.getElementById("contentWrapper");
		wrapper.innerHTML = "";
		wrapper.innerHTML = msg;
		initialize();
		
	})
	.fail(function(){
			console.log('Fallo al invocar!!');
	})
}
