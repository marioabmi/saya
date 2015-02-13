
<div class="container-fluid">
	<div id="page-login" class="row">
		<div class="col-xs-12 col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
		
				<?php echo form_open('', array( 'id'=>'my_form' )); ?> 
			<div class="box">
				<div class="box-content">
					<div class="text-center">
						<h3 class="page-header">Bienvenido</h3>
					</div>
					<div class="form-group">
						<label class="control-label">Nombre Usuario:</label>
						<input type="text" class="form-control" name="usuario" placeholder="@NombreUsuario" />
					</div>
					<div class="form-group">
						<label class="control-label">Clave:</label>
						<input type="password" class="form-control" name="clave" placeholder="Clave" />
					</div>
					<center><button type="button" onclick="loguear()" class="btn btn-primary">&nbsp;Acceder</button></center> 
				</div>
			</div>
				<?php form_close(); ?> 
		</div>
	</div>
</div>

<script> 
	var img='<i class="glyphicon glyphicon-dashboard"></i>'; 
 
	function loguear(){ 
		$.ajax({ 
			url      : 'ctl_index/loguear', 
			type     : 'post', 
			dataType : 'json', 
			data     : $('#my_form').serialize(), 
			beforeSend : function(){ 
				alerta( img + ' Espere...' ); 
			}, 
			success : function(data){ 
				alerta(); 
				if( data.type==false){ 
					alerta( data.message, false ); 
				}else{ 
					alerta(img + ' Redireccionando...', true ); 
					setTimeout( function(){ window.location.replace( 'ctl_index/principal' ); }, 2000 ); 
				} 
			}, 
			error : function(){ 
				alerta(); dialogo( 'Error', 'Error en la función ctl_index/loguear.' ); 
			} 
 
		}); 
	}; 
</script>