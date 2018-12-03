<?php
session_start();
if (@!$_SESSION['tipo']==1) {
	header("Location:index.php");
}
?>

<div class="menuPpal">
	<?php require_once 'templates/header.php'; ?>
</div>
<div>
	<?php require_once 'templates/menuAdmin.html'; ?>
</div>


<section id="main-content">
    <section class="wrapper">
        <div id="usuarios" class="col-md-12">
            <div class="encabezado">
                <div class="row">
                    <div class="col-lg-6">
                        	<h1><i class="fa fa-users"></i> Alta Usuario</h1>
                    </div>
                </div>
            </div>
            <div id="cuerpo">
                <form id="altaUsuario" method="post" action="#">
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
                            <input name="apellidoMaterno" type="text" class="form-control" maxlength="20">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-1">
                            <label>Edad</label>
                        </div>
                        <div class="col-lg-3">
                            <input name="edad" type="text" pattern="^[0-9]{2}$" placeholder="25" class="form-control" maxlength="20" required>
                        </div>
                        <div class="col-lg-1">
                            <label>Sexo</label>
                        </div>
                        <div class="col-lg-3">
                            <input name="sexo" type="radio" value="Hombre" name="altaUsuario" required>Hombre
                            <input name="sexo" type="radio" value="Mujer" name="altaUsuario" required>Mujer</div>
                        <div class="col-lg-1">
                            <label>CURP</label>
                        </div>
                        <div class="col-lg-3">
                            <input name="curp" type="text" placeholder="BADD110313HCMLNS09" class="form-control" maxlength="18" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-1">
                            <label>Telefono casa</label>
                        </div>
                        <div class="col-lg-3">
                            <input name="telefono" pattern="^[0-9]{8}$" placeholder="81108123" type="tel" class="form-control" maxlength="8">
                        </div>
                        <div class="col-lg-1">
                            <label>Telefono Movil</label>
                        </div>
                        <div class="col-lg-3">
                            <input name="telefono_cel" pattern="^[0-9]{10}$" placeholder="8110812312" type="tel" class="form-control" maxlength="10">
                        </div>
                        <div class="col-lg-1">
                            <label>E- Mail</label>
                        </div>
                        <div class="col-lg-3">
                            <input name="email" type="email" placeholder="correo@dominio.com" class="form-control" maxlength="20">
                        </div>
                    </div>
                    <div class="row">
                        <button class="btn btn-outline-success" type="submit">Registrar</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</section>
 