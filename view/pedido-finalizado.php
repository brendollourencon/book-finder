<?php

$title = "Modo de pagamento";

$css = ['pagamento'];
$js = ['pagamento'];

$pedido = new Pedido();

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
                    <li><span>Descontos: </span>1.200,00</li>
                    <li><span>Total do(s) produto(s): </span> 1.200,00</li>
                    <li><span>Total da compra: </span>1.200,00</li>
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
        <a href="public/files/boleto.pdf" class="card" style="width: 90px">
            <div class="card-image">
                <img src="public/imagens/boleto.png" alt="">
            </div>
        </a>
    </div>
</div>

<div class="dialog">
    <div class="dialog-background-click"></div>
    <div class="dialog-wrap">
        <div class="card">
            <div class="card-header">
                <div class="title">Detalhes do cartão</div>
            </div>
            <div class="card-content">
                <form>
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
                </form>
            </div>
            <div class="confirma">
                <button class="btn-icon fab success btn-confirma">
                    <i class="material-icons">check</i>
                </button>
            </div>
        </div>
    </div>
</div>
