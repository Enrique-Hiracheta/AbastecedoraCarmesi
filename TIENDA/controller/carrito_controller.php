<?php
isset( $_POST[ "idProducto" ] ) ? $idProducto = $_POST[ "idProducto" ] : $idProducto = "";

require_once( "model/producto_modelo.php" );
$productos = new productoModel();

if ( $idProducto != "" ) {
    if ( $identificadorP == "addProducto" ) {
        $dataProducto = $productos->getProductoForId( $idProducto );
        if ( count( $dataProducto ) > 0 ) {
            if($dataProducto[0]["inventario"]>0){
                agregarCarrito( $dataProducto, $productos );
            }else{
                echo 'El producto no se encuentra disponible';
            }
        }
    } else {
        deleteCarrito( $idProducto, $productos );
    }
} else if ( isset( $_GET[ "carrito" ] ) ) {
    pagarCarrito();
} else {

    if ( !isset( $_SESSION[ "carrito" ] ) || count( $_SESSION[ "carrito" ] ) == 0 ) {
        echo '<button type="button" data-toggle="dropdown" data-loading-text="Loading..." class="dropdown-toggle">	
				<i class="fa fa-shopping-cart"></i> 	
				<strong>Shopping Cart:</strong>
				<span id="cart-total">0 item(s) - $0.00</span>	
				<span id="cart-total2">0</span>
			</button>
			<ul class="dropdown-menu float-right">
				<li class="dropdown-item">
					<p class="text-center">¡Su cesta está vacía!</p>
				</li>
			</ul>';
    } else {
        echo '<button type="button" data-toggle="dropdown" data-loading-text="Loading..." class="dropdown-toggle">	
				<i class="fa fa-shopping-cart"></i> 	
				<strong>Shopping Cart:</strong>
				<span id="cart-total">0 item(s) - $0.00</span>	
				<span id="cart-total2">' . count( $_SESSION[ "carrito" ] ) . '</span>
			</button>
			<div style="width: 300px;" class="dropdown-menu float-right">';
        mostrarCarrito();
        echo '</div>';

    }
}


function agregarCarrito( $producto, $productos ) {
    //session_start();
    //unset($_SESSION["carrito"]);
    if(!isset( $_SESSION[ "usuarioTienda" ])){
        echo 'Debe de iniciar sesión primero';
        exit();
    }
    if ( !isset( $_SESSION[ "carrito" ] ) || count( $_SESSION[ "carrito" ] ) == 0 ) {
        $_SESSION[ "carrito" ] = array();
    }

    $idCarrito = "id_" . $producto[ 0 ][ "idProducto" ];
    if ( isset( $_SESSION[ "carrito" ][ $idCarrito ] ) ) {
        //DEFINIR BIEN QUE SE HARA CUANDO SE INTENTE AGREGAR DE NUEVO EL MISMO PRODUCTO
        echo "El producto ya existe";
    } else {
        //SE UTILIZA EL INDICE 0 PORQUE SE REGRESA UN ARRAY
        $_SESSION[ "carrito" ][ $idCarrito ] = $producto[ 0 ];
        $cantidad = $producto[0]["inventario"] - 1;
        $idProducto = $producto[0]["idProducto"];
        $productos->addCantidadCarrito($idProducto, $cantidad);
        //echo json_encode( $_SESSION["carrito"]);
    }
}

function mostrarCarrito() {
    //session_start();
    $processProductos = 0;
    $totalPagar = 0;
    require_once( "view/carrito_view.php" );

}

function pagarCarrito() {
    //session_start();
    $processProductos = 0;
    $totalPagar = 0;
    require_once( "view/carritoPagar_view.php" );

}

function deleteCarrito( $producto, $productos ) {
    //session_start();
    if ( $producto == 0 ) {
        unset( $_SESSION[ "carrito" ] );
        echo 1;
    } else {
        $idCarrito = "id_" . $producto;
        $productos->deleteCantidadCarrito($producto);
        unset( $_SESSION[ "carrito" ][ $idCarrito ] );
    }
}
?>