<div id="headerRight" class="col-md-8">
	<div class="col-md-12 box-right">
		<div id="menuCuenta" class="row">
			<nav class="navbar navbar-expand-lg">
				<button class="navbar-toggler navbar-light bg-light" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
			


				<div class="collapse navbar-collapse" id="navbarNavDropdown">
					<ul id="cuentaMenu" class="navbar-nav">
						<li class="nav-item">
							<a class="nav-link" href="?home"><i class="fa fa-home"></i> Inicio</a>
						</li>

						<?php if(!isset($_SESSION["usuarioTienda"])){
						echo '<li class="nav-item">
							     <a class="nav-link" href="?registrar=1"><i class="fa fa-list"></i> Registrarse</a>
						      </li>';
                        }?>
					</ul>
				</div>
			</nav>
		</div>

		<div id="carrito" clas="row">
			<div id="search">
				<input type="text" id="busqueda" name="busqueda" value="" placeholder="Search"/>
				<button id="btnBusqueda" type="button" class="button-search"><i class="fa fa-search"></i></button>
				<div class="clear"></div>
			</div>
			<div class="box-cart">
				<div id="cart">
					<?php 
                        if(!isset( $_GET[ "carrito" ])){
                            require_once("controller/carrito_controller.php"); 
                        }
                    ?>
				</div>
			</div>
			<div class="login_btn">
				<?php if(isset($_SESSION["usuarioTienda"])){
						echo '<li class="nav-item dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> '.$_SESSION["usuarioTienda"].'</a>
								<div class="dropdown-menu" style="">
									
									<a class="dropdown-item" href="?perfil=1"> Perfil</a>
									<div class="dropdown-divider"></div>
									<a id="cerrarSesion" name="cerrarSesion" class="dropdown-item"> Cerrar Sesión</a>';
								
						echo 	'</div>
						  	 </li>';
								
					}else if(!isset( $_GET[ "login" ])){
						echo '<li class="nav-item dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-unlock"></i> Login</a>
								<div class="dropdown-menu" style="width: 250%;">';
									require_once("login.php");
						echo 	'</div>
						  	 </li>';
					}?>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<div class="clear"></div>
</div>

<div id="menuPagina" class="col-md-12 floatLeft">
	<div id="tm_menu" class="nav__primary sf-js-enabled sf-arrows">
		<div class="">
			<div class="menu-shadow">
				<nav class="navbar navbar-expand-lg">
					<button class="navbar-toggler navbar-light bg-light" type="button" data-toggle="collapse" data-target="#navbarNavDropdown2" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		  </button>
				



					<div class="collapse navbar-collapse" id="navbarNavDropdown2">
						<ul id="" class="navbar-nav menu">
							<li class="nav-item">
								<a class="nav-link" href="?home"><i class="fa fa-home"></i> Inicio</a>
							</li>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-list"></i> Categorias</a>
								<div class="dropdown-menu">
									<a class="dropdown-item" href="?aventura=1"> Aventura</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="?infantil=1"> Infantiles</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="?ficcion=1"> Ficción</a>
								
								</div>

						</ul>
					</div>
				</nav>
				<div class="clear"></div>
			</div>
		</div>
	</div>
</div>


<script>
	$( document ).ready( function () {
		$( '#navbarNavDropdown2 li' ).find( ' div>a' ).prepend( '<i class="fa fa-chevron-right"></i>' );
	} );

	$( document ).ready( function () {

		$( "#cerrarSesion" ).click( function ( event ) {
			//Construimos la variable que se guardará en el data del Ajax para pasar al archivo php que procesará los datos
			var datos = {
				'cerrarSesion': 'salir'
			}

			$.ajax( {
				type: "POST",
				url: "controller/acceso_controller.php",
				data: datos,
				success: function ( data ) {
					if ( !data ) {
						fnCorrecto( "Correcto!" );
						location.reload();
					} else {
						fnError( "Error al Cerrar Sesión" );
					}

				},
				error: function () {
					fnError( "Error al Cerrar sesión" );
				}

			} );

		} );
	} );

	$( document ).ready( function () {

		$( "#btnBusqueda" ).click( function ( event ) {
			//Construimos la variable que se guardará en el data del Ajax para pasar al archivo php que procesará los datos
			var consulta = $( "#busqueda" ).val();
			window.location.href = '?consulta=' + consulta;


		} );
	} );
</script>


<style>
	.contenedor2 {
		display: flex;
		width: 500px;
		height: 70px;
		color: #fff;
		font-size: 40px;
		line-height: 100px;
		position: absolute;
		top: 0;
		right: 0;
		bottom: 0;
		left: 0;
		margin: auto;
		overflow: hidden;
	}
	
	.contenedor2 ul {
		list-style: none;
		padding-left: 10px;
		animation: cambiar 7s infinite;
	}
	
	.contenedor2 ul,
	p {
		margin: 0;
	}
	
	@keyframes cambiar {
		0% {
			margin-top: 0;
		}
		20% {
			margin-top: 0;
		}
		25% {
			margin-top: -100px;
		}
		50% {
			margin-top: -100px;
		}
		55% {
			margin-top: -200px;
		}
		70% {
			margin-top: -200px;
		}
		85% {
			margin-top: -300px;
		}
		95% {
			margin-top: -300px;
		}
		100% {
			margin-top: 0;
		}
	}
</style>