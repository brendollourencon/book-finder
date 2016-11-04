<?php

$css = ['produto'];
$js = ['produto'];

$produto = new Produto();
$infoProduto = $produto->getProdutoPorId($idProduto);
$title =  $infoProduto->meta_titulo;
include_once "header.php";
?>

<div class="menu-offset">
    pagina de produto
    <br>
    <br>
    <br>
    <form action="<?php echo SITE_URL; ?>/carrinho" method="post">

        <input type="hidden" name="id_produto" value="<?php echo $infoProduto->id_produto; ?>">
        <input type="hidden" name="valor_produto" value="<?php echo $infoProduto->valor; ?>">
        <p><?php echo $infoProduto->titulo; ?></p>
        <br>
        <button type="submit">Comprar</button>
    </form>
</div>

<?php include_once "footer.php"; ?>