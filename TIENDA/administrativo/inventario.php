<?php
session_start();
if ( @!$_SESSION[ 'tipo' ] == 1 ) {
    header( "Location:index.php" );
}

require_once( "funciones/reporteAlmacen.php" );


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
                        <h1><i class="fa fa-book"></i> Reporte Inventario</h1>
                    </div>
                </div>
            </div>
            <div id="cuerpo">
               
                <!-- Tablas -->
                <div class="row" id="dvData">
                    <?php
                    
                        echo '<table class="table table table-striped table-bordered table-hover">
                        <tr>
                            <th>Nombre</th>
                            <th>Codigo</th>
                            <th>Descripción</th>
                            <th>Precio</th>
                            <th>Disponible</th>
                            <th>Estatus</th>
                        </tr>';
                        //repetir por inventario

                        foreach ( $inventario as $producto ) {
                            echo '<tr>
                            <th>'.$producto["nombre"].'</th>
                            <th>'.$producto["codigo"].'</th>
                            <th>'.$producto["descripcion"].'</th>
                            <th>$'.$producto["precio"].'</th>
                            <th>'.$producto["inventario"].'</th>';
                            
                            if($producto["inventario"]== 0){
                                echo '<th  class="bg-danger text-white">Malo</th>';
                            }else if($producto["inventario"] <$producto["puntoReorden"]){
                                echo '<th  class="bg-warning text-white">Bueno</th>';
                            }else{
                                echo '<th  class="bg-success text-white">Muy Bueno</th>';
                            }
                        echo '</tr>';
                        }

                        
                        echo '</table>';
                     
                    ?>
                    <!-- Fin repetir por cliente-->

                </div>
                <div class="row">
                    <input class="btn btn-success" type="button" id="btnExport" value="Exportar a Excel"/>
                    <BR><BR>
                    <a href="export_pdf_inventario.php" class="link-btn">Exportar a PDF</a>
                </div>
            </div>
        </div>
    </section>
</section>

<script>
    $( "#btnExport" ).click( function ( e ) {
        window.open( 'data:application/vnd.ms-excel,' + encodeURIComponent( $( '#dvData' ).html() ) );
        e.preventDefault();
    } );
</script>