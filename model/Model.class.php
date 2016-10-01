<?php


class Model{


    public function __call($name, $arguments)
    {
        $nameAtribute = strtolower(substr($name, 3));
        $solicitacao = substr($name, 0, 3);
        if ($solicitacao == "get") {
            return $this->$nameAtribute[0];
        } elseif ($solicitacao == "set") {
            $this->$nameAtribute = $arguments;
        } else {
            throw new Exception('O método ' . $name . ' não existe!');
        }
    }


}