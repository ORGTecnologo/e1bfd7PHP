
<div class="col-md-12">
	<form action="/e1bfd7PHP/TecnicoYa/" method="post" enctype="multipart/form-data">
		<div class="col-md-12 separador"></div>
		<div style="overflow-y: auto;display: block;width: 50%;min-width: 300px;margin-right: auto;margin-left: auto;background-color: beige;">
			<input class="hidden" name="rt" value="usuario/ofrecerNuevoServicio">
			<div class="modal-header">
				<h3>Ofrecer nuevo servicio</h3>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12" style="margin-left: auto;margin-right: auto;">
						<h4>Datos del nuevo servicio</h4>
						<p>
							Servicio     	
							<select value="" name="idServicio" class="selectpicker" id="idServicio">
								<?php 
									foreach ($lista_servicios as &$valor) {
										echo '<option value="' . $valor[0] . '">' . $valor[1] . '</option>';
									}
								?>
							</select>
							<div id="mjeServYaOfrec"></div>
						</p>
						<p>Precio fijado    		<input name="precio" type="text" class="col-md-12 form-control" onkeypress='validate(event)'></p>
						<p>Foto de publicación    	<input name="foto" type="file" size="35" class="col-md-12 form-control" />
					</div>
				</div>
			</div>
			<div class="errorDiv">
				<?php 
					if ( (isset($error)) && (!strcmp($error, "") == 0 ) ){
						echo $error;					
					}
				?>
			</div>
			<div class="modal-footer">
				<a href='/e1bfd7PHP/TecnicoYa/?rt=index/index'><button type="button" data-dismiss="modal" class="btn">Volver</button></a>
				<button type="submit" class="btn btn-primary">Confirmar</button>
			</div>
		</div>
	</form>
	<script>
		
		$( "#idServicio" ).change(function() {
			var idPais = $(this).val();
			console.log($("#idServicio").val());
			esServicioYaOfrecido($("#idServicio").val());
		});
		$(document).ready(function(){esServicioYaOfrecido($("#idServicio").val())});
	</script>
</div>
<?php echo '<script>$(".selectpicker").selectpicker();</script>' ?>