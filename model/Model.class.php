<?php


class Model{


    public function __call($name, $arguments)
    {
        $name = sanitizeString($name);
        $nameAtribute = strtolower(substr($name, 3));
        $solicitacao = substr($name, 0, 3);

        if ($solicitacao == "get") {
            return strtolower($this->$nameAtribute);
        } elseif ($solicitacao == "set") {
            $this->$name = $arguments;
        } else {
            throw new Exception('O método ' . $name . ' não existe!');
        }
    }


}