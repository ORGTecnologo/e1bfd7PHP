function selectButton(ev){
	
	var inputBusqueda = document.getElementById("inputBusquedaPrincipal");
	if (ev.target.id == "btnSidebarServicios"){
		inputBusqueda.setAttribute("placeHolder" , "servicios...");
	} else if (ev.target.id == "btnSidebarZonas") {
		inputBusqueda.setAttribute("placeHolder" , "zonas...");
		getMapa();
	} else if (ev.target.id == "btnSidebarTecnicos"){
		inputBusqueda.setAttribute("placeHolder" , "tecnicos...");
	}
	
}

$('.selectpicker').selectpicker();

function validate(evt) {
  var theEvent = evt || window.event;
  var key = theEvent.keyCode || theEvent.which;
  key = String.fromCharCode( key );
  var regex = /[0-9]|\./;
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
}