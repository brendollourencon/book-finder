<?php

$title = "Titulo de teste";

$css = [];
$js = [];

include_once "header.php";
?>
<br><br><br><br><br>
<form id="login">
    <input type="hidden" name="ajax" id="ajax" value="auth">
    <input type="text" name="email" placeholder="email" id="email">

    <input type="password" name="senha" id="senha">
    <input type="submit" value="acessar" >
</form>

<?php
include_once "footer.php";
?>

