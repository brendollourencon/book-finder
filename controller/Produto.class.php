<?php


class Produto extends ProdutoModel
{
    /*
     * metodo contrutor
     */
    public function __construct()
    {

    }

    /*
     * metodo para vitrines
     * @return todos os produtos cadastrados
     * @author Brendol L. Oliveira
     */
    public function getVitrine($status = "A", $order = "")
    {
        $produtos = parent::getVitrine($status, $order);
        return $produtos;
    }

    public function getProdutoPorId($idProduto, $status = "A")
    {
        $produto =  parent::getProdutoPorId($idProduto, $status);
        return $produto;
    }

}