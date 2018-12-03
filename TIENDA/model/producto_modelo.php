<?php

class productoModel{
	
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
	
	public function getProducto(){
		try{
			$consulta = $this->db->query("SELECT * FROM t_producto ORDER by idProducto DESC");

			while($fila=$consulta->fetch_assoc()){
				$this->productos[]=$fila;
			}

		}catch(Exception $ex){
				die("ERROR: ". $ex->getMessage());
			}
		
		return $this->productos;
	}
    
    public function getProductoBusqueda($busqueda){
		try{
			$consulta = $this->db->query("SELECT * FROM t_producto WHERE nombre LIKE '%".$busqueda."%'");

			while($fila=$consulta->fetch_assoc()){
				$this->productos[]=$fila;
			}

		}catch(Exception $ex){
				die("ERROR: ". $ex->getMessage());
			}
		
		return $this->productos;
	}
	
	public function getProductoForId($idProducto){
		$fila =null;
		try{
			$consulta = $this->db->query("SELECT * FROM t_producto where idProducto='".$idProducto."'");

			while($fila=$consulta->fetch_assoc()){
				$this->productos[]=$fila;
			}

		}catch(Exception $ex){
				die("ERROR: ". $ex->getMessage());
		}
		return $this->productos;
	}
    
	public function getProductoCategoria($categoria){
		try{
			$consulta = $this->db->query("SELECT * FROM t_producto  WHERE categoria like '$categoria'");

			while($fila=$consulta->fetch_assoc()){
				$this->categoria[]=$fila;
			}

		}catch(Exception $ex){
				die("ERROR: ". $ex->getMessage());
			}
		
		return $this->categoria;
	}
    
	    
    public function getProductoNuevo($nuevo){
		try{
			$nuevo = $this->db->query("SELECT * FROM t_producto  WHERE anio like '$nuevo'");

			while($fila=$nuevo->fetch_assoc()){
				$this->categoria[]=$fila;
			}

		}catch(Exception $ex){
				die("ERROR: ". $ex->getMessage());
			}
		
		return $this->categoria;
	}
	
    public function addCantidadCarrito($idProducto, $inventario){
        
        try{
			$this->db->query("UPDATE t_producto set inventario='".$inventario."' where idProducto='".$idProducto."'");

		}catch(Exception $ex){
				die("ERROR: ". $ex->getMessage());
		}
    }
    
    public function deleteCantidadCarrito($idProducto){
        
        try{
			$this->db->query("UPDATE t_producto set inventario=inventario+1 where idProducto='".$idProducto."'");

		}catch(Exception $ex){
				die("ERROR: ". $ex->getMessage());
		}
    }
}


?>