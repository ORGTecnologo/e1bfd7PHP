<div class="row-fluid">
	<div class="span12" aling="center">
		<p class="col-md-12" style="font-size: 25px;">Gestión de localidades</p>
		<p class="col-md-12">
			<a class="loadOnAdminWrapper pull-right" href="/e1bfd7PHP/TecnicoYa/?rt=admin/agregarLocalidad">
				<img width="40" height="40" class="span12" src="includes/img/agregarServicio.jpeg">
				</img>
			</a>
		</p>
	</div>
</div>
<div class="row-fluid">
<table class="table table-striped">
	<thead>
		<tr>
			<th>Nombre</th>
			<th>Departamento</th>
			<th>País</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php
			//var_dump($lista_localidades);
			foreach ($lista_localidades as &$valor) {
				echo 	'<tr>';
				echo		'<td>' . $valor[1] . '</td>';
				echo		'<td>' . $valor[3] . '</td>';
				echo		'<td>' . $valor[5] . '</td>';
				echo		'<td><a class="loadOnAdminWrapper" href="/e1bfd7PHP/TecnicoYa/?rt=admin/editarLocalidad&id=' . $valor[0] . '&idDepto=' . $valor[2] . '&nombre=' . str_replace(" " , "+" , $valor[1]) . '"' . '>Editar</a></td>';
				echo	'</tr>';
			}
		?>
	</tbody>
</table>
</div>