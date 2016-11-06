<?php


class Model
{

    /*
     * Encapsulamento de métodos
     * @author Brendol L.
     */
    public function __call($name, $arguments)
    {
        $nameAtribute = strtolower(substr($name, 3));
        $solicitacao = substr($name, 0, 3);

        if ($solicitacao == "get") {
            // versão php
            if (gettype($this->$nameAtribute) == "array") {
                return $this->$nameAtribute[0];
            }
            return $this->$nameAtribute;

        } elseif ($solicitacao == "set") {
            // versão php
            if (gettype($this->$nameAtribute) == "array") {
                $this->$nameAtribute[0] = $arguments;
            } else {
                $this->$nameAtribute = $arguments;
            }

        } else {
            throw new Exception('O método ' . $name . ' não existe!');
        }
    }


}