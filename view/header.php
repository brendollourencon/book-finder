<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo (isset($title) && $title != "") ? $title . " - Book Finder" : "Book Finder"; ?></title>

    <!--CSS DEPENDENCIAS-->
    <link rel="stylesheet" href="public/css/app.css">
    <?php
    if (isset($css) && !empty($css)) {
        foreach ($css as $style) {
            ?>
            <link rel="stylesheet" href="<?php echo SITE_CSS.'/'.$style.'.css'; ?>">
            <?php
        }
    }
    ?>

    <!--JS DEPENDENCIAS-->
    <script src="public/js/jquery-3.1.0.min.js"></script>
    <script src="public/js/app.js"></script>
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
<div class="toolbar header">
    <div class="logo">Book Finder</div>
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
            <!--<ul class="menu">
                <li>Perfil</li>
                <li>Sair</li>
            </ul>-->
            <div class="">
                <button class="btn-icon white">
                    <i class="material-icons">shopping_cart</i>
                </button>
                <div class="badge">5</div>
            </div>
        </div>

        <div class="menu-container">
            <ul class="menu">
                <li>Entrar</li>
                <li>Sair</li>
            </ul>
            <div class="menu-btn user">
                C
            </div>
        </div>
    </div>
</div>