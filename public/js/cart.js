(function () {

    'use strict';

    $(document).ready(function () {

        var base_site = "http://localhost/book-finder",
            carrinho = [];

        $('.menu-cart .control').on('click', function () {
            removeItemCart($(this).closest('li'));
        });

        function removeItemCart (element) {

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

        $('.amount-product input').on('keyup',function () {
            var newValue = $(this).val().replace(/[^0-9]+/g, "");
            newValue = newValue ? newValue : 1;
            updateAmount($(this), newValue);
        });

        function mathCart (element, add) {
            var amount = element.parent().find('.amount-product input');
            var newValue;

            if (add)
                newValue = parseInt(amount.val()) + 1;
            else
                newValue = parseInt(amount.val()) - 1;

            newValue = newValue <= 0 ? 1 : newValue;

            updateAmount(amount, newValue);
        }

        function updateAmount (element, value){
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
    });

})();