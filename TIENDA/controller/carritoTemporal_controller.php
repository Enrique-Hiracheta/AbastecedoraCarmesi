<?php
        require_once( "model/carritoTemporal_modelo.php" );
        $carritoTemporal= new carritoTemporalModel();
        $carritoTemporal->insertProducto($producto[ 0 ][ "idProducto" ]);

        //Cargar carrito si existe
                $consulta = $this->db->query("select * from t_carritotemporal where idUsuario='".$_SESSION['idUsuarioTienda']."'");
                
                require_once( "producto_modelo.php" );
                $productos = new productoModel();
                
                foreach ( $consulta as $producto ) {
                    $dataProducto = $productos->getProductoForId( $producto["idProducto"] );
                    if ( count( $dataProducto ) > 0 ) {
                        agregarCarrito( $dataProducto );
                    }
                }//Fin carga carrito temporal
?>