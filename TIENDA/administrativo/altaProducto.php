<?php
session_start();
if ( @!$_SESSION[ 'tipo' ] == 1 ) {
	header( "Location:index.php" );
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
						<h1><i class="fa fa-users"></i> Alta Producto</h1>
					</div>
				</div>
			</div>
			<div id="cuerpo">
				<form action="valida_foto.php" method="POST" enctype="multipart/form-data">
					<div class="row">
						<div class="col-lg-1">
							<label>Nombre</label>
						</div>
						<div class="col-lg-3">
							<input name="nombre" type="text" class="form-control" maxlength="50	" required>
						</div>
						<div class="col-lg-1">
							<label>Codigo</label>
						</div>
						<div class="col-lg-3">
							<input name="codigo" type="text" class="form-control" maxlength="20" required>
						</div>
						<div class="col-lg-1">
							<label>Descripción</label>
						</div>
						<div class="col-lg-3">
							<input name="descripcion" type="text" class="form-control" maxlength="100" required/>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-1">
							<label>Codigo Barras</label>
						</div>
						<div class="col-lg-3">
							<input name="codigoBarras" type="text" class="form-control" maxlength="20" required/>
						</div>
						<div class="col-lg-1">
							<label>Punto de reorden</label>
						</div>
						<div class="col-lg-3">
							<input name="puntoReorden" type="text" class="form-control" maxlength="20" required/>
						</div>
						<div class="col-lg-1">
							<label>Precio</label>
						</div>
						<div class="col-lg-3">
							<input name="precio" type="text" class="form-control" maxlength="18" required>
						</div>
					</div> 
					                    <div class="row">
                        <div class="col-lg-1">
                            <label>Inventario</label>
                        </div>
                        <div class="col-lg-3">
                            <input name="inventario" type="text" class="form-control" maxlength="20" required>
                        </div>
                    </div>
					<div class="row">
						<div class="col-lg-1">
							<label>Imagen</label>
						</div>
						<div class="col-lg-3">
							<input name="foto" accept=".jpg, .jpeg, .png" type="file" class="form-control" required>
						</div>
						<div class="col-lg-1">
							<label>Categoria</label>
						</div>
						<div class="col-lg-3">
							<input name="categoria" type="text" class="form-control" maxlength="18" required>
						</div>
						<div class="col-lg-1">
							<label>Anio</label>
						</div>
						<div class="col-lg-2">
							<input name="anio" type="text" class="form-control" maxlength="18" required>
						</div>
					</div>
					<div class="row">
						<button class="btn btn-outline-success" " type="submit ">Registrar</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</section>