<?php

$title = "Titulo de teste";

$css = ['exemplo', 'exemplo2'];
$js = ['scri', 'scri2'];

$products = new Produto();
$allProduct = $products->getVitrine();

include_once "header.php";
?>


<div class="card" style="margin: 74px auto 0; width: 400px">
    <div class="card-image">
        <img src="public/images/card.jpg" alt="">
    </div>
    <div class="card-header">
        <div class="title">Title</div>
        <div class="subtitle">Subtitle</div>
    </div>
    <div class="card-content">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid autem ea eaque facere, natus odit quos repellat sit tempora vitae. Aut cum dolore dolorem esse fuga iure natus quod unde.
    </div>
    <div class="card-controls">
        <button class="btn-icon blue">
            <i class="material-icons">add_shopping_cart</i>
        </button>
        <button class="btn blue" id="snack-test">Visualizar</button>
    </div>
</div>

<div style="margin-top: 64px">
    <button class="btn">NORMAL</button>
    <button class="btn" disabled>Disabled</button>

    <button class="btn raised blue">Raised</button>
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

    <button class="btn-icon fab blue">
        <i class="material-icons">add</i>
    </button>
</div>

<div>

    <div class="input-container">
        <input type="text" class="control" required>
        <label for="">Text</label>
        <div class="line"></div>
    </div>

</div>

<?php
include_once "footer.php";
?>
