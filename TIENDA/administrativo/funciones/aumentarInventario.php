<?php


isset( $_POST[ "idProducto" ] ) ? $idProducto = $_POST[ "idProducto" ] : $idProducto = "";
isset( $_POST[ "inventario" ] ) ? $inventario = $_POST[ "inventario" ] : $inventario = "";

$inventarioMax = new aumentarInventario();
$productoAu = array();

if($idProducto != "" && $inventario != ""){
    $inventarioMax->aumentarInventario($idProducto, $inventario);
    unset($_POST[ "idProducto" ]);
    unset($_POST[ "inventario" ]);
    $productoAu = $inventarioMax->getInventario($codigoBuscar);
    
}else{
    $productoAu = $inventarioMax->getInventario($codigoBuscar);
}

class aumentarInventario {

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

    public  function aumentarInventario($idProducto, $cantidad) {
        try {
                $consulta = $this->db->query( "Update t_producto set inventario='$cantidad' where idProducto='$idProducto'");
         } catch ( Exception $ex ) {
            die( "ERROR: " . $ex->getMessage() );
        }

    }
    
    public  function getInventario($codigo) {
        try {
            
                $consulta = $this->db->query( "SELECT * FROM t_producto where codigo='$codigo'");
            
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