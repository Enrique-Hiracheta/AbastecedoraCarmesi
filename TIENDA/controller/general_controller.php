<?php
if ( !isset( $_SESSION[ "usuarioTienda" ] ) ) {
	if ( isset( $_GET[ "login" ] ) ) {
		echo '<div name="divLogin" class="container" style="margin-top: 7%;width: 40%;">';
		require_once( "login.php" );
		echo '</div>';

	} else if ( isset( $_GET[ "registrar" ] ) ) {
		echo '<div name="divRegistro" class="col-md-12" style="margin-top: 7%; float:left">';
		require_once( "registro.php" );
		echo '</div>';
	}else {
		funcionalidaGeneral();
	}

} else {
	funcionalidaGeneral();
}

function funcionalidaGeneral() {
    if ( isset( $_GET[ "aventura" ] ) ) {
		echo '<div id="contenido" class="col-md-12">';
		require_once( "aventura.php" );
		echo ' </div>';

    } else if ( isset( $_GET[ "consulta" ] ) ) {
        echo '<div id="contenido" class="col-md-12">
        <div id="a" style="float:left;background-color: white;padding: 10px;box-shadow: inset 1px 1px 1px 1px #ADADAD;" class="col-md-12">';
        require_once( 'controller/consulta_controller.php' );
        echo '</div> </div>';
		
    } else if ( isset( $_GET[ "carrito" ] ) &&  isset( $_SESSION["carrito"])  ) {
        echo '<div id="contenido" class="col-md-12">
        <div id="a" style="float:left;background-color: white;padding: 10px;box-shadow: inset 1px 1px 1px 1px #ADADAD;" class="col-md-12">';
        require_once( 'controller/carrito_controller.php' );
        echo '</div> </div>';
		
    }else if ( isset( $_GET[ "correcto" ] ) &&  isset( $_SESSION["carrito"])  ) {
        echo '<div id="contenido" class="col-md-12">';
        require_once( 'controller/PayPalController.php' );
        echo ' </div>';
		
    }else if ( isset( $_GET[ "ficcion" ] ) ) {
		echo '<div id="contenido" class="col-md-12">';
		require_once( "ficcion.php" );
		echo '</div>';
		
	}else if ( isset( $_GET[ "infantil" ] ) ) {
		echo '<div id="contenido"  class="col-md-12">';
		require_once( 'infantil.php' );
		echo ' </div>';
			
	}else if ( isset( $_GET[ "perfil" ] )&&  isset( $_SESSION["idUsuarioTienda"]) ) {
        echo '<div id="contenido" class="col-md-12">';
        require_once( 'controller/perfil_controller.php' );
        echo ' </div>';
    } 
	else if(isset( $_GET[ "registro" ] )){
		echo '<div name="divRegistro" style="margin-top: 7%;">';
		require_once( "registroUsuario.php" );
		echo '</div>';
		
	}else if(isset( $_GET[ "nuevos" ] )){
		echo '<div id="contenido" class= "col-md-12">';
		require_once( "nuevos.php" );
		echo '</div>';
		
	} else {
        echo '<div id="contenido" class="col-md-12">';
        require_once( 'productos.php' );
        echo ' </div>';
    }
}
?>