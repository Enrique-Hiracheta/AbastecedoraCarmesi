<?php

class pedidoModel {

    private $db;
    private $productos;

    public
    function __Construct() {
        try {
            require_once( 'model/connect_db.php' );

            $this->db = Conectar::conexion();

            $this->productos = array();

        } catch ( Exception $ex ) {
            echo $ex->getMessage();
        }
    }

    public
    function insertPedido() {
        try {
            $idUsuario = $_SESSION[ 'idUsuarioTienda' ];
            $fecha = time();
            $fechaFormato = date( "Y-m-d", $fecha );
            $this->db->query( "INSERT INTO t_pedido(fecha, idCliente, total) VALUES('$fechaFormato','$idUsuario',0)" );
            $idPedido = $this->db->insert_id;

            $cart = $_SESSION[ "carrito" ];
            $total =0;
            foreach ( $cart as $producto ) {
                $insProducto = $producto[ 'codigo' ] . " " . $producto[ 'nombre' ];
                $insPrecio = $producto[ 'precio' ];
                $insIdProducto = $producto[ 'idProducto' ];
                $cantidad =1;
                $total += $insPrecio*$cantidad;
                $this->db->query( "INSERT INTO t_pedido_detalle(cantidad, producto, precio, idPedido, idProducto, idCliente, fecha) VALUES('$cantidad','$insProducto','$insPrecio','$idPedido','$insIdProducto','$idUsuario','$fechaFormato')" );
            }
            $this->db->query( "UPDATE t_pedido set total='$total' where idPedido='$idPedido'");
            unset($_SESSION[ "carrito" ]);
        } catch ( Exception $ex ) {
            die( "ERROR: " . $ex->getMessage() );
        }
    }
}

?>