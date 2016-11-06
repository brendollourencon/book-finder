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
                <a href="<?php echo SITE_URL?>" class="btn-icon blue">
                    <i class="material-icons">clear</i>
                </a>
            </div>

            <div class="header">
                <div class="title">Book Finder</div>
            </div>

            <form id="login" class="content">
                <div class="input-container">
                    <input type="text" id="email" class="control" required/>
                    <label for="email">Email</label>
                    <div class="line"></div>
                </div>
                <div class="input-container">
                    <input type="password" id="senha" class="control" required/>
                    <label for="senha">Senha</label>
                    <div class="line"></div>
                </div>
                <div class="action">
                    <button type="submit" class="btn raised blue large test">Entrar</button>
                </div>
            </form>

        </div>
    </div>

</div>

<?php
include_once "footer.php";
?>
