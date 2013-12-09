<div class="row" aling="center">
	<p class="col-md-12" style="font-size: 25px;">Servicios ofrecidos</p>
</div>
<div class="row" style="background-color:beige">
<table class="table table-striped">
	<thead>
		<tr>
			<th></th>
			<th>Servicio</th>
			<th>Precio fijado</th>
			<th>
				<a class="loadOnFrontEndWrapper pull-right" href="#" onclick="ofrecerNuevoServicio()">
					<span class="glyphicon glyphicon-plus"></span>   Nuevo Servicio
				</a>	
			</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$srvs = $lista_servicios;
			//var_dump($srvs);
			foreach ($srvs as &$valor) {
				echo 	'<tr>';
				echo		'<td><img src="' . $valor[4] . '" height=40 /></td>';
				echo		'<td>' . $valor[6] . '</td>';
				echo		'<td>$' . $valor[3] . '</td>';
				echo		'<td><a class="loadOnFrontEndWrapper" href="/e1bfd7PHP/TecnicoYa/?rt=usuario/bajaDeServicio&id=' . $valor[5] . '&nombre=' . str_replace(" " , "+" , $valor[6]) . '">Eliminar</a></td>';
				echo	'</tr>';
			}
		?>
	</tbody>
</table>
</div>