<?php


class Product extends ProductModel
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
    public function getShowCase($status = "A", $order = "")
    {
        $produtos = parent::getShowCase($status, $order);
        return $produtos;
    }
}