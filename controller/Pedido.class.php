<?php

class Pedido extends PedidoModel{


    public function __construct(){}


    public function inserePedido($id_cliente){

        $dataEntrega = date('d/m/Y', strtotime("+3 days",strtotime($data)));

        $this->setDataHora(date('Y-m-d h:m:s'));
        $this->setIdCliente($id_cliente);
        $this->setDataEntrega();


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