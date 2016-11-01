<?php
$idProduto = (isset($_POST['id_produto']) && $_POST['id_produto'] != "") ? $_POST['id_produto'] : false;
$valorProduto = (isset($_POST['valor_produto']) && $_POST['valor_produto'] != "") ? $_POST['valor_produto'] : false;

$info = new Carrinho(true);

if ($idProduto) {
    // inclui produto no carrinho
    $info->incluiProdutoSessao($idProduto, $valorProduto);
}


$produtosCarrinho = $info->produtosCarrinho();
$title = "Titulo de teste";

$css = [];
$js = [];

include_once "header.php";
?>
<div class="menu-offset">
    <h1 class="title">Produtos no carrinho</h1>


    <div id="container-carrinho">
        <form action="<?php echo SITE_URL; ?>/finalizar" method="post">
            <?php
            if ($info->quantidadeProdutoCarrinho() >= 1) {
            ?>
            <ul class="produto">
                <li class="img">
                    Imagem do produto
                </li>
                <li class="descricao">Descrição do produto</li>
                <li class="quantidade">Quantidade</li>
                <li class="valor">Valor do produto</li>
            </ul>
            <?php
            //var_dump($produtosCarrinho);
            foreach ($produtosCarrinho as $produto) {
                $valorTotal = 0;
                $infoProduto = $info->getInfomacaoPorId($produto['id']);
                ?>
                <ul class="produto">
                    <li class="img">
                        <img src="<?php echo SITE_IMAGENS; ?>/no-image.png" alt="">
                    </li>
                    <li class="descricao"><?php echo $infoProduto->titulo ?></li>
                    <li data-id="<?php echo $produto['id'] ?>" class="quantidade">
                        <div class="amount">
                            <button type="button" class="icon btn-icon red small remove-cart">
                                <i class="material-icons">remove</i>
                            </button>
                            <div class="amount-product">
                                <input class="numero" type="text" value="<?php echo $produto['quantidade'] ?>"
                                       data-val="<?php echo $produto['quantidade'] ?>">
                            </div>
                            <button type="button" class="icon btn-icon blue small add-cart">
                                <i class="material-icons">add</i>
                            </button>
                        </div>
                        <!--                    <input type="text" class="numero" value="--><?php //echo $produto['quantidade'] ?><!--">-->
                    </li>
                    <li class="valor rs"><?php echo $infoProduto->valor ?></li>
                </ul>
                <?php
                $valorTotal += $infoProduto->valor;
            }
            ?>
            <div class="container-frete-valor">
                <div class="frete-cliente">
                    <h2 class="title">Frete do cliente</h2>
                    <div class="inputs">
                        <div class="input-container">
                            <input type="text" class="control numero-cep">
                            <label for="">CEP</label>
                            <div class="line"></div>
                        </div>
                        <button type="button" class="btn raised blue" id="btn-cep">Buscar</button>
                    </div>
                    <div class="total-frete">Valor do frete: <span>0,00</span></div>
                </div>
                <div class="valor-total">
                    <ul>
                        <li class="total-do-produto">Total do(s) produto(s): <span></span></li>
                        <li class="descontos">Descontos: <span>0,00</span></li>
                        <li class="total-da-compra">Total da compra: <span><?php echo $valorTotal; ?></span></li>
                    </ul>
                </div>
            </div>
            <div class="finalizar-pedido container">
                <button type="submit" class="btn raised green">Finalizar pedido</button>
            </div>
        </form>
        <?php
        } else {
            exit("carrinho vazio");
        }
        ?>
    </div>
</div>
<?php
include_once "footer.php";
?>

