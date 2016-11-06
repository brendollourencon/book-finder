<?php


class AuthModel
{

    public $email;
    public $senha;

    private $table = "clientes";

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * @param mixed $senha
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;
    }


    /*
     * metodo para verificação de login
     * @return null / cpf, email e senha
     * @author: Brendol Lourençon
     */
    public function getAuth()
    {
        $sqlCliente = "SELECT cpf, nome, email FROM $this->table WHERE email = ? AND senha = ? ";

        $consultaCliente = Db::exec()->prepare($sqlCliente);
        $consultaCliente->bindValue(1, $this->getEmail());
        $consultaCliente->bindValue(2, $this->getSenha());
        $consultaCliente->execute();

        $resultado = $consultaCliente->fetch(PDO::FETCH_OBJ);
        Db::closeConnection();
        return $resultado;
    }


}