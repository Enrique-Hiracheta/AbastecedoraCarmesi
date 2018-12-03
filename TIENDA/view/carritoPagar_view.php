<?php

function saveOrder()
{
	require_once("model/pedido_modelo.php");
    $pedido = new pedidoModel();
    $pedido->insertPedido();
    echo '<script>
        $("#cart").load("custom.php?identificador=producto");
    </script>';
}

//echo json_encode($producto);
//<button id="btnPayPal" class="btn btn-outline-danger floatLeft" type="button" href="#" title="Pagar" onClick="paypal()" style="cursor: pointer; width: 100%; font-size: 0.7em; margin-top: 15px; "><img src="vendor/images/logoPaypal.png" style="width: 100%; height: auto;"/></button>
/*<script>
function ver(){
	var tar = $("#banco_c").val()
    console.log(tar)
    var i = <?php echo $totalPagar; ?>;

    $.get("http://192.168.23.4/Banco/conexion_tienda.php?cuentau="+tar+"&cuentat=1234567873704454&monto="+i+"&sitio=TBarcenas&desc=Compra",
       function(data){
       alert(data);
       });   
  }
<script>
function ver(){
	var tar = $("#banco_c").val()
    console.log(tar)
    var i = <?php echo $totalPagar; ?>;

    $.get("http://192.168.23.5/tienda/"+tar+"/4321582983505152/"+i+"/TBarcenas/Compra",
       function(data){
       alert(data);
       });
  }
</script>

*/

echo '<center class="container"><div class="container">';
foreach ( $_SESSION[ "carrito" ] as $producto ) {
	$totalPagar += $producto[ "precio" ];
	$processProductos ++;
	echo '<div class="col-md-12 contentCarrito">
	<div class="col-md-4 floatLeft imgProductoCarrito">
		<img src="'.$producto[ "imagen" ].'"/></div>
		<div class="col-md-7 floatLeft contentProductoCarrito">
		<a class="row" href="?idProducto='.$producto["idProducto"].'" >'.$producto[ "nombre" ].' </a>
		<div class="row">
		<spam class="descProductCarrito" title="'.$producto[ "descripcion" ].'">'.$producto[ "descripcion" ].'</spam>
		</div>
		</div>
		<button type="button" href="#" onClick="deleteProduct('.$producto["idProducto"].')" title="Quitar producto" style="cursor: pointer;" class="btn btn-outline-danger col-md-1 p-0 floatLeft">
		<i style="float:none;" class="fa fa-times"></i>
		</button>
	</div>';
}

echo '</div>';
echo '<div class="col-md-12 currentCarrito">
		<div class="col-md-12 subTotal"><spam>Subtotal: $</spam>'.number_format(($totalPagar*0.85), 2, ".", " ").'</div>
		<div class="col-md-12 iva"><spam>IVA: $</spam>'.number_format(($totalPagar*0.15), 2, ".", " ").'</div>
		<div class="col-md-12 total"><spam>Total: $</spam>'.number_format(($totalPagar), 2, ".", " ").'</div>
		    <div class="col-lg-1">
    		<label>Tarjeta</label>
    	</div>
    	<div class="col-lg-3">
			<input name="banco_c" id="banco_c" type="text" class="form-control" required/>
	 </div>
    <div class="col-md-2">

    <div class="row">

    </div>
    
    <button id="btnPayPal" class="btn btn-outline-danger floatLeft" type="button" href="#" title="Pagar" onClick="ver()" style="cursor: pointer; width: 100%; font-size: 0.7em; margin-top: 15px; "><img src="vendor/images/logoPaypal.png" style="width: 100%; height: auto;"/></button>
    </div></center>';
  saveOrder();

?>

<script>
function ver(){
	var tar = $("#banco_c").val()
    console.log(tar)
    var i = <?php echo $totalPagar; ?>;

    $.get("http://192.168.43.241/Banco/conexion_tienda.php?cuentau="+tar+"&cuentat=1234567873704454&monto="+i+"&sitio=TBarcenas&desc=Compra",
       function(data){
       alert(data);
       });   
  }
</script>
