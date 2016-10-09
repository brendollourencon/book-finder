<?php


class AuthModel extends Model
{

    protected $email;
    protected $senha;

    private $table = "clientes";

    /*
     * metodo para verificação de login
     * @return null / cpf, email e senha
     * @author: Brendol Lourençon
     */
    public function getAuth()
    {
        $sqlCliente = "SELECT cpf, email,senha FROM $this->table WHERE email = ? AND senha = ? ";

        $consultaCliente = Db::exec()->prepare($sqlCliente);
        $consultaCliente->bindValue(1, $this->getEmail());
        $consultaCliente->bindValue(2, $this->getSenha());
        $consultaCliente->execute();

        $resultado = $consultaCliente->fetch(PDO::FETCH_OBJ);
        return $resultado;
    }


}