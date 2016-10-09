<?php


class ProductModel extends Model
{

    protected $valor;
    protected $titulo;
    protected $descricao;
    protected $meta_titulo;
    protected $meta_descricao;
    protected $status;

    private $table = "produtos";

    protected function getShowCase($status, $order)
    {
        $sql = "SELECT valor, titulo, descricao FROM $this->table WHERE status = '".$status."'";
        if ($order != "")
            $sql .= " ORDER BY $order";
        $query = Db::exec()->prepare($sql);
        $query->execute();
        $resultado = $query->fetchAll(PDO::FETCH_OBJ);
        return $resultado;
    }


}