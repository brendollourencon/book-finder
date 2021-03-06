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

$css = ['carrinho'];
$js = [];

include_once "header.php";
?>
<div class="menu-offset">
    <div id="container-carrinho">
        <?php
        if ($info->quantidadeProdutoCarrinho() >= 1) {
            ?>
            <h1 class="title">Produtos no carrinho</h1>
            <form action="<?php echo SITE_URL; ?>/pedido-finalizado" method="post">
                <input type="hidden" name="total-compra" id="total-compra">
                <ul class="produto title">
                    <li class="img">
                        Imagem do produto
                    </li>
                    <li class="descricao">Descrição do produto</li>
                    <li class="quantidade">Quantidade</li>
                    <li class="valor">Valor do produto</li>
                </ul>
                <?php
                foreach ($produtosCarrinho as $produto) {
                    $valorTotal = 0;
                    $infoProduto = $info->getInfomacaoPorId($produto['id']);
                    ?>
                    <ul class="produto">
                        <li class="img">
                            <img src="<?php echo SITE_IMAGENS.'/'.str_replace(' ', '-', strtolower($infoProduto->titulo)) ?>-vertical.jpg" alt="">
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
                        </li>
                        <li class="valor rs" data-valor="<?php echo $infoProduto->valor?>">
                            <?php echo 'R$ ' . number_format($infoProduto->valor, 2, ',', '.') ?>
                        </li>
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
                                <input type="text" class="control numero-cep" required="">
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
        } else { ?>
            <p>Carrinho vázio</p>
        <?php }
        ?>
    </div>
</div>
<?php
include_once "footer.php";
?>

