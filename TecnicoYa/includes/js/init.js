
function updateComboDeptos(deptos){
	
	$("#cmbDeptosUpdLocs").empty();

	if (deptos !== undefined){
		for (i in deptos)
		{
		  	console.log("id=" + deptos[i][0] + ",nombre=" + deptos[i][1]);
		  	var op = document.createElement("option");
		  	op.setAttribute("value" , deptos[i][0]);
		  	var txt = document.createTextNode(deptos[i][1]);
		 	op.appendChild(txt);
			$("#cmbDeptosUpdLocs").append(op);
		}
	}
}


function updateComboFiltroTipoServicio(servs){
	
	$("#cmbFiltroTipoServicio").empty();

	console.log("Cargando todos");
	var op = document.createElement("option");
	op.setAttribute("value" , "todos");
	var txt = document.createTextNode("Todos los servicios");
	op.appendChild(txt);
	$("#cmbFiltroTipoServicio").append(op);

	if (servs !== undefined){
		for (i in servs)
		{
		  	console.log("id=" + servs[i][0] + ",nombre=" + servs[i][1]);
		  	var op = document.createElement("option");
		  	op.setAttribute("value" , servs[i][0]);
		  	var txt = document.createTextNode(servs[i][1]);
		 	op.appendChild(txt);
			$("#cmbFiltroTipoServicio").append(op);
		}
	}
}
