<?php
$idProduto = (isset($_POST['id_produto']) && $_POST['id_produto'] != "") ? $_POST['id_produto'] : false;

if (!$idProduto){
    exit("carrinho vazio");
}

$info = new Carrinho();

// inclui produto no carrinho
$info->incluiProdutoSessao($idProduto);

$produtosCarrinho = $info->produtosCarrinho();
?>

    <h1>Produtos no carrinho</h1>

<?php
$valorTotal = 0;
if ($info->quantidadeProdutoCarrinho() > 1) {

    foreach ($produtosCarrinho as $produto) {
        $infoProduto = $info->getInfomacaoPorId($produto);
        echo "Nome: " . $infoProduto->titulo . "<br/>";
        echo "Valor: " . $infoProduto->valor . "<br/>";
        echo "<br/>";
        $valorTotal += $infoProduto->valor;
        echo "Valor total: ".$valorTotal;
    }
}
else if ($info->quantidadeProdutoCarrinho() == 1){
    $infoProduto = $info->getInfomacaoPorId($produtosCarrinho[0]);
    echo "Nome: " . $infoProduto->titulo . "<br/>";
    echo "Valor: " . $infoProduto->valor . "<br/>";
    echo "<br/>";
    $valorTotal += $infoProduto->valor;
    echo "Valor total: ".$valorTotal;
}
else{
    exit("carrinho vazio");
}


?>