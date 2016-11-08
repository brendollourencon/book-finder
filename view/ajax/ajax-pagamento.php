<?php
$pedido = new Pedido();
$auth = new Auth();

$tipo = 'boleto';

if (isset($_POST['numero'])) {
    $tipo = 'cartao';
    $pedido->setInsereCartao($_POST['numero'], $_POST['nome'], $_POST['codigo'], $_POST['validade']);
}

$pedido->inserePedido($auth->getCPF(), $tipo, $_POST['totalCompra']);


unset($_SESSION['carrinho']);
http_response_code(200);