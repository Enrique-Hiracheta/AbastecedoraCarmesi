<script src="vendor/owl-carousel/owl.carousel.js"></script>
<link rel="stylesheet" href="vendor/owl-carousel/owl.carousel.css"/>
<link rel="stylesheet" href="vendor/owl-carousel/owl.theme.default.css"/>
<link rel="stylesheet" href="vendor/owl-carousel/animate.css"/>

<div class="box latest">
	<div class="box-heading">
		<h3> Informacion del libro </h3>
	</div>
</div>
<div class="owl-carousel owl-theme">
	<?php

require_once( "model/producto_modelo.php" );

$infantiles= 'infantil';
$categoria = new productoModel();

$dataProductos = $categoria->getProductoInfo($infantiles);
foreach ( $dataProductos as $categoria ) {
	?>
	<div>
		<div class=productoDetalle>
			<div class="contenidoPro transition" style="position: relative;">
				<div class="imgProducto">
					<img class="img-responsibe zoom src="<?php echo $categoria["imagen"] ?>""/>
				</div>
				<div class="overlay">
					<div class="text">Prueba</div>
				</div>

				<div class="caption">
					<div class="name">
						<?php echo '<a href="?producto='.$categoria["idProducto"].'">'.$categoria["nombre"]; ?>
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
				<a class="btn details" href="?info=1" >
					<i class="fa fa-info"></i> 
				</a>
				<div class="clear"></div>
			</div>


				<div class="clear"></div>
			</div>

		</div>
	</div>
	<?php }?>
</div>

<div class="parallax" name="img-scroll" id="img-scroll">
	<div id="imagen">
		<div class="container">
			<h1>Se venden sueños, ideas y fantasias en forma de hojas de papel.</h1>
		</div>
	</div>
</div>

<script>
	var owl = $( ".owl-carousel" );
	$( document ).ready( function () {
		owl.owlCarousel( {
			animateOut: 'slideOutDown',
			animateIn: 'flipInX',
			loop: true,
			rtl: false,
			margin: 10,
			nav: false,
			responsiveRefreshRate: true,
			responsive: {
				0: {
					items: 1
				},
				768: {
					items: 3
				},
				960: {
					items: 4
				},
				1200: {
					items: 5
				},
				1920: {
					items: 8
				}
			}
		} );
	} );

	$( '#l_next' ).click( function () {
		owl.trigger( 'next.owl.carousel' );
	} );
	// Go to the previous item
	$( '#l_prev' ).click( function () {
		// With optional speed parameter
		// Parameters has to be in square bracket '[]'
		owl.trigger( 'prev.owl.carousel', [ 300 ] );
	} );
</script>
