<?php

$carrinho = new Carrinho();

switch ($_POST['acao']) {
    case 'inserir':
        http_response_code(200);
        $status = $carrinho->incluiProdutoSessao($_POST['id'], $_POST['valor']);

        if ($status === true) {
            $response = [
                'status' => true,
                'produto' => $carrinho->getInfomacaoPorId($_POST['id'])
            ];
        }
        else {
            $response = [
                'status' => false
            ];
        }
        exit(json_encode($response));
    case 'alterar':
        $novoValor = $carrinho->alteraQuantidade($_POST['id'], $_POST['quantidade']);
        http_response_code(200);
        exit($novoValor);
    case 'excluir':
        $carrinho->deletaProdutoCarrinho($_POST['id']);
        http_response_code(200);
        exit();
}