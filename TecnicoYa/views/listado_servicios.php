<table class="table table-striped">  
<thead>
	<tr>
		<th>Id</th>
		<th>Nombre</th>
		<th>Descripcion</th>
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
			echo		'<td>' . '<a href="#">Editar</a>' . '</td>';
			echo		'<td>' . '<a href="#">Eliminar</a>' . '</td>';
			echo	'</tr>';	
		}

	?>
	
</tbody>
</table>