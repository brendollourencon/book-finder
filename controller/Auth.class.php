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

    public function doAuth ($email, $senha)
    {
        $result = $this->verifyAuth($email, $senha);

        if ($result) {
            $encryption = base64_encode($result->cpf . '.' . $result->email);
            $_SESSION['Auth']['encryption'] = $encryption;
            $_SESSION['Auth']['name'] = $result->nome;
            return true;
        }
        else {
            $this->destroy();
            return false;
        }
    }

    public function verifyAuth($email, $senha)
    {
        $this->setEmail($email);
        $this->setSenha($senha);
        return parent::getAuth();
    }

    public function getCPF () {
        return explode('.', base64_decode($_SESSION['Auth']['encryption']))[0];
    }

    public function isAuth () {
        return isset($_SESSION['Auth']);
    }

    public function destroy () {
        unset($_SESSION['Auth']);
    }

}