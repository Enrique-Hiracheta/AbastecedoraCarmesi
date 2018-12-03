<?php
isset( $_GET[ "consulta" ] ) ? $busqueda = $_GET[ "consulta" ] : $busqueda = "";

require_once( "model/producto_modelo.php" );

$productos = new productoModel();

$dataProductos = $productos->getProductoBusqueda( $busqueda );

if ( $busqueda == "" || count( $dataProductos ) == 0 ) {
    echo '<h1> No se encontraron articulos relacionados con "'.$busqueda.'"</h1>';
    
}else{
    require_once("view/busqueda_view.php");
}

?>