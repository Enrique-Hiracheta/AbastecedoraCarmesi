<?php

$reporteConsultas = new reporteconsultas();

$inventario = $reporteConsultas->getInventario();

class reporteconsultas {

    private $db;
    private $usuario;

    public

    function __Construct() {
        try {
            require_once( '../model/connect_db.php' );

            $this->db = Conectar::conexion();

            $this->pedidos = array();

        } catch ( Exception $ex ) {
            echo $ex->getMessage();
        }
    }

    public  function getInventario() {
        try {
            
                $consulta = $this->db->query( "SELECT * FROM t_producto ORDER BY inventario");
            
            while ( $fila = $consulta->fetch_assoc() ) {
                $this->pedidos[] = $fila;
            }

        } catch ( Exception $ex ) {
            die( "ERROR: " . $ex->getMessage() );
        }

        return $this->pedidos;
    }

}
?>