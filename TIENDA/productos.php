<script src="vendor/owl-carousel/owl.carousel.js"></script>
<link rel="stylesheet" href="vendor/owl-carousel/owl.carousel.css"/>
<link rel="stylesheet" href="vendor/owl-carousel/owl.theme.default.css"/>
<link rel="stylesheet" href="vendor/owl-carousel/animate.css"/>


<div class="box latest">
	<div class="box-heading">
		<div class="navigations">
			<a class="prev" id="l_prev" style="display: inline-block;"><span><i class="fa fa-chevron-left"></i></span></a>
			<a class="next" id="l_next" style="display: inline-block;"><span><i class="fa fa-chevron-right"></i></span></a>
		</div>
				<h3>Popular</h3>
	</div>
</div>
<div class="owl-carousel owl-theme">
	<?php require_once('productoCarusel.php') ?>
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