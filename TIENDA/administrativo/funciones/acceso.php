<?php

$acceso = new accesoModel();
$acceso->comprobarAccesoUsuario($usuarioVar, $contraseniaVar);

class accesoModel {

    private $db;
    private $usuario;

    public function __Construct() {
        try {
            require_once( '../model/connect_db.php' );

            $this->db = Conectar::conexion();

            $this->usuario = array();

        } catch ( Exception $ex ) {
            echo $ex->getMessage();
        }
    }

    public function comprobarAccesoUsuario( $usuario, $contrasenia ) {
        //Se comprueba el acceso mediante usuario y contraseña
        try {
            $consulta = $this->db->query( "select * from t_usuario as usu where usu.usuario='" . $usuario . "' and usu.contrasenia='" . $contrasenia . "'" );

            if ( $consulta->num_rows > 0 ) {
                $usuario = $consulta->fetch_assoc();

                //Iniciamos las variables de session
                session_start();
                $_SESSION[ 'id' ] = $usuario[ 'idUsuario' ];
                $_SESSION[ 'usuario' ] = $usuario[ 'usuario' ];
                $_SESSION[ 'tipo' ] = 1;
                
                if ( $_SESSION[ 'tipo' ] == 2 ) {
                    header( 'Location: principal.php' );
                    exit;
                } else {
                    header( 'Location: administrador.php' );
                    exit;
                }
                
            } else {
                echo "<script>";
                echo " fnError('Usuario y/o contraseña incorrectos.');";
                echo "</script>";
            }

        } catch ( Exception $ex ) {
            die( "ERROR: " . $ex->getMessage() );
        }
    }
}
?>