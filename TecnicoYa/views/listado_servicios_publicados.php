


<?php	
	echo '<div class="container">';

	$servicios = $lista_servicios;
	//var_dump($servicios);
	foreach ($servicios as &$valor) {
    	echo '<div class="itemListaServicios col-sm-5 col-md-3" style="margin: 1em;">';
    	echo 	'<div class="thumbnail">';
    	echo 	'<img src="' . $valor[16] . '" height=150/ class="img-thumbnail img-responsive" style="width: 200px;height: 200px;">';
    	echo 	'</div>';
    	echo '<div class="datosItemListaServicios">';
    	echo 	'<p class="tituloTipoServ">' . $valor[18]  . '</p>';
    	echo 	'<p>' . $valor[2]  . '</p>';
    	echo 	'<p style="color: green;">$' . $valor[15]  . '</p>';
    	echo '</div>';
        echo '<div class="conteiner" style="margin-bottom: inherit;text-align: right;">';
    	echo '<button class="btn btn-primary" style="margin-right: 0.5em;" onclick="contratarServicio(' . '\'' .  $valor[0] . '\'' . ',' . $valor[17]  . ')">Contratar</button>';
    	echo '<button class="btn btn-info" onclick="verMasDeServicioOfrecido(' . '\'' . $valor[0] . '\'' . ',' . $valor[17]  . ')">Ver mas..</button>';
        echo '</div>';
    	echo '</div>';
	}
	echo '</div>';
?>