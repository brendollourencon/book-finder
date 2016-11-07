<?php


class PedidoModel extends Model
{

    protected $datahora;
    protected $cpfcliente;
    protected $dataentrega;
    protected $tipopagamento;
    protected $valortotal;
    protected $status;

    // itens pedido
    protected $idproduto;
    protected $quantidade;
    protected $valor;

    // cartao
    protected $numero;
    protected $nome;
    protected $codigoseguranca;
    protected $datavalidade;

    // tabela padrão
    private $table = "pedidos";

    public function __construct()
    {
    }


    public function novoPedido()
    {

        $sql = "INSERT INTO " . $this->table . " (data_hora,cpf_cliente,data_entrega,tipo_pagamento,valor_total,status) 
         VALUES (?,?,?,?,?,?)";
        $queryPedido = Db::exec()->prepare($sql);
        $queryPedido->bindValue(1, $this->getDataHora());
        $queryPedido->bindValue(2, $this->getCpfCliente());
        $queryPedido->bindValue(3, $this->getDataEntrega());
        $queryPedido->bindValue(4, $this->getTipoPagamento());
        $queryPedido->bindValue(5, $this->getValorTotal());
        $queryPedido->bindValue(6, "A");
        $queryPedido->execute();

        $lastId = Db::ultimoId();

        $carrinho = new Carrinho();
        $produtosCarrinho = $carrinho->produtosCarrinho();

        foreach ($produtosCarrinho as $produto) {
            $sqlItensPedido = "INSERT INTO itens_pedidos (id_pedido, id_produto, quantidade, valor)
            VALUES (?,?,?,?)";

            $queryItensPedido = Db::exec()->prepare($sqlItensPedido);
            $queryItensPedido->bindValue(1, $lastId);
            $queryItensPedido->bindValue(2, $produto['id']);
            $queryItensPedido->bindValue(3, $produto['quantidade']);
            $queryItensPedido->bindValue(4, (float)$produto['valor']);
            $queryItensPedido->execute();
        }

        if($this->getTipoPagamento() == "cartao"){
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
}