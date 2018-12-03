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
        <div id="usuarios">
            <div class="encabezado">
                <div class="row">
                    <div class="col-lg-6">
                        	<h1><i class="fa fa-users"></i> Administración</h1>
                    </div>
                </div>
            </div>
            <div id="cuerpo">Administrador </div>
        </div>
    </section>
</section>