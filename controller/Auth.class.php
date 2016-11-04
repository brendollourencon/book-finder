<?php
/*
 * Classe de autenticação do sistema
 * @author: Brendol L.
 */

class Auth extends AuthModel
{

    public function __construct()
    {

    }

    public function verifyAuth($email, $senha)
    {
        $this->setEmail($email);
        $this->setSenha($senha);
        exit(var_dump($this->getSenha()));
        //return parent::getAuth();
    }


}