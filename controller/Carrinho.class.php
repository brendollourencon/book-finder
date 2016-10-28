<?php

class Carrinho extends CarrinhoModel
{

    public function __construct() {}

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

    /*
     * inclui o produto na sessão do carrinho
     * @author Brendol L. Oliveira
     */
    public function incluiProdutoSessao($idProduto,$valorProduto)
    {
        session_start();

        $carrinhoTemp = ['id' => $idProduto, 'quantidade' => 1, 'valor' => $valorProduto];

        if (empty($_SESSION['carrinho'])) {
            $_SESSION['carrinho'] = array();
        }

        //print_r($_SESSION['carrinho']);
        $verificaChave = true;
        for ($i = 0; $i < count($_SESSION['carrinho']); $i++) {
            if ($_SESSION['carrinho'][$i]['id'] == $idProduto) {
                $verificaChave = false;
            }
        }

        if ($verificaChave) {
            array_push($_SESSION['carrinho'], $carrinhoTemp);
        }

    }

    /*
     * Quantidade de produtos no carrinho
     * @return Quantidade de produtos no carrinho
     * @author Brendol L. Oliveira
     */
    public function quantidadeProdutoCarrinho()
    {
        if (empty($_SESSION['carrinho'])) {
            return 0;
        }
        return count($_SESSION['carrinho']);
    }

    /*
     * sessão carrinho
     * @return retorna sessão carrinho
     * @author Brendol L. Oliveira
     */
    public function produtosCarrinho()
    {
        if (empty($_SESSION['carrinho'])) {
            return false;
        }
        return $_SESSION['carrinho'];
    }

    /*
     * Deleta produto do carrinho
     * @author: Brendol L.
     */
    public function deletaProdutoCarrinho($idProduto)
    {
        //exit(var_dump($this->produtosCarrinho()));

        foreach ($this->produtosCarrinho() as $produto){
            if($produto['id'] == $idProduto){
                unset($produto['id']);
            }
        }
    }
}