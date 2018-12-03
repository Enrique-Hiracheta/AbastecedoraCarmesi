<?php

 function dataServidor(){
	$servidor = new stdClass();
	$servidor->host = "localhost";
	$servidor->usuario = "root";
	$servidor->password = "";
	$servidor->dataBase = "tiendaprueba";
	
	return $servidor;
}

?>