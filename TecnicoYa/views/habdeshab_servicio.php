
<div class="row">
	<div class="col-md-6">
	<div class="col-md-12">
		<p class="col-md-12" style="font-size: 25px;">Cambiar estado de servicio servicio</p>
	</div>
	<div class="col-md-12">
		<form action="/e1bfd7PHP/TecnicoYa/" method="post">
			<input class="hidden" name="rt" value="admin/cambiarEstadoServicio">
				<div class="row">
					<div class="col-md-12" style="margin-left: auto;margin-right: auto;">
                      <input value="<?php echo $id ?>" name="id" type="text" class="hidden">
                      <h4>¿Está seguro que desea cambiar el estado de el el servicio <?php echo $nombre; ?>?</h4>
					</div>
				</div>
				<div class="row">
                  	<div class="col-md-12">
					<?php 
						if ( (isset($error)) && (!strcmp($error, "") == 0 ) ){
							echo $error;
						}
					?>
                  </div>
				</div>
				<button type="submit" class="btn btn-primary">Confirmar</button>
				<button type="button" onclick="gestionServicios()" class="btn btn-primary">Cancelar</button>
		</form>
	</div>
</div>
</div>