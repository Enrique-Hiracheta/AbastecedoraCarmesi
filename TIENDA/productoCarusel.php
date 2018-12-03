<?php

require_once( "model/producto_modelo.php" );

$categoria = new productoModel();

$dataProductos = $categoria->getProducto();
foreach ( $dataProductos as $categoria ) {
	?>
	<div>
		<div class=productoDetalle>
			<div class="contenidoPro transition" style="position: relative;">
				<div class="imgProducto">
					<img class="img-responsibe zoom "src= "<?php echo $categoria["imagen"] ?>"/>
				</div>
				<div class="caption">
					<div class="name">
						<?php echo '<a>'.$categoria["nombre"]; ?>
						</a>
					</div>
					<div class="price">
						<span class="price-new">$<?php echo $categoria["precio"] ?></span>
					</div>
				</div>
							<div class="cart-button">
				<button href="#" onClick="addProduct(<?php echo $categoria["idProducto"] ?>)" class="btn btn-add" type="button">
					<i class="fa fa-shopping-cart"></i> 
				</button>
				<script type="text/javascript">
						$( document ).ready( function () {
							$( '[data-toggle="popover"]' ).popover();

						} );
					</script>
					<button data-toggle="popover" data-content= "<?php echo $categoria["descripcion"] ?> " type="button" class="btn btn-info">
					<i class="fa fa-info"></i>
					</button>
				<div class="clear"></div>
			</div>


				<div class="clear"></div>
			</div>

		</div>
	</div>
	<?php }?>