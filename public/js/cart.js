(function () {

    'use strict';

    $(document).ready(function () {

        var base_site = "http://localhost/book-finder",
            carrinho = [];

        $('.menu-cart .control').on('click', function () {
            removeItemCart($(this).closest('li'));
        });

        function removeItemCart(element) {

            var badge = $('.badge.cart');

            $.ajax({
                url: base_site + "/ajax-cart",
                method: "POST",
                data: {
                    id: element.data('id'),
                    acao: 'excluir'
                },
                success: function () {
                    badge.data('value', badge.data('value') - 1);
                    badge.text(badge.data('value'));

                    element.addClass('leave');

                    setTimeout(function () {
                        if ($('.menu-cart .item').length - 1 > 0)
                            element.children().remove();
                        else {
                            $('.menu-container').removeClass('active');
                            $('.menu-cart .show-cart').remove();
                            $('.menu-cart').append('<li class="empty">Não existe produtos no carrinho</li>');
                        }
                        element.css('min-height', 0);

                        setTimeout(function () {
                            element.remove();
                        }, 300);

                        snack({
                            text: 'Produto removido do carrinho',
                            control: {
                                action: 'hide',
                                icon: 'close'
                            },
                            delay: 3000
                        });
                    }, 300);
                },
                error: function () {
                    snack({
                        text: 'Ocorreu um erro ao remover o produto',
                        control: {
                            action: 'hide',
                            icon: 'close'
                        },
                        delay: 3000
                    });
                }
            });


        }

        $('.add-cart').on('click', function () {
            mathCart($(this), true);
        });

        $('.remove-cart').on('click', function () {
            mathCart($(this));
        });

        $('.amount-product input').on('keyup', function () {
            var newValue = $(this).val().replace(/[^0-9]+/g, "");
            newValue = newValue ? newValue : 1;
            updateAmount($(this), newValue);
        });

        function mathCart(element, add) {
            var amount = element.parent().find('.amount-product input');
            var newValue;

            if (add)
                newValue = parseInt(amount.val()) + 1;
            else
                newValue = parseInt(amount.val()) - 1;

            newValue = newValue <= 0 ? 1 : newValue;

            updateAmount(amount, newValue);
        }

        function updateAmount(element, value) {
            $.ajax({
                url: base_site + "/ajax-cart",
                method: "POST",
                data: {
                    id: element.closest('li').data('id'),
                    acao: 'alterar',
                    quantidade: value
                },
                success: function (valor) {
                    $('.menu-cart .subtotal').text(valor);
                    element.val(value);
                },
                error: function () {
                    snack({
                        text: 'Ocorreu um erro ao atualizar a quantidade',
                        control: {
                            action: 'hide',
                            icon: 'close'
                        },
                        delay: 3000
                    });
                }
            });
        }


        /* Brendol L.*/
        $("#btn-cep").on("click", function () {
            var cep = $('.numero-cep').val();
            if (cep != "" && cep != 0 ) {
                $(".valor-total li.descontos > span").text("10,00");
                $(".total-frete span").text("10,00");
                totalCompra();
            }
        });

        totalCompra();

        $("#container-carrinho .produto .quantidade .numero").on("change", function () {
            totalCompra();
        });


        function totalCompra() {

            var totalProduto = 0;
            $('.rs').each(function (index) {
                var quantidadeProduto = parseInt($(this).parent().find('.quantidade').find('.numero').val());
                totalProduto += (parseInt($(this).text()) * quantidadeProduto);
            });
            $('.total-do-produto span').text((totalProduto).formatMoney(2, ',', '.'));
            var descontos = parseInt($('.descontos span').text());
            var totalCompra = parseInt(totalProduto + descontos).formatMoney(2, ',', '.');
            $('.total-da-compra span').text(totalCompra);
        }

    });

    /* função converte numero para R$ */
    Number.prototype.formatMoney = function(c, d, t){
        var n = this, c = isNaN(c = Math.abs(c)) ? 2 : c, d = d == undefined ? "," : d, t = t == undefined ? "." : t, s = n < 0 ? "-" : "", i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
        return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
    };
})();