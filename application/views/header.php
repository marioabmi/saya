<?php
// En este php evaluamos la session si esta longeado y si esa si muestra todo el contenido de la pagina
   // session_start(); 
if (isset($_SESSION['my_usuario']))
{

?>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>SAYA</title>
		<meta name="description" content="description">
		<meta name="author" content="App_Solution">
		<meta name="viewport" content="width=device-width, initial-scale=1">
			 <base href="<?php echo base_url();  ?>">
			 <link href="<?php echo base_url().'seteo/js/devoops.js'; ?>" type="javascript" >
			 <link href="<?php echo base_url().'seteo/js/devoops.min.js'; ?>" type="javascript">
		<link href="<?php echo base_url().'seteo/plugins/bootstrap/bootstrap.css'; ?>" rel="stylesheet">
		<link href="<?php echo base_url().'seteo/plugins/jquery-ui/jquery-ui.min.css'; ?>" rel="stylesheet">
		<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
		<link href='http://fonts.googleapis.com/css?family=Righteous' rel='stylesheet' type='text/css'>
		<link href="<?php echo base_url().'seteo/plugins/fancybox/jquery.fancybox.css'; ?>" rel="stylesheet">
		<link href="<?php echo base_url().'seteo/plugins/fullcalendar/fullcalendar.css'; ?>" rel="stylesheet">
		<link href="<?php echo base_url().'seteo/plugins/xcharts/xcharts.min.css'; ?>" rel="stylesheet">
		<link href="<?php echo base_url().'seteo/plugins/select2/select2.css'; ?>" rel="stylesheet">
		<link href="<?php echo base_url().'seteo/css/style.css' ; ?>" rel="stylesheet">
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
				<script src="http://getbootstrap.com/docs-assets/js/html5shiv.js"></script>
				<script src="http://getbootstrap.com/docs-assets/js/respond.min.js"></script>
		<![endif]-->


		
	
		<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script type="text/javascript" src="http://www.google.com/jsapi"></script>
		<script type="text/javascript">
		google.load("jquery", "1.4.4");
		</script>
		<script type="text/javascript" src="http://code.highcharts.com/highcharts.js"></script>


	</head>
<body>
<!--Start Header-->
<div id="screensaver">
	<canvas id="canvas"></canvas>
	<i class="fa fa-lock" id="screen_unlock"></i>
</div>

<header class="navbar">
	<div class="container-fluid expanded-panel">
		<div class="row">
			<div id="logo" class="col-xs-12 col-sm-2">
				<a href="">SAYA</a>
			</div>
			<div id="top-panel" class="col-xs-12 col-sm-10">
				<div class="row">
					<div class="col-xs-8 col-sm-4">
						<a href="#" class="show-sidebar">
						
						</a>
						
					</div>
					<div class="col-xs-4 col-sm-8 top-panel-right">
						<ul class="nav navbar-nav pull-right panel-menu">
							
							<li class="dropdown">
								<a href="#" class="dropdown-toggle account" data-toggle="dropdown">
									
									<i class="fa fa-angle-down pull-right"></i>
									<div class="user-mini pull-right">
										<span class="welcome">Bienvenido</span>
										<span><?php echo(isset($usuario))?$usuario['usuario']:'' ?></span>
									</div>
								</a>
								<ul class="dropdown-menu">
									
									<li>
										<a href="ctl_index/salir">
											<i class="fa fa-power-off"></i>
											<span class="hidden-sm text">Salir</span>
										</a>
									</li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>
<!--End Header-->
<!--Start Container-->
<div id="main" class="container-fluid">
	<div class="row">
		<div id="sidebar-left" class="col-xs-2 col-sm-2">
			<ul class="nav main-menu">
				<li>
					<a href="ajax/dashboard.html" class="active ajax-link">
						<i class="fa fa-dashboard"></i>
						<span class="hidden-xs">Inicio</span>
					</a>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle">
						<i class="fa fa-list"></i>
						<span class="hidden-xs">Casos</span>
					</a>
					<ul class="dropdown-menu">
					
						<li><a  href="<?php echo base_url().'crud_caso'; ?>">Nuevo Caso</a></li>
						<li><a href="<?php echo base_url().'crud_caso/responsable'; ?>">Casos Sin Responsable</a></li>
						<li><a href="<?php echo base_url().'crud_caso/casos_con_responsable'; ?>">Casos en Proceso</a></li>
						<li><a href="<?php echo base_url().'crud_caso/cerrar_casos'; ?>">Cerrar Casos</a></li>
						<li><a href="<?php echo base_url().'crud_historial'; ?>">Historial</a></li>

					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle">
						<i class="fa fa-list"></i>
						 <span class="hidden-xs">Categorizar</span>
					</a>
					<ul class="dropdown-menu">
						<li><a class="" href="crud_categoria">Categorias</a></li>
						<li><a class="" href="crud_subcategoria">Subcategorias</a></li>

					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle">
						<i class="fa fa-bar-chart-o"></i>
						 <span class="hidden-xs">Graficos De Casos</span>
					</a>
					<ul class="dropdown-menu">
						<li><a class="" href="charts">Historial e Casos</a></li>
						
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle">
						<i class="fa fa-desktop"></i>
						 <span class="hidden-xs">Usuarios</span>
					</a>
					<ul class="dropdown-menu">
						<li><a class="ajax-link" href="ajax/ui_grid.html">Register</a></li>
						<li><a class="ajax-link" href="ajax/ui_buttons.html">Usuarios</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle">
						<i class="fa fa-list"></i>
						 <span class="hidden-xs">Setting</span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="ajax/page_login.html">No se que van a poner aqui</a></li>
					
					</ul>
				</li>
			
			</ul>
		</div>
		   <?php
}
else
{
   redirect( 'acceso', 'refresh' ); 
}
?>