/*------------------- Create Alexander --------------*/
/*---------------------- 30/09/2017 -----------------*/

function addProduct(idProduct) {
				//Construimos la variable que se guardará en el data del Ajax para pasar al archivo php que procesará los datos
				var datos = {
					'idProducto': idProduct,
					'identificadorP': "addProducto"
				};

				$.ajax( {
					type: "POST",
					url: "custom.php?identificador=producto",
					data: datos,
					success: function ( data ) {
						if ( !data ) {
							fnCorrecto( "¡Producto agregado correctamente!" );
							$("#cart").load("custom.php?identificador=producto");
						} else {
							fnError( data );
						}

					},
					error: function () {
						fnError( "Error al Procesar solicitud" );
					}

				} );
};

function deleteProduct(idProduct) {
				//Construimos la variable que se guardará en el data del Ajax para pasar al archivo php que procesará los datos
				var datos = {
					'idProducto': idProduct,
					'identificadorP': "deleteProducto"
				};

				$.ajax( {
					type: "POST",
					url: "custom.php?identificador=producto",
					data: datos,
					success: function ( data ) {
						if ( !data ) {
							fnCorrecto( "¡Producto removido correctamente!" );
							$("#cart").load("custom.php?identificador=producto");
						} else {
                            if(data==1){
                                fnCorrecto( "!Carrito Vaciado!" );
							     $("#cart").load("custom.php?identificador=producto");
                            }else{
							 fnError( data );
                            }
						}

					},
					error: function () {
						fnError( "Error al Procesar solicitud" );
					}

				} );
};

function carrito(){
    window.location.href="?carrito";
}

function paypal(){
    window.location.href="controller/PaypalController.php";
}