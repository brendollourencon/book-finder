<?php
$idProduto = (isset($_POST['id_produto']) && $_POST['id_produto'] != "") ? $_POST['id_produto'] : false;
$valorProduto = (isset($_POST['valor_produto']) && $_POST['valor_produto'] != "") ? $_POST['valor_produto'] : false;

if (!$idProduto || !$valorProduto){
    exit("carrinho vazio");
}

$info = new Carrinho();

// inclui produto no carrinho
$info->incluiProdutoSessao($idProduto,$valorProduto);
$info->deletaProdutoCarrinho($idProduto);
$produtosCarrinho = $info->produtosCarrinho();
?>
    <h1>Produtos no carrinho</h1>

<?php
$valorTotal = 0;

if ($info->quantidadeProdutoCarrinho() >= 1) {
    //var_dump($produtosCarrinho);
    foreach ($produtosCarrinho as $produto) {
        $infoProduto = $info->getInfomacaoPorId($produto['id']);
        echo "Nome: " . $infoProduto->titulo . "<br/>";
        echo "Valor: " . $infoProduto->valor . "<br/>";
        echo "<br/>";
        $valorTotal += $infoProduto->valor;
        echo "Valor total: ".$valorTotal;
    }
}
else{
    exit("carrinho vazio");
}


?>