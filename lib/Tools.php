<?php
/*
 * Arquivo para funções genericas do sistema
 * @Brendol Lourençon
 */

/*
 * Função para deixar qualquer link como url amigavel
 * @return retona string com formato de url amigavel
 * @author Brendol L. Oliveira
*/
function urlAmigavel($url){
    $url = str_replace(" ","-",$url);
    $url = preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$url);
    $url = strtolower($url);
    return $url;
}