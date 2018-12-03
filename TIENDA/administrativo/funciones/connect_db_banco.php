<?php

		$connBanco = new MySQLi("localhost", "root","", "bancoDB");
		if ($connBanco -> connect_errno) {
			die( "Fallo la conexión a MySQL: (" . $connBanco -> mysqli_connect_errno() 
				. ") " . $connBanco -> mysqli_connect_error());
		}
?>