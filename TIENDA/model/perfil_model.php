<?php


$perfilUser = new perfilModel();

$usuario = $perfilUser->getPerfil();

class perfilModel {

    private $db;
    private $productos;

    public
    function __Construct() {
        try {
            require_once( 'model/connect_db.php' );

            $this->db = Conectar::conexion();

            $this->perfil = array();

        } catch ( Exception $ex ) {
            echo $ex->getMessage();
        }
    }

    public
    function getPerfil() {
        try {
            
            $idCliente = $_SESSION[ 'idUsuarioTienda' ];
            $consulta = $this->db->query("SELECT * FROM t_cliente where idCliente='$idCliente'");

			while($fila=$consulta->fetch_assoc()){
				$this->perfil[]=$fila;
			}
            
            return $this->perfil;

        } catch ( Exception $ex ) {
            die( "ERROR: " . $ex->getMessage() );
        }
    }
}

?>