<?php


class Auth extends AuthModel{


    public function verifyAuth($email, $senha){

        $this->setEmail($email);
        $this->setSenha($senha);

        $resultado = parent::getAuth();

        return $resultado;
    }


}