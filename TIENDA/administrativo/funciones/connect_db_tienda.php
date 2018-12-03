<?php

		$connTienda = new MySQLi("localhost", "root","", "tiendaprueba");
		if ($connTienda -> connect_errno) {
			die( "Fallo la conexión a MySQL: (" . $connTienda -> mysqli_connect_errno() 
				. ") " . $connTienda -> mysqli_connect_error());
            exit();
		}
?>