<?php
isset( $_POST[ "identificadorP" ] ) ? $identificadorP = $_POST[ "identificadorP" ] : $identificadorP = "";
isset( $_GET[ "identificador" ] ) ? $identificador = $_GET[ "identificador" ] : $identificador = "";

if ( $identificador == "producto" ) {
	
	if ( $identificadorP == "" ) {
		session_start();
		require( "controller/carrito_controller.php" );
	}
	if ( $identificadorP == "addProducto" ) {
		session_start();
		require( "controller/carrito_controller.php" );
	}

	if ( $identificadorP == "deleteProducto" ) {
		session_start();
		require( "controller/carrito_controller.php" );
	}
}

?>