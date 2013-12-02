
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