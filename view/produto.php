<?php

$produto = new Produtos();
$infoProduto = $produto->getProdutoPorId($idProduto);
?>

pagina de produto

<form action="<?php echo SITE_URL; ?>/carrinho" method="post">

    <input type="hidden" name="id_produto" value="<?php echo $infoProduto->id_produto; ?>">

    <button type="submit">Comprar</button>
</form>