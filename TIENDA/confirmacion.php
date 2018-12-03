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

saveOrder();
echo 'Compra realizada';

?>