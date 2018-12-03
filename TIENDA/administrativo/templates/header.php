<div>
	<header class="header fixed-top clearfix">
		<title>TIENDA - ADMINISTRATIVO</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

		<link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap-grid.min.css">
		<link rel="stylesheet" href="../vendor/font-awesome-4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap-reboot.min.css">
		<link rel="stylesheet" href="../vendor/custom/style.css">
		<link rel="stylesheet" href="../vendor/custom/style-responsive.css">
		<link rel="stylesheet" href="../vendor/tether/css/tether.min.css">
		<link rel="stylesheet" href="../vendor/bootstrapValidator.css">
		<link rel="stylesheet" href="../vendor/jquery-notific8/responsive/jquery.notific8.css">

		<script src="../vendor/jquery-3.2.1.min.js"></script>
		<script src="../vendor/jquery-1.10.0.js"></script>
		<script src="../vendor/popper.min.js"></script>
		<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="../vendor/bootstrapValidator.min.js"></script>
		<script src="../vendor/jquery-notific8/responsive/jquery.notific8.js"></script>
		<script src="../vendor/custom/utileria.js"></script>
		<script src="../vendor/tether/js/tether.min.js"></script>
		<script src="../vendor/validarForms.js"></script>


		<div class="brand"> <a class="logo">

            </a>

		


			<div class="sidebar-toggle-box">
				<center><a href="javascript:void(0);" style="font-size:15px;" class="fa fa-bars" onclick="myFunction()"></a>
				</center>
			</div>
		</div>
		<div class="top-nav clearfix">
			<ul class="nav float-right top-menu" id="menuUsuario">
				<li id="cerrarSesion" class="dropdown nav-item">
					<a data-toggle="dropdown" style="cursor:pointer;" class="dropdown-toggle nav-link">
                        <i class="fa fa-user"></i>
                        <span class="username">Hola <?php echo $_SESSION['usuario']; ?></span>
                        <b class="caret"></b>
                    </a>
				

					<ul class="dropdown-menu extended logout">
						<li class="dropdown-item"><a href="funciones/desconectar.php"><i class="fa fa-power-off"></i>Cerrar sesi&#xF3;n</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</header>
</div>