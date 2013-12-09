<form action="/e1bfd7PHP/TecnicoYa/?rt=usuario/calificarATecnico" method="post">
	<input class="hidden" name="rt" value="usuario/calificarATecnico">
	<div class="modal-header">
		<h3>Calificar técnico</h3>
	</div>
	<div class="modal-body">
		<div class="row">
			<div class="col-md-12" style="margin-left: auto;margin-right: auto;">
				<h4>¿Como considera que se desempeño <?php echo " " . $nombreTecnico . " (" . $mailTecnico . ")" ?> en el rubro <?php echo $nombreSerivico ?>?</h4>
				<input value="<?php echo $idContrato ?>" name="idContrato" type="text" class="hidden">
			</div>
			<div class="col-md-12" style="margin-left: auto;margin-right: auto;">
			<p>
				Califique del 1 al 10...<br/>               
				<select id="calificacion" name="calificacion" class="selectpicker">
					<?php 
						for ($i = 1; $i <= 10; $i++) {
							echo '<option value="' . $i . '">' . $i . '</option>';
						}
					?>
				</select>
			</p>
		</div>
		</div>
	</div>
	<div class="modal-footer">
		<a href='/e1bfd7PHP/TecnicoYa/?rt=index/index'><button type="button" data-dismiss="modal" class="btn">Cancelar</button></a>
		<button type="submit" class="btn btn-primary">Confirmar</button>
	</div>
</form>
<?php echo '<script>$(".selectpicker").selectpicker();</script>' ?>