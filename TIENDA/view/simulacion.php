<?php

$host = "127.0.0.1";
$user = "root";
$pw = "";
$db = "tiendaprueba";
$aux = 1;

$con = mysqli_connect($host, $user, $pw) or die("Problema al conectar");
mysqli_select_db($con, $db) or die("Problema al conectar a la base de datos");


function simular() {
	mysqli_query($con, "INSERT INTO t_pedido_detalle (idPedidoDetalle, cantidad, producto, idPedido, idProducto, idCliente, fecha) VALUES () ") or die("Problema al conectar a la base de datos");
}

 
//for ($i = 1; $i <= 10; $i++) {
	simular();
//}

?>