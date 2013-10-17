function selectButton(ev){
	console.log(ev.target.id);
	
	var inputBusqueda = document.getElementById("inputBusquedaPrincipal");
	if (ev.target.id == "btnSidebarServicios"){
		inputBusqueda.setAttribute("placeHolder" , "servicios...");
	} else if (ev.target.id == "btnSidebarZonas") {
		inputBusqueda.setAttribute("placeHolder" , "zonas...");
	} else if (ev.target.id == "btnSidebarTecnicos"){
		inputBusqueda.setAttribute("placeHolder" , "tecnicos...");
	}
	
}
