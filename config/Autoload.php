<?php
/*
 * Auto load para classes
 * @author Brendol L.
 */

spl_autoload_register(function ($class_name) {

    $diretorios = array(
        "./config/",
        "./controller/",
        "./model/",
        "./view/",
    );

    foreach ($diretorios as $diretorio) {
        if(file_exists($diretorio.$class_name.".class.php")){
            include_once $diretorio.$class_name.".class.php";
            break;
        }

    }

});