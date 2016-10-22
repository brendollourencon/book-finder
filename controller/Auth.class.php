<?php
/*
 * Classe de autenticação do sistema
 * @author: Brendol L.
 */

class Auth extends AuthModel
{

    public function __construct($ajax = false)
    {
        if ($ajax) {
            $acao = (isset($_POST['ajax']) && $_POST['ajax'] != "") ? $_POST['ajax'] : false;

            if ($acao == "auth") {
                session_start();
                $resultado = $this->verifyAuth($_POST['email'], $_POST['senha']);

                if (count($resultado) > 0 && $resultado != "") {
                    $_SESSION['id']['autenticacao'] = $resultado->cpf;
                    $_SESSION['email']['autenticacao'] = $_POST['email'];
                    unset($resultado);
                    header("location: " . SITE_URL . "/painel/principal");
                } else {
                    unset($_SESSION['id']['autenticacao']);
                    unset($_SESSION['email']['autenticacao']);
                    exit("erro");
                    //header("location: " . SITE_URL . "/testes?erro=1");
                }
            }
        }
    }

    private function verifyAuth($email, $senha)
    {
        $this->setEmail($email);
        $this->setSenha($senha);
        $resultado = parent::getAuth();
        return $resultado;
    }


}