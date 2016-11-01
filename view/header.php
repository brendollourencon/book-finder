<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo (isset($title) && $title != "") ? $title . " - Book Finder" : "Book Finder"; ?></title>

    <!--CSS DEPENDENCIAS-->
    <link rel="stylesheet" href="<?php echo SITE_CSS; ?>/app.css">
    <link rel="stylesheet" href="<?php echo SITE_CSS; ?>/header.css">
    <?php
    if (isset($css) && !empty($css)) {
        foreach ($css as $style) {
            ?>
            <link rel="stylesheet" href="<?php echo SITE_CSS . '/' . $style . '.css'; ?>">
            <?php
        }
    }
    ?>

    <!--JS DEPENDENCIAS-->
    <script src="<?php echo SITE_JS; ?>/jquery-3.1.0.min.js"></script>
    <script src="<?php echo SITE_JS; ?>/app.js"></script>
    <script src="<?php echo SITE_JS; ?>/cart.js"></script>
    <?php
    if (isset($js) && !empty($js)) {
        foreach ($js as $script) {
            ?>
            <script src="<?php SITE_JS . '/' . $script . '.js'; ?>"></script>
            <?php
        }
    }
    ?>
</head>
<body>

<?php
$produto = new Produto();
$carrinho = new Carrinho();
//$carrinho->incluiProdutoSessao(1, 201);

$carrinhoItens = $carrinho->produtosCarrinho();
$quantidadeCarrinho = ($carrinho->quantidadeProdutoCarrinho() != "") ? $carrinho->quantidadeProdutoCarrinho() : 0;

?>

<div class="toolbar header">

    <div class="logo"><a href="<?php echo SITE_URL; ?>">Book Finder</a></div>
    <div class="search">
        <i class="material-icons">search</i>
        <input type="text" placeholder="Busca">
        <button class="btn-icon close-search">
            <i class="material-icons">close</i>
        </button>
    </div>
    <div class="tools">

        <button class="btn-icon white open-search">
            <i class="material-icons">search</i>
        </button>

        <div class="menu-container">
            <ul class="menu menu-cart">
                <?php
                if ($quantidadeCarrinho > 0){
                    foreach ($carrinhoItens as $item):
                        $dadosProduto = $produto->getProdutoPorId($item['id']);
                        ?>
                        <li class="item" data-id="<?php echo $item['id']?>">
                            <div class="item-container">
                                <div class="image" style="background-image: url('<?php echo SITE_IMAGES . '/card.jpg' ?>')"></div>
                                <div class="name">
                                    <div><?php echo $dadosProduto->titulo?></div>
                                    <div class="secondary">Código: <?php echo $dadosProduto->id_produto?></div>
                                </div>
                                <div class="amount">
                                    <button class="icon btn-icon red small remove-cart">
                                        <i class="material-icons">remove</i>
                                    </button>
                                    <div class="amount-product">
                                        <input type="text" value="<?php echo $item['quantidade']?>" data-val="<?php $item['quantidade']?>">
                                    </div>
                                    <button class="icon btn-icon blue small add-cart">
                                        <i class="material-icons">add</i>
                                    </button>
                                </div>
                                <div class="subtotal" data-subtotal="<?php echo $dadosProduto->valor?>">
                                    <?php echo 'R$' . number_format($dadosProduto->valor *  $item['quantidade'], 2, ',', '.') ?>
                                </div>
                                <div class="control">
                                    <button class="icon btn-icon red small">
                                        <i class="material-icons">close</i>
                                    </button>
                                </div>
                            </div>
                        </li>
                <?php
                    endforeach;
                }
                if ($quantidadeCarrinho > 0) : ?>
                    <li class="show-cart">
                        <a href="<?php echo SITE_URL; ?>/carrinho">
                            Ir para o carrinho
                        </a>
                    </li>
                <?php
                else: ?>
                    <li class="empty">Não existe produtos no carrinho</li>
                <?php
                endif; ?>
            </ul>
            <div class="menu-btn">
                <button class="btn-icon white">
                    <i class="material-icons">shopping_cart</i>
                </button>
                <div class="badge cart" data-value="<?php echo $quantidadeCarrinho; ?>"><?php echo $quantidadeCarrinho; ?></div>
            </div>
        </div>

        <div class="menu-container">
            <ul class="menu">
                <li>Perfil</li>
                <li>Sair</li>
            </ul>
            <div class="menu-btn user">
                C
            </div>
        </div>
    </div>
</div>

<?php //var_dump($_SESSION)?>