<?php


class UrlRewrite extends Model
{

    private $url;
    private $pagina;
    private $parametros;
    private $base;

    public function __construct()
    {
        //loja/categoria/criancas
        //loja/produtos/harry-potter/123
        //


        $this->url = (isset($_GET['url']) && $_GET['url']) ? $_GET['url'] : false;
        //$this->url = $_GET['url'];

        if ($this->url != null) {

            $this->url = explode("/", $this->url);

            //pagina
            $this->pagina = $this->url[0];
            unset($this->url[0]);

            //parametros
            $this->parametros = $this->url;
        } else {
            $this->pagina = "home";
        }


    }

    public function rewrite($rotas = null)
    {

        if ($rotas != "") {

            switch ($this->pagina) {

                case "painel":
                    //regras aqui
                    break;
                case "produtos":
                    // regras aqui
                    break;
                default:

                    $this->base = BASE_DIR;
                    $baseView = $this->base . "/view/";

                    if (in_array($this->pagina,$rotas)) {
                        if (file_exists($baseView . array_search($this->pagina,$rotas) . ".php")) {
                            $parametros = $this->parametros;
                            include_once $baseView . array_search($this->pagina,$rotas) . ".php";
                        }
                        else{
                            exit("Arquivo ou diretório inexistente");
                        }

                    } else {
                        exit("Erro 404");
                    }

                    break;
            }


        } else {
            exit("Página em construção");
        }


    }


}