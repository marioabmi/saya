		<div id="content" class="col-xs-12 col-sm-10">
<div class="row">
	<div id="breadcrumb" class="col-md-12">
		<ol class="breadcrumb">
			<li><a href="#">Home</a></li>
			<li><a href="#">Gestion</a></li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
				
					<span>Gestion De Empleados</span>
					<button type="submit" class="btn btn-primary btn-label-left"  onclick=location="<?php echo base_url().'crud_empleados/agregar'; ?>" >
							<span><i class="fa fa-clock-o"></i></span>
								Agregar Empleado
							</button>
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
			<div class="box-content no-padding">
				<table class="table table-bordered table-striped table-hover table-heading table-datatable" id="datatable-1">
					<thead>
						<tr>

							<th>Nombre</th>
							<th>Apellidos</th>
							<th>Dui</th>
							<th>Cargo</th>
							<th>Acccion</th>

						</tr>
					</thead>
					<tbody>
					<!-- Start: list_row -->
						<tr>
					
						<?php foreach ($empleado as $value):?>
					        <td><?= $value->nombres?></td>
							<td><?= $value->apellidos?></td>
							<td><?= $value->dui?></td>
							<td><?= $value->masculino?></td>
                            <input  type="hidden" name="post" value="1" /> 
                            <td align="center"> <button type="button" onclick=location="<?php echo base_url().'crud_personas/editar/'.$value->id_personas; ?>"  class="btn btn-warning btn-label-left">
						    Modificar
					</button></td>
						</tr>
									 <?php endforeach ;?>
						<!-- End: list_row -->
					</tbody>
		
				</table>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
// Run Datables plugin and create 3 variants of settings
function AllTables(){
	TestTable1();
	TestTable2();
	TestTable3();
	LoadSelect2Script(MakeSelect2);
}
function MakeSelect2(){
	$('select').select2();
	$('.dataTables_filter').each(function(){
		$(this).find('label input[type=text]').attr('placeholder', 'Search');
	});
}
$(document).ready(function() {
	// Load Datatables and run plugin on tables 
	LoadDataTablesScripts(AllTables);
	// Add Drag-n-Drop feature
	WinMove();
});
</script>
