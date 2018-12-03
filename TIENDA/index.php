<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Tienda</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!--Archivos Script y CSS -->
	<link rel="stylesheet" href="vendor/custom/index.css"/>
	<link rel="stylesheet" href="vendor/font-awesome-4.7.0/css/font-awesome.min.css"/>
	<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap-reboot.min.css"/>
	<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap-grid.min.css"/>
	<link rel="stylesheet" href="vendor/superFish/superfish.css"/>
	<link rel="stylesheet" href="vendor/bootstrapValidator.css"/>
	<link rel="stylesheet" href="vendor/jquery-notific8/responsive/jquery.notific8.css"/>
	<link rel="stylesheet" href="vendor/parallax/css/parallax.css"/>
    <link rel="stylesheet" href="vendor/DataTables/datatables.css"/>

	<script src="vendor/jquery-3.2.1.min.js"></script>
	<script src="vendor/popper.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/jquery-notific8/responsive/jquery.notific8.js"></script>
	<script src="vendor/bootstrapValidator.min.js"></script>
	<script src="vendor/validarForms.js"></script>
	<script src="vendor/custom/utileria.js"></script>
	<script src="vendor/custom/custom.js"></script>
	<script src="vendor/parallax/cherry-fixed-parallax.js"></script>
    <script src="vendor/DataTables/datatables.js"></script>

</head>

<body>
	<!--
<button type="button" class="btn btn-primary">Primary</button>
<button type="button" class="btn btn-secondary">Secondary</button>
<button type="button" class="btn btn-success">Success</button>
<button type="button" class="btn btn-danger">Danger</button>
<button type="button" class="btn btn-warning">Warning</button>
<button type="button" class="btn btn-info">Info</button>
<button type="button" class="btn btn-light">Light</button>
<button type="button" class="btn btn-dark">Dark</button>
<button type="button" class="btn btn-link">Link</button>
-->

	<div class="contenedor" class="col-md-12" style="margin-top: 20px">

		<?php
		session_start();
		
		//CONTIENE LOS MENUS PRINCIPALES DE LA PARTE SUPERIOR -_-
		require_once( 'template.php' );
		
		require_once('controller/general_controller.php');
		
		?>
	</div>
	<!--FIN DIV CONTENEDOR-->
</body>

</html>

<script>
	//parametros: nombre o id Del DIV, url de la imagen, ancho que se quiere mostrar de la imagen
	imagenScroll( "img-scroll", "vendor/images/book_scroll.jpg", "400" );
</script>