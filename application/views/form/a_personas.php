<div id="content" class="col-xs-12 col-sm-10">
<div class="row">
	<div id="breadcrumb" class="col-md-12">
		<ol class="breadcrumb">
			<li><a href="ctl_index/principal">Home</a></li>
			<li><a href="crud_personas/index">Gestion</a></li>
			<li><a href="crud_personas/agregar">Registrar</a></li>


		</ol>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-search"></i>
					<span>Registro de Personas</span>
				</div>
				<div class="box-icons">
					<a class="collapse-link">
						<i class="fa fa-chevron-up"></i>
					</a>
					<a class="expand-link">
						<i class="fa fa-expand"></i>
					</a>
					<a class="close-link">
						<i class="fa fa-times"></i>
					</a>
				</div>
				<div class="no-move"></div>
			</div>
			<div class="box-content">
				<form method="post" class="form-horizontal" role="form">


					<div class="form-group">
						<label class="col-sm-2 control-label">Nombres</label>
						<div class="col-sm-4">
							<input name="nombres"  value="<?= set_value('nombres');?>" required type="text" class="form-control" placeholder="Primer  y Segundo Nombre" data-toggle="tooltip" data-placement="bottom" title="Nombre Completo">
						</div>

						<label class="col-sm-2 control-label">Genero</label>
						<div class="col-sm-4">
									<select name="sexo"  value="<?= set_value('sexo');?>" required class="populate placeholder" name="country" id="s2_country">
									<option value="">-- Seleccionar Genero --</option>
									<option value="M">Masculio</option>
									<option value="F">Femenino</option>
								</select>
						</div>

					</div>
				
					<div class="form-group">

						<label class="col-sm-2 control-label">Apellidos</label>
						<div class="col-sm-4">
						<input type="text" name="apellidos"  value="<?= set_value('apellidos');?>" required class="form-control" placeholder="Los Dos Apellido" data-toggle="tooltip" data-placement="bottom" title="Primer Apellido">
						</div>



						<label class="col-sm-2 control-label">Direccion</label>
						<div class="col-sm-4">
					<textarea class="form-control" name="direccion"  value="<?= set_value('direccion');?>" required rows="3" title="Direccion de la Persona"></textarea>
						
						</div>

					</div>



<input  type="hidden" name="post" value="1" />  
					<div class="clearfix"></div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-2">
							<button type="submit"  class="btn btn-primary btn-label-left">
							<span><i class="fa fa-clock-o"></i></span>
							Siguiente
							</button>
						</div>
					
						<div class="col-sm-2">

							<button type="cancel"class="btn btn-default btn-label-left">
							<span><i class="fa fa-clock-o txt-danger" ></i></span>
								Cancelar
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>   <?=validation_errors(); ?>
				</form>
			
<script type="text/javascript">
// Run Select2 plugin on elements
function DemoSelect2(){
	$('#s2_with_tag').select2({placeholder: "Select OS"});
	$('#s2_country').select2();
}
// Run timepicker
function DemoTimePicker(){
	$('#input_time').timepicker({setDate: new Date()});
}
$(document).ready(function() {
	// Create Wysiwig editor for textare
	TinyMCEStart('#wysiwig_simple', null);
	TinyMCEStart('#wysiwig_full', 'extreme');
	// Add slider for change test input length
	FormLayoutExampleInputLength($( ".slider-style" ));
	// Initialize datepicker
	$('#input_date').datepicker({setDate: new Date()});
	// Load Timepicker plugin
	LoadTimePickerScript(DemoTimePicker);
	// Add tooltip to form-controls
	$('.form-control').tooltip();
	LoadSelect2Script(DemoSelect2);
	// Load example of form validation
	LoadBootstrapValidatorScript(DemoFormValidator);
	// Add drag-n-drop feature to boxes
	WinMove();
});
</script>
