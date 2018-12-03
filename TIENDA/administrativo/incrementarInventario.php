<?php
session_start();
if (@!$_SESSION['tipo']==1) {
	header("Location:index.php");    
}
isset( $_GET[ "codigoBuscar" ] ) ? $codigoBuscar = $_GET[ "codigoBuscar" ] : $codigoBuscar = "";
require_once( "funciones/aumentarInventario.php" );
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
                        	<h1><i class="fa fa-users"></i> Producto</h1>
                    </div>
                </div>
            </div>
            <div id="cuerpo">
                <form action="" method="get">
                <div class="row">
                        <div class="col-lg-1">
                            <label>Buscar Codigo</label>
                        </div>
                        <div class="col-lg-3">
                            <input value="<?php echo $codigoBuscar; ?>"  name="codigoBuscar" type="text" class="form-control" maxlength="20" required>
                        </div>
                    </div>
                    <div class="row">
                        <button class="btn btn-outline-success" type="submit">Buscar</button>
                    </div>
                </form>
                
                <?php 
                if(count($productoAu)>0){
                foreach ( $productoAu as $producto ) {
                echo'
                <form action="" method="POST">
                    <div class="row">
                        <div class="col-lg-1">
                            <label>Nombre</label>
                        </div>
                        <div class="col-lg-3">
                            <input disabled value="'.$producto["nombre"].'" name="nombre" type="text" class="form-control" maxlength="20" required>
                        </div>
                        <div class="col-lg-1">
                            <label>Codigo</label>
                        </div>
                        <div class="col-lg-3">
                            <input disabled value="'.$producto["codigo"].'" name="codigo" type="text" class="form-control" maxlength="20" required>
                        </div>
                        <div class="col-lg-1">
                            <label>Descripción</label>
                        </div>
                        <div class="col-lg-3">
                            <input disabled value="'.$producto["descripcion"].'" name="descripcion" type="text" class="form-control" maxlength="20" required/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-1">
                            <label>Inventario</label>
                        </div>
                        <div class="col-lg-3">
                            <input value="'.$producto["inventario"].'" name="inventario" type="text" class="form-control" maxlength="20" required>
                        </div>
                        <input style="visibility:hidden" value="'.$producto["idProducto"].'" name="idProducto" type="text" class="form-control">
                    </div>
                    
                    <div class="row">
                        <button class="btn btn-outline-success" type="submit">Incrementar</button>
                    </div>
                </form>';
                }//Fin for
                }
    ?>
            </div>
        </div>
    </section>
</section>