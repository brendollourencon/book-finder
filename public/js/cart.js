(function () {

    'use strict';

    $(document).ready(function () {

        var base_site = "http://localhost/book-finder",
            carrinho = [];

        $('.menu-cart .control').on('click', function () {
            removeItemCart($(this).parent().parent());
        });

        function removeItemCart (element) {

            element.addClass('leave');

            setTimeout(function () {
                if ($('.menu-cart .item').length - 1 > 0)
                    element.children().remove();
                else
                    $('.menu-container').removeClass('active');

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
            $(this).val(newValue);
        });

        function mathCart (element, add) {
            var amount = element.parent().find('.amount-product input') ,
                newValue;
            if (add)
                newValue = parseInt(amount.val()) + 1;
            else
                newValue = parseInt(amount.val()) - 1;

            newValue = newValue <= 0 ? 1 : newValue;

            amount.val(newValue);
        }
    });

})();