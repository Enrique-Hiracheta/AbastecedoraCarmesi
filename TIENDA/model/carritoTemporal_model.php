<?php

class carritoTemporalModel{
	
	private $db;
	private $productos;
	
	public function __Construct(){
		try{
			require_once('model/connect_db.php');
			
			$this->db = Conectar::conexion();
			
			$this->productos = array();
			
		}catch(Exception $ex){
			echo $ex->getMessage();
		}
	}
	
	public function insertProducto($idProducto){
		try{
            $idUsuario = $_SESSION['idUsuarioTienda'];
			$this->db->query("INSERT INTO t_carritotemporal VALUES('$idUsuario','$idProducto')");

		}catch(Exception $ex){
				die("ERROR: ". $ex->getMessage());
			}
		
		return $this->productos;
	}
}

?>