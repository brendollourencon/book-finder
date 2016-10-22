<?php


class ProdutoModel extends Model
{
    // atributos
    protected $valor;
    protected $titulo;
    protected $descricao;
    protected $meta_titulo;
    protected $meta_descricao;
    protected $status;

    private $table = "produtos";

    /*
     * Vitrine de produtos
     * @return retorna todos produtos cadastrados
     * @author Brendol L Oliveira
     */
    protected function getVitrine($status, $order)
    {
        $sql = "SELECT id_produto, valor, titulo, descricao FROM $this->table WHERE status = '" . $status . "'";
        if ($order != "")
            $sql .= " ORDER BY $order";
        $query = Db::exec()->prepare($sql);
        $query->execute();
        $resultado = $query->fetchAll(PDO::FETCH_OBJ);
        Db::closeConnection();
        return $resultado;
    }

    /*
     * Seleciona um produto pela id
     * @return se encontrado retorna o produto desejado
     * @author Brendol L. Oliveira
     */
    protected function getProdutoPorId($idProduto, $status)
    {
        $sql = "SELECT * FROM produtos WHERE id_produto = ? AND status = ? ";

        $query = Db::exec()->prepare($sql);
        $query->bindValue(1,$idProduto);
        $query->bindValue(2,$status);
        $query->execute();
        $resultado = $query->fetch(PDO::FETCH_OBJ);
        Db::closeConnection();
        return $resultado;
    }

}