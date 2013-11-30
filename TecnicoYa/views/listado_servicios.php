<div class="row-fluid">
	<div class="span12" aling="center">
		<p class="col-md-12" style="font-size: 25px;">Gestión de servicios</p>
		<p class="col-md-12"><a class="loadOnAdminWrapper pull-right" href="#" id="/e1bfd7PHP/TecnicoYa/?rt=admin/agregarServicio"><img width="40" height="40" class="span12" src="includes/img/agregarServicio.jpeg"></img></a></p>
	</div>
</div>
<div class="row-fluid">
<table class="table table-striped">
	<thead>
		<tr>
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
				echo		'<td>' . $valor[1] . '</td>';
				echo		'<td>' . $valor[2] . '</td>';
				echo		'<td>' . ($valor[3] == true ? 'Si' : 'No') . '</td>';
				echo		'<td>' . '<a class="loadOnAdminWrapper" href="/e1bfd7PHP/TecnicoYa/?rt=admin/editarServicio&id=' . $valor[0] . '&nombre=' . str_replace(" " , "+" , $valor[1]) . '&descripcion=' . str_replace(" " , "+" , $valor[2]) . '">Editar</a>' . '</td>';
				echo		'<td>' . '<a class="loadOnAdminWrapper" href="/e1bfd7PHP/TecnicoYa/?rt=admin/cambiarEstadoServicio&id=' . $valor[0] . '&nombre=' . str_replace(" " , "+" , $valor[1]) . '&descripcion=' . str_replace(" " , "+" , $valor[2]) . '">' . ($valor[3] == true ? 'Deshabilitar' : 'Habilitar') . '</a></td>';
				echo	'</tr>';
			}
		?>
		
	</tbody>
</table>
</div>