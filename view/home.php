<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Book Finder</title>
    <link rel="stylesheet" href="public/css/app.css">

    <script src="public/js/jquery-3.1.0.min.js"></script>
    <script src="public/js/app.js"></script>
</head>
<body>

<div class="toolbar header">
    <div class="logo">Book Finder</div>
    <div class="search">
        <i class="material-icons">search</i>
        <input type="text" placeholder="Busca">
    </div>
    <div style="display: flex; align-items: center">
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
        <input type="text" class="control">
        <label for="">Text</label>
        <div class="line"></div>
    </div>

</div>

</body>
</html>