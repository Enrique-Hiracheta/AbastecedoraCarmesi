<?php

isset( $_GET[ "anio" ] ) ? $anio = $_GET[ "anio" ] : $anio = "";
isset( $_GET[ "mes" ] ) ? $mes = $_GET[ "mes" ] : $mes = "";
isset( $_GET[ "cliente" ] ) ? $idCliente = $_GET[ "cliente" ] : $idCliente = "";
isset( $_GET[ "detallado" ] ) ? $detallado = $_GET[ "detallado" ] : $detallado = "";



$pedido = new reporteModel();

$clientes = $pedido->getClientes();

if ( $_SERVER[ 'REQUEST_METHOD' ] == 'GET' ) {
    if($detallado==0){
        $resPedidos = $pedido->getPedido( $anio, $mes, $idCliente );
    }else{
        $resPedidos = $pedido->getPedidoDetallado( $anio, $mes, $idCliente );
    }
}

class reporteModel {

    private $db;
    private $usuario;

    public

    function __Construct() {
        try {
            require_once( '../model/connect_db.php' );

            $this->db = Conectar::conexion();

            $this->pedidos = array();
            $this->clientes = array();

        } catch ( Exception $ex ) {
            echo $ex->getMessage();
        }
    }

    public

    function getPedido( $anio, $mes, $cliente ) {
        try {
            if ( $cliente == 'true' && $mes == 'true' ) {
                $consulta = $this->db->query( "SELECT idCliente, fecha, SUM(total) AS total FROM t_pedido where YEAR(fecha) = '$anio'  GROUP BY MONTH(fecha), idCliente ORDER BY idCliente, MONTH(fecha) " );
            } else if ( $mes == 'true' && cliente != 'true' ) {
                $consulta = $this->db->query( "SELECT idCliente, fecha, SUM(total) AS total FROM t_pedido where YEAR(fecha) = '$anio' and idCliente='$cliente' GROUP BY MONTH(fecha), idCliente ORDER BY idCliente, MONTH(fecha)" );
            } else if ( $mes != 'true' && $cliente == 'true' ) {
                $consulta = $this->db->query( "SELECT idCliente, fecha, SUM(total) AS total FROM t_pedido where YEAR(fecha) = '$anio' and  MONTH(fecha) = '$mes' GROUP BY MONTH(fecha), idCliente ORDER BY idCliente, MONTH(fecha)" );
            } else {
                $consulta = $this->db->query( "SELECT idCliente, fecha, SUM(total) AS total FROM t_pedido where YEAR(fecha) = '$anio' and  MONTH(fecha) = '$mes' and idCliente='$cliente' GROUP BY MONTH(fecha), idCliente ORDER BY idCliente, MONTH(fecha)" );
            }


            while ( $fila = $consulta->fetch_assoc() ) {
                $this->pedidos[] = $fila;
            }

        } catch ( Exception $ex ) {
            die( "ERROR: " . $ex->getMessage() );
        }

        return $this->pedidos;
    }
    
    function getPedidoDetallado( $anio, $mes, $cliente ) {
        try {
            if ( $cliente == 'true' && $mes == 'true' ) {
                $consulta = $this->db->query( "SELECT precio, cantidad, producto, idCliente, fecha FROM t_pedido_detalle where YEAR(fecha) = '$anio'  ORDER BY idCliente, MONTH(fecha), DAY(fecha)" );
            } else if ( $mes == 'true' && cliente != 'true' ) {
                $consulta = $this->db->query( "SELECT precio, cantidad, producto, idCliente, fecha FROM t_pedido_detalle where YEAR(fecha) = '$anio' and idCliente='$cliente' ORDER BY idCliente, MONTH(fecha), DAY(fecha)" );
            } else if ( $mes != 'true' && $cliente == 'true' ) {
                $consulta = $this->db->query( "SELECT precio, cantidad, producto, idCliente, fecha FROM t_pedido_detalle where YEAR(fecha) = '$anio' and  MONTH(fecha) = '$mes' ORDER BY idCliente, MONTH(fecha), DAY(fecha)" );
            } else {
                $consulta = $this->db->query( "SELECT precio, cantidad, producto, idCliente, fecha FROM t_pedido_detalle where YEAR(fecha) = '$anio' and  MONTH(fecha) = '$mes' and idCliente='$cliente' ORDER BY idCliente, MONTH(fecha), DAY(fecha)" );
            }


            while ( $fila = $consulta->fetch_assoc() ) {
                $this->pedidos[] = $fila;
            }

        } catch ( Exception $ex ) {
            die( "ERROR: " . $ex->getMessage() );
        }

        return $this->pedidos;
    }
    
    function getClientes() {
        try {
            
                $consulta = $this->db->query( "SELECT * FROM t_cliente" );
            
            while ( $fila = $consulta->fetch_assoc() ) {
                $this->clientes[] = $fila;
            }

        } catch ( Exception $ex ) {
            die( "ERROR: " . $ex->getMessage() );
        }

        return $this->clientes;
    }

}
?>