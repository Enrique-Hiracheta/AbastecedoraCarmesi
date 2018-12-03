<?php

$usuario = $_POST["usuario"];
$contrasenia = $_POST[ "contrasenia" ];
$nombre = $_POST[ "nombre" ];
$apellidoPaterno = $_POST[ "apellidoPaterno" ];
$apellidoMaterno = $_POST[ "apellidoMaterno" ];
$rfc =$_POST[ "rfc" ];
$telContacto = $_POST[ "telContacto" ];
$telMovil = $_POST[ "telMovil" ];
$email = $_POST[ "email" ];
$formaPago = $_POST[ "formaPago" ];
 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tiendaprueba";

//create connection
$conn = new mysqli( $servername, $username, $password, $dbname );
// Check connection
if ( $conn->connect_errno ) {
	die( "Connection fallida: " . $conn->connect_errno );
	echo "no se puede conectar la base de datos";
}

//consultar que no exista el registro:
$consultaU = "SELECT * FROM t_cliente WHERE usuario='$usuario'";
$usu = mysqli_query( $conn, $consultaU );

//consultar que no exista el email:
$consultaE = "SELECT * FROM t_cliente WHERE email='$email'";
$correo = mysqli_query( $conn, $consultaE );

//consultar que no exista el rfc:
$consultaR = "SELECT * FROM t_cliente WHERE rfc='$rfc'";
$conRfc = mysqli_query( $conn, $consultaR );

if ( mysqli_num_rows( $usu ) != 0 ) {
	echo htmlspecialchars_decode('
	<center>
		<h1><i class="fa fa-hand-paper-o"></i> Ya existe el usuario</h1>
	</center>');
} else if ( mysqli_num_rows( $correo ) != 0 ) {
		echo htmlspecialchars_decode('
	<center>
		<h1> El correo ya existe</h1>
	</center>');
} else if ( mysqli_num_rows( $conRfc ) != 0 ) {
	echo htmlspecialchars_decode('
	<center>
		<h1>El RFC ya existe</h1>

	</center>');
} else {
	$sql = "INSERT INTO t_cliente(apellidoMaterno,apellidoPaterno,email, nombre,rfc, telContacto, telMovil,usuario,contrasenia,formaPago) VALUES('$apellidoMaterno','$apellidoPaterno','$email','$nombre','$rfc','$telContacto','$telMovil','$usuario','$contrasenia','$formaPago')";

	if ( mysqli_query( $conn, $sql ) ) {
			echo '
	<center>
		<h1> Registro exitoso</h1>
	</center>';
	} else {
		echo "Error: " . $sql . "" . mysqli_error( $conn );
	}
}
?>