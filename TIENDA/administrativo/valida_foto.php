<?php
require_once 'funciones/connect_db_tienda.php';
$nom=$_REQUEST["nombre"];
$codigo=$_REQUEST["codigo"];
$descripcion=$_REQUEST["descripcion"];
$codigoBarras=$_REQUEST["codigoBarras"];
$puntoReorden=$_REQUEST["puntoReorden"];
$precio=$_REQUEST["precio"];
$categoria=$_REQUEST["categoria"];
$anio=$_REQUEST["anio"];
$inventario=$_REQUEST["inventario"];

$foto=$_FILES["foto"]["name"];
$ruta=$_FILES["foto"]["tmp_name"];
$tipo=$_FILES["foto"]["type"]=="image/png" ? ".png" : ".jpg";
$destino="imagenes/".$nom."".$tipo;

$comprobar = mysqli_query($connTienda,"INSERT INTO t_producto (nombre,codigo,descripcion,codigoBarras,puntoReorden,precio,categoria,anio,inventario,imagen) values('$nom','$codigo','$descripcion','$codigoBarras','$puntoReorden','$precio','$categoria','$anio','$inventario','$destino')");
if($comprobar){
	copy($ruta,'../'.$destino);
	header("Location: index.php");
}else{
	printf("Errormessage: %s\n", $connTienda->error);
	echo "Error no se pudo guardar el registro";
}
?>
