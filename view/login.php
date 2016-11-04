<?php


$title="Login";

$css = ["login"];
$js = ["login"];

include_once "header.php";
?>

<div class="menu-offset">

    <div class="login-container">
        
        <div class="login card">
            <div class="close">
                <button class="btn-icon blue">
                    <i class="material-icons">clear</i>
                </button>
            </div>

            <div class="header">
                <div class="title">BookFinder</div>
            </div>

            <div class="content">
                <div class="input-container">
                    <input type="text" id="email" class="control"/>
                    <label for="email">Email</label>
                    <div class="line"></div>
                </div>
                <div class="input-container">
                    <input type="password" id="senha" class="control"/>
                    <label for="senha">Senha</label>
                    <div class="line"></div>
                </div>
                <div class="action">
                    <button id="login" class="btn raised blue large test">Entrar</button>
                </div>
            </div>

        </div>
    </div>

</div>

<?php
include_once "footer.php";
?>
