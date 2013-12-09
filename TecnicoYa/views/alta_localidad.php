<form action="/e1bfd7PHP/TecnicoYa/" method="post">
	<input class="hidden" name="rt" value="admin/agregarLocalidad">
	<div class="modal-body">
		<div class="row">
			<div class="col-md-12" style="margin-left: auto;margin-right: auto;">
				<h4>Datos de localidad</h4>
				<p>Nombre               <input name="nombre" type="text" class="col-md-12 form-control"></p>
				<p>
					País               
					<select id="cmbPaisesUpdDptos" value="<?php $idPais ?>" name="idPais" class="comboFeo">
						<?php 
							foreach ($lista_paises as &$valor) {
								echo '<option class="paisUpdDept" value="' . $valor[0] . '">' . $valor[1] . '</option>';
							}
						?>
					</select>
				</p>
				<p>
					Departamento               
					<select id="cmbDeptosUpdLocs" value="<?php $idPais ?>" name="idDepto" class="comboFeo">
						
					</select>
				</p>
			</div>
		</div>
		<div class="row">
			<?php 
				if ( (isset($error)) && (!strcmp($error, "") == 0 ) ){
					echo $error;					
				}
			?>
		</div>
	</div>
	<div class="modal-footer">
		<button type="submit" class="btn btn-primary">Confirmar</button>
		<button type="button" onclick="gestionLocalidades()" class="btn btn-primary">Cancelar</button>
	</div>
</form>
<script>
	$( "#cmbPaisesUpdDptos" ).change(function() {
		var idPais = $(this).val();
		obtenerDeptosPorPais(idPais);
	});
</script>

<?php echo '<script>$(".selectpicker").selectpicker();</script>' ?>