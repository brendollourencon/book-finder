<?php

$css = ['produto'];
$js = ['produto'];

$produto = new Produto();
$infoProduto = $produto->getProdutoPorId($idProduto);
$title =  $infoProduto->meta_titulo;
include_once "header.php";
?>

<div class="menu-offset">
    <div class="container-produto">
        <h1>Informações do Livro</h1>

        <div class="info-produto">
            <div class="image">
                <img src="../public/imagens/no-image.png" alt="harry potter">
            </div>
            <div class="info">
                <form action="<?php echo SITE_URL; ?>/carrinho" method="post">

                    <input type="hidden" name="id_produto" value="<?php echo $infoProduto->id_produto; ?>">
                    <input type="hidden" name="valor_produto" value="<?php echo $infoProduto->valor; ?>">

                    <h2 class="book-title"><?php echo $infoProduto->titulo; ?></h2>

                    <p class="book-description"><span class="bold">Descrição: </span> <?php echo $infoProduto->descricao; ?></p>

                    <p class="book-value"><span class="bold">Valor: </span> <?php echo $infoProduto->valor; ?></p>

                    <div class="action">
                        <button class="btn raised blue" type="submit">Comprar</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

<?php include_once "footer.php"; ?>