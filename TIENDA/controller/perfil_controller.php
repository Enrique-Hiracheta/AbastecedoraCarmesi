<?php
require_once("model/perfil_model.php");
?>

<section id="main-content">
	<section class="wrapper">
		<div id="usuarios" class="col-md-12">
			<div class="encabezado">
				<div class="row">
					<div class="col-lg-6">
						<h1><i class="fa fa-users"></i>Perfil Usuario</h1>
						<br></br>
					</div>
				</div>
			</div>
			<div id="cuerpo">
				<?php 
                foreach ( $usuario as $usuarioAux ) {
                echo '
					<div class="row">
						<div class="col-lg-1">
							<label>Nombre de usuario</label>
						</div>
						<div class="col-lg-3">
							<input disabled value="'.$usuarioAux["usuario"].'" name="usuario" type="text" class="form-control" maxlength="20" required>
						</div>
						<div class="col-lg-1">
							<label>Contraseña</label>
						</div>
						<div class="col-lg-3">
							<input disabled value="*************" name="contrasenia" type="text" class="form-control" maxlength="20" required>
							<br></br>
						</div>

					</div>
					<div class="row">
						<div class="col-lg-1">
							<label>Nombre</label>
						</div>
						<div class="col-lg-3">
							<input disabled value="'.$usuarioAux["nombre"].'" name="nombre" type="text" class="form-control" maxlength="20" required>
						</div>
						<div class="col-lg-1">
							<label>Apellido Paterno</label>
						</div>
						<div class="col-lg-3">
							<input disabled value="'.$usuarioAux["apellidoPaterno"].'" name="apellidoPaterno" type="text" class="form-control" maxlength="20" required>
						</div>
						<div class="col-lg-1">
							<label>Apellido Materno</label>
						</div>
						<div class="col-lg-3">
							<input disabled value="'.$usuarioAux["apellidoMaterno"].'" name="apellidoMaterno" type="text" class="form-control" maxlength="20">
						</div>
					</div>
					<br></br>
					<div class="row">
						<div class="col-lg-1">
							<label>RFC</label>
						</div>
						<div class="col-lg-3">
							<input disabled value="'.$usuarioAux["rfc"].'" name="rfc" type="text" placeholder="BADD110313HCMLNS09" class="form-control" maxlength="18" required>
						</div>
						<div class="col-lg-1">
							<label>E- Mail</label>
						</div>
						<div class="col-lg-3">
							<input disabled value="'.$usuarioAux["email"].'" name="email" type="email" placeholder="correo@dominio.com" class="form-control" maxlength="20">
						</div> 	
						<div class="col-md-1">
							<label>Método de pago</label>
						</div>
						<div class="col-md-2.5">';
							if($usuarioAux["usuario"]==1){
                                echo 'Efectivo';
                            }else{
                                echo 'Tranferencia';
                            }
						echo '</div>
					</div>
					<br></br>
					<div class="row">
						<div class="col-lg-1">
							<label>Telefono casa</label>
						</div>
						<div class="col-lg-3">
							<input disabled value="'.$usuarioAux["telContacto"].'" name="telefono" pattern="^[0-9]{8}$" placeholder="81108123" type="tel" class="form-control" maxlength="8">
						</div>
						<div class="col-lg-1">
							<label>Telefono Movil</label>
						</div>
						<div class="col-lg-3">
							<input disabled value="'.$usuarioAux["telMovil"].'" name="telefono_cel" pattern="^[0-9]{10}$" placeholder="8110812312" type="tel" class="form-control" maxlength="10">
						</div>
					</div>';
                }
                ?>
			</div>
		</div>
	</section>
</section>