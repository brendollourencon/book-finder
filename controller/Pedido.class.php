<?php

class Pedido extends PedidoModel{


    public function __construct(){}


    public function inserePedido($id_cliente, $tipo_pagamento, $valor_total){

        $dataEntrega = date('Y/m/d', strtotime("+3 days"));

        $this->setDataHora(date('Y-m-d h:m:s'));
        $this->setCpfCliente($id_cliente);
        $this->setDataEntrega($dataEntrega);
        $this->setTipoPagamento($tipo_pagamento);
        $this->setValorTotal($valor_total);
        $this->setStatus('A');

        parent::novoPedido();
    }

    public function setInsereCartao($numero,$nome,$codigo_seguranca,$data_validade){
        $this->setNumero($numero);
        $this->setNome($nome);
        $this->setCodigoSeguranca($codigo_seguranca);
        $this->setDataValidade($data_validade);
    }

    public function teste($numero,$nome){
        $this->setNumero($numero);
        $this->setNome($nome);
        return parent::testea();
    }
}