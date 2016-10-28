<?php

$carrinho = new Carrinho();

switch ($_POST['acao']) {
    case 'inserir':
        break;
    case 'alterar':
        $novoValor = $carrinho->alteraQuantidade($_POST['id'], $_POST['quantidade']);
        http_response_code(200);
        exit($novoValor);
    case 'excluir':
        $carrinho->deletaProdutoCarrinho($_POST['id']);
        http_response_code(200);
        exit();
}