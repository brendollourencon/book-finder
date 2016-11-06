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

            var_dump($this->$nameAtribute);

            echo $this->$nameAtribute[0];
            return $this->$nameAtribute;
//            if (is_string($this->$nameAtribute) && is_string($this->$nameAtribute[0])) {
//                return $this->$nameAtribute;
//            }
//            else {
//                return $this->$nameAtribute[0];
//            }

        } elseif ($solicitacao == "set") {

            $this->$nameAtribute = $arguments;


        } else {
            throw new Exception('O método ' . $name . ' não existe!');
        }

    }


}