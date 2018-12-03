<?php
	
	require_once("config.php");

	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	class Conectar{
		
		
		public static function conexion(){
			try{
				$servidor = dataServidor();
				$connexion = new MySQLi($servidor->host, $servidor->usuario,$servidor->password, $servidor->dataBase);
			}catch(Exception $ex){
				die("ERROR: ". $ex->getMessage());
			}

			return $connexion;
		}
	}
?>