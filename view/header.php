<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo (isset($title) && $title != "") ? $title . " - Book Finder" : "Book Finder"; ?></title>

    <!--CSS DEPENDENCIAS-->
    <link rel="stylesheet" href="">

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
    <script src=""></script>

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

</body>
</html>

<header class="header">
    <div class="logo">Book Finder</div>
    <div class="busca"><input type="text"></div>
    <div class="carrinho">dwedwedwe</div>
    <div class="perfil">dewdew</div>
</header>