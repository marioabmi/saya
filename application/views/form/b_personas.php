<div id="content" class="col-xs-12 col-sm-10">
<div class="row">
	<div id="breadcrumb" class="col-md-12">
		<ol class="breadcrumb">
			<li><a href="ctl_index/principal">Home</a></li>
			<li><a href="crud_personas/index">Gestion</a></li>
			<li><a href="crud_personas/agregar">Registrar</a></li>
			<li><a href="crud_personas/agregar">Detalle</a></li>


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
			    <?=@$error?>

    <span><?php echo validation_errors(); ?></span>
    		<?php echo form_open_multipart('crud_personas/agregar');?>
			<div class="box-content">
				<form method="post" class="form-horizontal" role="form">
<input  type="hidden" class="form-control" name="nombres" required="required" maxlength="10"  min="1" max="10" value="<?php echo set_value('nombres');?>">
<input  type="hidden" class="form-control" name="sexo" required="required" maxlength="10"  min="1" max="10" value="<?php echo set_value('sexo');?>">
<input  type="hidden" class="form-control" name="apellidos" required="required" maxlength="10"  min="1" max="10" value="<?php echo set_value('apellidos');?>">
<input  type="hidden" class="form-control" name="direccion" required="required" maxlength="10"  min="1" max="10" value="<?php echo set_value('direccion');?>">
					<div class="form-group">
						<label class="col-sm-2 control-label">Municipio</label>
						<div class="col-sm-4">
							<select value="<?= set_value('id_municipios');?>" required  class="populate placeholder" name="id_municipios" id="id_municipios">
									<option value="">-- Seleccionar Municipio --</option>
									 <?php 
              foreach($municipio as $fila)
              {
          ?>
            <option value="<?=$fila -> id_municipios ?>"><?=$fila -> municipio ?></option>
          <?php
              }
          ?>   
								</select>
						</div>

						<label class="col-sm-2 control-label">Profession</label>
						<div class="col-sm-4">
					<select value="<?= set_value('id_profesiones');?>" required  class="populate placeholder" name="id_profesiones" id="id_profesiones">
									<option value="">-- Seleccionar Profesion --</option>
											 <?php 
              foreach($profesiones as $fila)
              {
          ?>
            <option value="<?=$fila -> id_profesiones ?>"><?=$fila -> profesion  ?></option>
          <?php
              }
          ?>  
								</select>
						</div>

					</div>
				
					<div class="form-group">

						<label class="col-sm-2 control-label">Telefono</label>
						<div class="col-sm-4">
						<input type="text" value="<?= set_value('telefono');?>" required  class="form-control" name="telefono" placeholder="Numero de Telefono" data-toggle="tooltip" data-placement="bottom" title="Numero Telefono">
						</div>



						<label class="col-sm-2 control-label">Nacionalidad</label>
						<div class="col-sm-4">
				<select value="<?= set_value('id_nacionalidades');?>" required  class="populate placeholder" name="id_nacionalidades" id="id_nacionalidades">
									<option value="">-- Seleccionar Nacionalidad --</option>
									 <?php 
              foreach($nacionalidad as $fila)
              {
          ?>
            <option value="<?=$fila -> id_nacionalidades ?>"><?=$fila -> nacionalidad ?></option>
          <?php
              }
          ?>   		
					    </select>
						</div>
						</div>
	                <div class="form-group">
						<label class="col-sm-2 control-label">Dui</label>
 	                    <div class="col-sm-4">
					    <input type="text" name="dui" value="<?= set_value('dui');?>" required  class="form-control" placeholder="Numero de Indentidad" data-toggle="tooltip" data-placement="bottom" title="Numero de Indentidad">
						</div>
						<div class="col-sm-4">
						<label class="col-sm-2 control-label">Imagen 1</label><input type="file" name="userfile" /><br /><br />
						</div>
					</div>
                    <input  type="hidden" name="post" value="2" />  
					<div class="clearfix"></div>
					<div class="form-group">
					<div class="col-sm-2">
					<button type="button" onClick=location="<?php echo base_url().'crud_personas/agregar'; ?>" class="btn btn-warning btn-label-left">
					<span><i class="fa fa-clock-o"></i></span>
					Atraz
					</button>
					</div>
					<div class="col-sm-2">
					<button type="submit"  class="btn btn-primary btn-label-left">
					<span><i class="fa fa-clock-o"></i></span>
					Guardar
					</button>
					</div>
					<div class="col-sm-2">
					<button type="button" onClick=location="<?php echo base_url().'crud_personas/index'; ?>"  class="btn btn-default btn-label-left">
					<span><i class="fa fa-clock-o txt-danger" ></i></span>
					Cancelar
					</button>
						</div>
					</div>
					   <?=validation_errors(); ?>
					   <?=form_close()?>
				</form>
			</div>
		</div>
	</div>
</div>
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
