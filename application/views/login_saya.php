
<div class="container-fluid">
	<div id="page-login" class="row">
		<div class="col-xs-12 col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
			<div class="text-right">
				<a href="page_register.html" class="txt-default">Nueva Cuenta?</a>
			</div>
				<?php echo form_open('', array( 'id'=>'my_form' )); ?> 
			<div class="box">
				<div class="box-content">
					<div class="text-center">
						<h3 class="page-header">Bienvenido</h3>
					</div>
					<div class="form-group">
						<label class="control-label">Nombre Usuario:</label>
						<input type="text" class="form-control" name="username" />
					</div>
					<div class="form-group">
						<label class="control-label">Clave:</label>
						<input type="password" class="form-control" name="password" />
					</div>
					<center><button type="button" onclick="loguear()">&nbsp;Acceder</button></center> 
				</div>
			</div>
				<?php form_close(); ?> 
		</div>
	</div>
</div>
