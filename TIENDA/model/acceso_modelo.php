<?php


class accesoModel{

	private $db;
	private $usuario;
	
	public function __Construct(){
		try{
			require_once('connect_db.php');
			
			$this->db = Conectar::conexion();
			
			$this->usuario = array();
			
		}catch(Exception $ex){
			echo $ex->getMessage();
		}
	}

	public function comprobarAccesoUsuario($usuario, $contrasenia){
		//Se comprueba el acceso mediante usuario y contraseña
		try{
			$consulta = $this->db->query("select * from t_cliente as cliente where cliente.usuario='".$usuario."' and cliente.contrasenia='".$contrasenia."'");
			
			if($consulta->num_rows>0){
				$usuario=$consulta->fetch_assoc();
				
				//Iniciamos las variables de session
				session_start();
				$_SESSION['usuarioTienda']=$usuario["nombre"]." ".$usuario["apellidoPaterno"];
                $_SESSION['idUsuarioTienda']=$usuario["idCliente"];
                
				//Al hacer return se regresa "" por lo cual en la comprobacion de if(!data) es falso
				 return;
			}else{
				throw new Exception('ACCESO DENEGADO');
			}

		}catch(Exception $ex){
			die("ERROR: ". $ex->getMessage());
		}
	}

	public function comprobarAccesoCorreo(){
		//Se comprueba el acceso mediante correo y contraseña
	}
    
    function agregarCarrito( $producto ) {
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
        //echo json_encode( $_SESSION["carrito"]);
    }
}
}
?>