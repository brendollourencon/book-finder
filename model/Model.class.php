<?php


class Model
{

    /*
     * Encapsulamento de métodos
     * @author Brendol L.
     */
    public function __call($metodo, $parametros)
    {
        $nomeMetodo = strtolower(substr($metodo,0,3));
        $valorMetodo = strtolower(substr($metodo,3));

        if($nomeMetodo === "set"){
            if(isset($parametros)){
                $this->$valorMetodo = $parametros[0];
            }
        }
        elseif ($nomeMetodo === "get"){
            return $this->$valorMetodo;
        }
    }

}