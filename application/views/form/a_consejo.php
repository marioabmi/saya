<div id="content" class="col-xs-12 col-sm-10">
<div class="row">
	<div id="breadcrumb" class="col-md-12">
		<ol class="breadcrumb">
			<li><a href="ctl_index/principal">Home</a></li>
			<li><a href="crud_consejo/index">Gestion</a></li>
			<li><a href="crud_consejo/">Registrar</a></li>


		</ol>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-search"></i>
					<span>Registro de Consejo</span>
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
						<label class="col-sm-2 control-label">Periodo Del Consejo</label>
						<div class="col-sm-4">
							<input name="nombres"  value="<?= set_value('nombres');?>" required type="text" class="form-control" placeholder="" data-toggle="tooltip" data-placement="bottom" title="Nombre Completo">
						</div>

						<label class="col-sm-2 control-label">Cargo</label>
						<div class="col-sm-4">
									<select value="<?= set_value('id_cargos');?>" required  class="populate placeholder" name="id_cargos" id="id_cargos">
									<option value="">-- Seleccionar Cargo --</option>
									 <?php 
              foreach($cargo as $fila)
              {
          ?>
            <option value="<?=$fila -> id_cargos ?>"><?=$fila -> masculino ?></option>
          <?php
              }
          ?>   
								</select>
						</div>

					</div>
				
					<div class="form-group">

						<label class="col-sm-2 control-label">Persona</label>
						<div class="col-sm-4">
						<select value="<?= set_value('id_personas');?>" required  class="populate placeholder" name="id_personas" id="id_personas">
									<option value="">-- Seleccionar Persona --</option>
									 <?php 
              foreach($personas as $fila)
              {
          ?>
            <option value="<?=$fila -> id_personas ?>"><?=$fila -> nombres ?></option>
          <?php
              }
          ?>   
								</select></div>



						<label class="col-sm-2 control-label">Firma</label>
						<div class="col-sm-4">
					<input type="text" name="firma"  value="<?= set_value('firma');?>" required class="form-control" placeholder="Firma" data-toggle="tooltip" data-placement="bottom" title="Firma En Letras">
						
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
