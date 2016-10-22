<?php

class Carrinho extends CarrinhoModel
{

    public function __construct()
    {

    }

    /*
     * Pega informação do produto pelo id
     * @return informações do produto pelo id
     * @author Brendol L. Oliveira
     */
    public function getInfomacaoPorId($idProduto)
    {
        $infoProduto = new Produto();
        $info = $infoProduto->getProdutoPorId($idProduto);
        return $info;
    }

    public function incluiProdutoSessao($idProduto)
    {
        session_start();

        if (empty($_SESSION['carrinho'])) {
            $_SESSION['carrinho'] = array();
        }
        if (!in_array($idProduto, $_SESSION['carrinho'])) {
            array_push($_SESSION['carrinho'], $idProduto);
        }
    }

    public function quantidadeProdutoCarrinho()
    {
        if (empty($_SESSION['carrinho'])) {
            $_SESSION['carrinho'] = array();
        }
        return count($_SESSION['carrinho']);
    }

    public function produtosCarrinho(){
        return $_SESSION['carrinho'];
    }

    public function deletaProdutoCarrinho($idProduto){
        $posicaoProduto = array_search($idProduto);
        unset($this->produtosCarrinho()[$posicaoProduto]);
    }
}