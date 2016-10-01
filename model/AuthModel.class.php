<?php


class AuthModel extends Model {

    protected $email;
    protected $senha;

    public function getAuth(){

        //$sqlEditora = "SELECT email,senha FROM editoras WHERE email = '".$this->getEmail()."' AND senha = '".$this->getSenha()."' ";

        $sqlCliente = "SELECT email,senha FROM clientes WHERE email = ? AND senha = ? ";

        $consultaCliente = Db::exec()->prepare($sqlCliente);
        $consultaCliente->bindParam(1,$this->getEmail());
        $consultaCliente->bindParam(2,$this->getSenha());
        $consultaCliente->execute();

        $resultado = $consultaCliente->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;



    }


}