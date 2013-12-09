
<div class="row" aling="center">
	<p class="col-md-12" style="font-size: 25px;">Servicios pendientes</p>
</div>
<div class="row" style="background-color:beige">
<p>
	Estado de la contratación               
	<select id="cmbEstadoContratacion" class="selectpicker">
		<option value="todas">Todas</option>
		<option value="pendiente">Pendientes</option>
		<option value="realizada">Realizadas</option>
	</select>
</p>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Servicio</th>
			<th>Técnico</th>
			<th>Fecha de contrato</th>
			<th>Precio fijado</th>
			<th>Estado</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php
			$srvs = $lista_servicios;
			
			if ($srvs !== false){
				foreach ($srvs as &$valor) {
					echo 	'<tr>';
					echo		'<td>' . $valor[14] . '</td>';
					echo		'<td>' . $valor[32] . '(' . $valor[30] . ')' . '</td>';
					echo		'<td>' . $valor[5] . '</td>';
					echo		'<td>$' . $valor[4] . '</td>';
					echo		'<td>' . $valor[12] . '</td>';
					echo		'<td> ' . (strcmp($valor[12], 'pendiente') !== 0 ? '' : '<a class="loadOnFrontEndWrapper" href="/e1bfd7PHP/TecnicoYa/?rt=usuario/calificarATecnico&idContrato=' . $valor[0] . '&tecNombre=' .$valor[32].'&tecMail=' .$valor[30].'&servNombre='.str_replace(" " , "+" , $valor[14]).'"><img title="calificar" src="includes/img/calificar.jpg"></a>') . '</td>';
					echo	'</tr>';
				}
			}
			//var_dump($srvs);
		?>
	</tbody>
</table>
<script>
	$( "#cmbEstadoContratacion" ).change(function() {
		var estado = $(this).val();
		$("#wrapperFrontEnd").load("/e1bfd7PHP/TecnicoYa/?rt=usuario/listarServiciosPendientes&estado=" + estado); 
	});
</script>
<?php echo '<script>$(".selectpicker").selectpicker();</script>' ?>
</div>