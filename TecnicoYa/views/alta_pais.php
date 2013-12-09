<form action="/e1bfd7PHP/TecnicoYa/" method="post">
	<input class="hidden" name="rt" value="admin/agregarPais">
	<div class="modal-body">
		<div class="row">
			<div class="col-md-12" style="margin-left: auto;margin-right: auto;">
				<h4>Datos de país</h4>
				<p>Nombre               <input value="<?php $nombre ?>" name="nombre" type="text" class="col-md-12 form-control"></p>
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
		<button type="button" onclick="gestionPaises()" class="btn btn-primary">Cancelar</button>
	</div>
</form>