<form action="/e1bfd7PHP/TecnicoYa/" method="post">
	<input class="hidden" name="rt" value="admin/editarDepartamento">
	<div class="modal-body">
		<div class="row">
			<div class="col-md-12" style="margin-left: auto;margin-right: auto;">
				<h4>Datos de departamento</h4>
				<input value="<?php echo $id ?>" name="id" type="text" class="hidden">
				<p>Nombre               <input value="<?php echo $nombre ?>" name="nombre" type="text" class="col-md-12 form-control"></p>
				<p>
					País               
					<select name="idPais" class="selectpicker">
						<?php 
							foreach ($lista_paises as &$valor) {
								echo '<option value="' . $valor[0] . '">' . str_replace(" " , "+" , $valor[1]) . '</option>';
							}
						?>
					</select>
				</p>
			</div>
		</div>
		<div class="row">
		</div>
	</div>
	<div class="modal-footer">
		<button type="submit" class="btn btn-primary">Confirmar</button>
		<button type="button" onclick="gestionDepartamentos()" class="btn btn-primary">Cancelar</button>
	</div>
</form>

<?php echo '<script>$(".selectpicker").selectpicker();</script>' ?>