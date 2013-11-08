<div class="row-fluid">
	<div class="span12" aling="center">
		<p class="col-md-8" style="font-size: 25px;">Alta, Baja y Modificacion Servicios</p>
		<p class="col-md-1"><a class="loadOnAdminWrapper" href="#" id="/e1bfd7PHP/TecnicoYa/?rt=admin/agregarServicio"><img class="span12" src="includes/img/agregarServicio.jpeg"></img></a></p>
	</div>
</div>
<div class="row-fluid">
<table class="table table-striped">
	<thead>
		<tr>
			<th>Id</th>
			<th>Nombre</th>
			<th>Descripcion</th>
			<th>Habilitado</th>
			<th></th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php
			$servicios = $lista_servicios;
			foreach ($servicios as &$valor) {
				echo 	'<tr>';
				echo		'<td>' . $valor[0] . '</td>';
				echo		'<td>' . $valor[1] . '</td>';
				echo		'<td>' . $valor[2] . '</td>';
				echo		'<td>' . ($valor[3] == true ? 'Si' : 'No') . '</td>';
				echo		'<td>' . '<a class="loadOnAdminWrapper" href="#" id="/e1bfd7PHP/TecnicoYa/?rt=admin/get_editarServicio&id=' . $valor[0] . '&nombre=' . str_replace(" " , "+" , $valor[1]) . '&descripcion=' . str_replace(" " , "+" , $valor[2]) . '">Editar</a>' . '</td>';
				echo		'<td>' . '<a id="eliminar_' . $valor[0] . '"class="deshabilitarServicioAction" href="#">Eliminar</a>' . '</td>';
				echo	'</tr>';
			}
		?>
		
	</tbody>
</table>
</div>