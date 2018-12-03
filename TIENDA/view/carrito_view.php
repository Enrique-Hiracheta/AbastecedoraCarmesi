<?php
//echo json_encode($producto);

echo '<div class="row" style="margin-right:0px;max-height:300px;overflow-y: auto;">';
foreach ( $_SESSION[ "carrito" ] as $producto ) {
	$totalPagar += $producto[ "precio" ];
	$processProductos ++;
	echo '<div class="col-md-12 contentCarrito">
	<div class="col-md-4 floatLeft imgProductoCarrito">
		<img src="'.$producto[ "imagen" ].'"/></div>
		<div class="col-md-7 floatLeft contentProductoCarrito">
		<spam class="row">'.$producto[ "nombre" ].' </spam>
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
	 </div>
    <div class="col-md-12">
    <button class="btn btn-outline-danger floatLeft" type="button" href="#" title="Pagar" onClick="carrito()" style="cursor: pointer; width: 100%; font-size: 0.7em; margin-top: 15px;">Pagar</button>
    <button class="btn btn-outline-danger floatLeft" type="button" href="#" onClick="deleteProduct(0)" title="Quitar producto" style="cursor: pointer; width: 100%; font-size: 0.7em; margin-top: 15px;">Vaciar Carrito</button>
    </div>';

?>
