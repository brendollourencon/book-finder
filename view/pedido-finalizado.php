<?php

$title = "Modo de pagamento";

$css = ['pagamento'];
$js = ['pagamento'];

$total_pedido = (int) $_POST['total-compra'];

include_once "header.php";
?>

<div class="menu-offset pedido-finalizado">
    <div class="pedido">
        <div class="card">
            <div class="card-header">
                <div class="title">Detalhes da compra</div>
            </div>
            <div class="card-content">
                <ul>
                    <li><span>Total da compra: </span><?php echo 'R$ ' . substr($total_pedido, 0, strlen($total_pedido) - 2) . ',' . substr($_POST['total-compra'], strlen($_POST['total-compra']) - 2)?></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="pagamento">
        <div class="card open-dialog" style="width: 90px">
            <div class="card-image">
                <img src="public/imagens/visa.png" alt="">
            </div>
        </div>
        <div class="card open-dialog" style="width: 90px">
            <div class="card-image">
                <img src="public/imagens/master-card.png" alt="">
            </div>
        </div>
        <div tabindex="0" href="public/files/boleto.pdf" id="finaliza-boleto" class="card boleto-focus" style="width: 90px">
            <div class="card-image">
                <img src="public/imagens/boleto.png" alt="">
            </div>
        </div>
    </div>
</div>

<div class="dialog">
    <div class="dialog-background-click"></div>
    <div class="dialog-wrap">
        <form id="form-pagamento" class="card">
            <div class="card-header">
                <div class="title">Detalhes do cartão</div>
            </div>
            <div class="card-content">
                <input type="text" id="total-compra" data-value="<?php echo $total_pedido?>">
                <div class="input-container">
                    <input type="text" id="numero" class="control" required/>
                    <label for="numero">Numero</label>
                    <div class="line"></div>
                </div>
                <div style="display: flex; justify-content: space-between;">
                    <div class="input-container">
                        <input type="text" id="validade" class="control" required/>
                        <label for="validade">Validade</label>
                        <div class="line"></div>
                    </div>
                    <div class="input-container">
                        <input type="text" id="codigo" class="control" required/>
                        <label for="codigo">Código de segurança</label>
                        <div class="line"></div>
                    </div>
                </div>
                <div class="input-container nome-cartao">
                    <input type="text" id="nome" class="control" required/>
                    <label for="nome">Nome no cartão</label>
                    <div class="line"></div>
                </div>
            </div>
            <div class="confirma">
                <button type="submit" class="btn-icon fab success btn-confirma">
                    <i class="material-icons">check</i>
                </button>
            </div>
        </form>
    </div>
</div>
