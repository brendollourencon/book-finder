<?php

$title = "Titulo de teste";

$css = ['exemplo', 'exemplo2'];
$js = ['scri', 'scri2'];

$products = new Produto();
$allProduct = $products->getVitrine();

include_once "header.php";
?>
<div style="margin-top: 64px">
    <button class="btn">NORMAL</button>
    <button class="btn" disabled>Disabled</button>

    <button class="btn raised">Raised</button>
    <button class="btn raised" disabled>Disabled</button>

    <button class="btn-icon">
        <i class="material-icons">add</i>
    </button>

    <button class="btn-icon" disabled>
        <i class="material-icons">add</i>
    </button>

    <button class="btn-icon fab">
        <i class="material-icons">face</i>
    </button>
</div>

<div>

    <div class="input-container">
        <input type="text" class="control" required>
        <label for="">Text</label>
        <div class="line"></div>
    </div>

</div>

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

<?php
include_once "footer.php";
?>
