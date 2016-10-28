<?php

$title = "Titulo de teste";

$css = ['exemplo', 'exemplo2'];
$js = ['scri', 'scri2'];

$products = new Produto();
$allProduct = $products->getVitrine();

include_once "header.php";
?>

<div class="menu-offset">
    <!--Products-->
    <?php
    foreach ($allProduct as $product) {
        ?>
        <ul>
            <li>
                <a href="<?php echo SITE_URL.'/produto/'. urlAmigavel($product->titulo). "-".$product->id_produto;?>">
                    <?php echo $product->titulo; ?>
                </a>
            </li>
        </ul>
        <?php
    }
    ?>
</div>
<?php
include_once "footer.php";
?>
