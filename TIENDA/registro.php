<section id="main-content">
	<section class="wrapper">
		<div id="usuarios" class="col-md-12">
			<div id="cuerpo">
				<form action="?registro=1" method="POST">
					<div class="row">
						<div class="col-lg-1">
							<label>Nombre de usuario</label>
						</div>
						<div class="col-lg-3">
							<input name="usuario" type="text" class="form-control" maxlength="20" required>
						</div>
						<div class="col-lg-1">
							<label>Contraseña</label>
						</div>
						<div class="col-lg-3">
							<input name="contrasenia" type="text" class="form-control" maxlength="20" required>
							<br></br>
						</div>

					</div>
					<div class="row">
						<div class="col-lg-1">
							<label>Nombre</label>
						</div>
						<div class="col-lg-3">
							<input name="nombre" type="text" class="form-control" maxlength="20" required>
						</div>
						<div class="col-lg-1">
							<label>Apellido Paterno</label>
						</div>
						<div class="col-lg-3">
							<input name="apellidoPaterno" type="text" class="form-control" maxlength="20" required>
						</div>
						<div class="col-lg-1">
							<label>Apellido Materno</label>
						</div>
						<div class="col-lg-3">
							<input name="apellidoMaterno" type="text" class="form-control" maxlength="20" required>
						</div>
					</div>
					<br></br>
					<div class="row">
						<div class="col-lg-1">
							<label>RFC</label>
						</div>
						<div class="col-lg-3">
							<input name="rfc" type="text" placeholder="BADD110313HCMLNS09" class="form-control" maxlength="18" required>
						</div>
						<div class="col-lg-1">
							<label>E- Mail</label>
						</div>
						<div class="col-lg-3">
							<input name="email" type="email" placeholder="correo@dominio.com" class="form-control" maxlength="30" required>
						</div>
						<div class="col-md-1">
							<label>Método de pago</label>
						</div>
						<div class="col-md-2.5">
							<select name="formaPago" required>
								
								<option value="1" selected>Efectivo</option>
								<option value="2" selected	>Transferencia</option>
							</select>
						</div>
					</div>
					<br></br>
					<div class="row">
						<div class="col-lg-1">
							<label>Telefono casa</label>
						</div>
						<div class="col-lg-3">
							<input name="telContacto" pattern="^[0-9]{8}$" placeholder="81108123" type="tel" class="form-control" maxlength="8" required>
						</div>
						<div class="col-lg-1">
							<label>Telefono Movil</label>
						</div>
						<div class="col-lg-3">
							<input name="telMovil" pattern="^[0-9]{10}$" placeholder="8110812312" type="tel" class="form-control" maxlength="10" required>
						</div>
					</div>
					<div>
						<center>
							<br></br>
							<input class="btn btn-outline-success" type="submit">
								</input>
							<input class="btn btn-outline-success" type="reset"></input>

						</center>
					</div>

				</form>
			</div>
		</div>
	</section>
</section>