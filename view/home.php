<?php

$title = "A livraria de todos";

$css = ['vitrine'];

$products = new Produto();
$allProduct = $products->getVitrine();

include_once "header.php";
?>

<div class="menu-offset">
    <!--Products-->
    <div class="vitrine">
        <?php
        foreach ($allProduct as $product) { ?>
            <div class="card-vitrine">
                <div class="card">
                    <div class="card-image">
                        <img src="public/imagens/card.jpg" alt="">
                    </div>
                    <div class="card-header">
                        <div class="title"><?php echo $product->titulo?></div>
                        <div class="subtitle"><?php echo 'R$ ' . number_format($product->valor, 2, ',', '.')?></div>
                    </div>
                    <div class="card-content">
                        <?php echo $product->descricao?>
                    </div>
                    <div class="card-controls">
                        <button class="btn-icon blue add-produto-cart" type="button" data-id="<?php echo $product->id_produto?>" data-valor="<?php echo $product->valor?>">
                            <i class="material-icons">add_shopping_cart</i>
                        </button>
                        <a href="<?php echo SITE_URL . '/produto/' . $product->id_produto; ?>" class="btn blue">Comprar</a>
                    </div>
                </div>
            </div>
            <?php
        } ?>
    </div>
</div>
<?php
include_once "footer.php";
?>
