<?php


class PedidoModel extends Model
{

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

    // cartao
    protected $numero;
    protected $nome;
    protected $codigo_seguranca;
    protected $data_validade;

    // tabela padrão
    private $table = "pedidos";

    public function __construct()
    {
    }


    public function novoPedido()
    {

        $sql = "INSERT INTO " . $this->table . " (data_hora,id_cliente,data_entrega,tipo_pagamento,valor_total,status) 
         VALUES (?,?,?,?,?,?)";

        $queryPedido = Db::exec()->prepare($sql);
        $queryPedido->bindValue(1, $this->getDataHora());
        $queryPedido->bindValue(2, $this->getIdCliente());
        $queryPedido->bindValue(3, $this->getDataEntrega());
        $queryPedido->bindValue(4, $this->getTipoPagamento());
        $queryPedido->bindValue(5, $this->ValorTotal());
        $queryPedido->bindValue(6, "A");
        $queryPedido->execute();

        $lastId = Db::exec()->lastInsertId();

        $carrinho = new Carrinho();
        $produtosCarrinho = $carrinho->produtosCarrinho();

        foreach ($produtosCarrinho as $produto) {
            $sqlItensPedido = "INSERT INTO itens_pedidos (id_pedido, id_produto, quantidade, valor)
            VALUES (?,?,?,?)";

            $queryItensPedido = Db::exec()->prepare($sqlItensPedido);
            $queryItensPedido->bindValue(1, $lastId);
            $queryItensPedido->bindValue(2, $produto['id']);
            $queryItensPedido->bindValue(2, $produto['quantidade']);
            $queryItensPedido->bindValue(3, $produto['valor']);
            $queryItensPedido->execute();
        }

        if($this->getTipo() == "cartao"){
            $sqlCartao = "INSERT INTO cartoes (numero,nome,codigo_seguranca,data_validade) 
                      VALUES (?,?,?,?)";
            $queryCartao = Db::exec()->prepare($sqlCartao);
            $queryCartao->bindValue(1,$this->getNumero());
            $queryCartao->bindValue(2,$this->getNome());
            $queryCartao->bindValue(3,$this->getCodigoSeguranca());
            $queryCartao->bindValue(4,$this->getDataValidade());
            $queryCartao->execute();
        }
        Db::closeConnection();
    }


    public function testea(){
        return $this->getNome();
    }

}