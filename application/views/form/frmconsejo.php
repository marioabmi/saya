		<div id="content" class="col-xs-12 col-sm-10">

<div class="row">
	<div id="breadcrumb" class="col-md-12">
		<ol class="breadcrumb">
			<li><a href="ctl_index/principal">Home</a></li>
			<li><a href="crud_consejo">Registro</a></li>
			<li><a href="crud_consejo">Consejo</a></li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-picture-o"></i>
					<span>Gestion De Consejo</span>
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
			<div id="simple_gallery" class="box-content">
				<a class="fancybox" rel="gallery1" href='crud_consejo/agregar_periodo' title="Registro de Periodos">
					<img src="imagenes/periodo.png" alt="" />
				</a>
				<a class="fancybox" rel="gallery1" >
					<img src="imagenes/direcion.png" alt="" />
				</a>
					<a class="fancybox" rel="gallery1" href='crud_consejo/agregar_consejo' title="Registro de Consejo">
					<img src="imagenes/consejo.jpg" alt="" />
				</a>

			</div>
		</div>
	</div>
</div>
<script>
// Create fancybox2 gallery
function DemoGallery(){
	$('.fancybox').fancybox({
		openEffect	: 'none',
		closeEffect	: 'none'
	});
}
$(document).ready(function() {
	// Load Fancybox2 and make gallery in callback
	LoadFancyboxScript(DemoGallery);
});
</script>


			<div id="ajax-content"></div>
		</div>

