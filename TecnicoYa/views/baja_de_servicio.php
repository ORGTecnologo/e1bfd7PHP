<form action="/e1bfd7PHP/TecnicoYa/?rt=usuario/bajaDeServicio" method="post">
	<input class="hidden" name="rt" value="usuario/bajaDeServicio">
	<div class="modal-header">
		<h3>Baja de servicio</h3>
	</div>
	<div class="modal-body">
		<div class="row">
			<div class="col-md-12" style="margin-left: auto;margin-right: auto;">
				<h4>¿Esta seguro que desea eliminar "<?php echo $nombre ?>" de su lista de servicios?</h4>
				<input value="<?php echo $id ?>" name="id" type="text" class="hidden">
			</div>
			<div class="col-md-12" style="margin-left: auto;margin-right: auto;color:red;">
				<?php 
					if (isset($error))
						echo $error;
				?>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<a href='/e1bfd7PHP/TecnicoYa/?rt=index/index'><button type="button" data-dismiss="modal" class="btn">Cancelar</button></a>
		<button type="submit" class="btn btn-primary">Confirmar</button>
	</div>
</form>