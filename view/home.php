<?php

$title = "A livraria de todos";

$css = ['vitrine'];
//$js = ['scri', 'scri2'];

$products = new Produto();
$allProduct = $products->getVitrine();

include_once "header.php";
?>

<div class="menu-offset">
    <!--Products-->
    <div class="vitrine">
        <?php var_dump($allProduct)?>
        <?php
        foreach ($allProduct as $product) { ?>
            <div class="card card-vitrine">
                <div class="card-image">
                    <img src="public/images/card.jpg" alt="">
                </div>
                <div class="card-header">
                    <div class="title"><?php echo $product->titulo?></div>
                    <div class="subtitle"><?php echo 'R$' . number_format($product->valor, 2, ',', '.')?></div>
                </div>
                <div class="card-content">
                    <?php echo $product->descricao?>
                </div>
                <div class="card-controls">
                    <button class="btn-icon blue">
                        <i class="material-icons">add_shopping_cart</i>
                    </button>
                    <button class="btn blue" id="snack-test">Comprar</button>
                </div>
            </div>
            <?php
        } ?>
    </div>
</div>
<?php
include_once "footer.php";
?>
