<?php


class PedidoModel {

    protected $data_hora;
    protected $id_cliente;
    protected $data_entrega;
    protected $tipo_pagamento;
    protected $valor_total;
    protected $status;

    // itens pedido
    protected $id_produto;
    protected $quantidade;
    protected $valor;

    private $table = "pedidos";

    public function __construct(){}


    public function novoPedido(){

        $sql = "INSERT INTO ".$this->pedidos." (data_hora,id_cliente,data_entrega,tipo_pagamento,valor_total,status) 
         VALUES (?,?,?,?,?,?)";

        $sqlItensPedido = "INSERT INTO itens_pedidos (id_pedido, id_produto, quantidade, valor)
        VALUES (?,?,?,?)";

        $queryPedido = Db::exec()->prepare($sql);
        $queryPedido->bindValue(1,$this->getDataHora());
        $queryPedido->bindValue(2,$this->getIdCliente());
        $queryPedido->bindValue(3,$this->getDataEntrega());
        $queryPedido->bindValue(4,$this->getTipoPagamento());
        $queryPedido->bindValue(5,$this->ValorTotal());
        $queryPedido->bindValue(6,"A");
        $queryPedido->execute();
        $lastId = Db::exec()->lastInsertId();

        $queryItensPedido = Db::exec()->prepare($sqlItensPedido);
        $queryItensPedido->bindValue(1, $lastId);
        $queryItensPedido->bindValue(2, $lastId);
        Db::closeConnection();

    }



}