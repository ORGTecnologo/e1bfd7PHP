
<div class="row">
	<div class="col-md-6">
	<div class="col-md-12">
		<p class="col-md-12" style="font-size: 25px;">Editar servicio</p>
	</div>
	<div class="col-md-12">
		<form action="/e1bfd7PHP/TecnicoYa/" method="post">
			<input class="hidden" name="rt" value="admin/editarPais">
				<div class="row">
					<div class="col-md-12" style="margin-left: auto;margin-right: auto;">
						<input value="<?php echo $id ?>" name="id" type="text" class="hidden">
						<p>Nombre               <input value="<?php echo $nombre ?>" name="nombre" type="text" class="col-md-12 form-control"></p>
					</div>
				</div>
				<div class="row">
					<?php 
						if ( (isset($error)) && (!strcmp($error, "") == 0 ) ){
							echo $error;					
						}
					?>
				</div>
				<button type="submit" class="btn btn-primary">Confirmar</button>
				<button type="button" onclick="gestionPaises()" class="btn btn-primary">Cancelar</button>
		</form>
	</div>
</div>
</div>