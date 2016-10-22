<?php

$produto = new Produto();
$infoProduto = $produto->getProdutoPorId($idProduto);

include_once "header.php";
?>
    <br><br><br><br><br><br>
    pagina de produto
    <br>
    <br>
    <br>
    <form action="<?php echo SITE_URL; ?>/carrinho" method="post">

        <input type="hidden" name="id_produto" value="<?php echo $infoProduto->id_produto; ?>">
        <p><?php echo $infoProduto->titulo; ?></p>
        <br>
        <button type="submit">Comprar</button>
    </form>

<?php include_once "footer.php"; ?>