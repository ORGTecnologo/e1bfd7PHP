


<?php	
	echo '<div class="row">';

	$servicios = $lista_servicios;
	//var_dump($servicios);
	foreach ($servicios as &$valor) {
    	echo '<div class="itemListaServicios">';
    	echo 	'<div>';
    	echo 	'<img src="' . $valor[16] . '" height=150/>';
    	echo 	'</div>';
    	echo '<div class="datosItemListaServicios">';
    	echo 	'<p>' . $valor[18]  . '</p>';
    	echo 	'<p>' . $valor[2]  . '</p>';
    	echo 	'<p>$' . $valor[15]  . '</p>';
    	echo '</div>';
    	echo '<button class="btn btn-primary" onclick="contratarServicio(' . '\'' .  $valor[0] . '\'' . ',' . $valor[17]  . ')">Contratar</button>';
    	echo '<button class="btn btn-primary" onclick="verMasDeServicioOfrecido(' . '\'' . $valor[0] . '\'' . ',' . $valor[17]  . ')">Ver mas..</button>';
    	echo '</div>';
	}
	echo '</div>';
?>