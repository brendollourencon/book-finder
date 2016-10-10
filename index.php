<?php

// erros
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

// dependencias
include_once "lib/Tools.php";
include_once "config/Rotas.php";
include_once "config/Init.php";
include_once "config/Autoload.php";
include_once "config/UrlRewrite.class.php";

$urlRewrite = new UrlRewrite();
$urlRewrite->rewrite($rotas);


