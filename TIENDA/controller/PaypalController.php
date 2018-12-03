<?php 

require __DIR__  . '/Paypal/autoload.php';

use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;


$paypalPago = new PaypalController();
if ( isset( $_GET[ "correcto" ]) || isset($_GET[ "cancelado" ]) ){
    $paypalPago->getPaymentStatus();
}else{
    session_start();
    $paypalPago->postPayment();
    //$paypalPago->saveOrder();
}


class PaypalController
{
	private $_api_context;

	public function __construct()
	{
        include('paypal.php');

		// setup PayPal api context
		$paypal_conf = $configPaypal;
		$this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
		$this->_api_context->setConfig($paypal_conf['settings']);
	}

	public function postPayment()
	{
		$payer = new Payer();
		$payer->setPaymentMethod('paypal');

		$items = array();
		$subtotal = 0;
		$cart = $_SESSION["carrito"];
		$currency = 'MXN';

		foreach($cart as $producto){
			$item = new Item();
			$item->setName($producto['nombre'])
			->setCurrency($currency)
			->setDescription($producto['descripcion'])
			->setQuantity(1)
			->setPrice($producto['precio']);

			$items[] = $item;
			$subtotal += 1 * $producto['precio'];
		}

		$item_list = new ItemList();
		$item_list->setItems($items);

		$details = new Details();
		$details->setSubtotal($subtotal)
		->setShipping(0);

		$total = $subtotal + 0;

		$amount = new Amount();
		$amount->setCurrency($currency)
			->setTotal($total)
			->setDetails($details);

		$transaction = new Transaction();
		$transaction->setAmount($amount)
			->setItemList($item_list)
			->setDescription('Pedido de: '.$_SESSION["usuarioTienda"]);

		$redirect_urls = new RedirectUrls();
		$redirect_urls->setReturnUrl('http://localhost/tienda/?correcto')
			->setCancelUrl('http://localhost/tienda/?cancelado');

		
		$payment = new Payment();
		$payment->setIntent('Sale')
			->setPayer($payer)
			->setRedirectUrls($redirect_urls)
			->setTransactions(array($transaction));

		try {
			$payment->create($this->_api_context);
		} catch (\PayPal\Exception\PPConnectionException $ex) {
			if (false) {
				echo "Exception: " . $ex->getMessage() . PHP_EOL;
				$err_data = json_decode($ex->getData(), true);
				exit;
			} else {
				die('Ups! Algo salió mal');
			}
		}

		foreach($payment->getLinks() as $link) {
			if($link->getRel() == 'approval_url') {
				$redirect_url = $link->getHref();
				break;
			}
		}

		// add payment ID to session
		//\Session::put('paypal_payment_id', $payment->getId());
        $_SESSION["paypal_payment_id"] = $payment->getId();

		if(isset($redirect_url)) {
			// redirect to paypal
			header("Location:".$redirect_url);
            exit();
		}

		return 'Ups! Error desconocido.';

	}

	public function getPaymentStatus()
	{
		// Get the payment ID before session clear
		$payment_id = $_SESSION["paypal_payment_id"];

		// clear the session payment ID
        //unset($_SESSION["paypal_payment_id"]);

		$payerId = $_GET['PayerID'];
		$token = $_GET['token'];

		//if (empty(\Input::get('PayerID')) || empty(\Input::get('token'))) {
		if (empty($payerId) || empty($token)) {
			return 'Hubo un problema al intentar pagar con Paypal';
		}

		$payment = Payment::get($payment_id, $this->_api_context);

		// PaymentExecution object includes information necessary 
		// to execute a PayPal account payment. 
		// The payer_id is added to the request query parameters
		// when the user is redirected from paypal back to your site
		$execution = new PaymentExecution();
		$execution->setPayerId($_GET['PayerID']);

		//Execute the payment
		$result = $payment->execute($execution, $this->_api_context);

		//echo '<pre>';print_r($result);echo '</pre>';exit; // DEBUG RESULT, remove it later

		if ($result->getState() == 'approved') { // payment made
			// Registrar el pedido --- ok
			// Registrar el Detalle del pedido  --- ok
			// Eliminar carrito 
			// Enviar correo a user
			// Enviar correo a admin
			// Redireccionar

            
			echo '<h1>Compra realizada de forma correcta</h1>';
            $this->saveOrder();
            exit();
		}
		echo '<h1>La compra fue cancelada o no se pudo completar</h1>';
	}


	public function saveOrder()
	{
	    require_once("model/pedido_modelo.php");
        $pedido = new pedidoModel();
        $pedido->insertPedido();
        echo '<script>
            $("#cart").load("custom.php?identificador=producto");
        </script>';
	}
	

}