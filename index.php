<?php

// dependencias

include_once "config/Rotas.php";
include_once "config/Init.php";
include_once "config/Autoload.php";
include_once "config/UrlRewrite.class.php";

$urlRewrite = new UrlRewrite();
$urlRewrite->rewrite($rotas);