(function () {

    'use strict';

    $(document).ready(function () {

        var base_site = "http://localhost/book-finder";

        $('.open-dialog').on('click', function () {
            var dialog = $('.dialog');

            dialog.css('display', 'flex');

            setTimeout(function () {
                dialog.addClass('active');
                dialog.find('.dialog-wrap').addClass('active');
            },0);
        });

        $('.dialog-background-click').on('click', function () {
            closeDialog();
        });

        function closeDialog () {
            var dialog = $('.dialog');

            dialog.find('.dialog-wrap').removeClass('active');

            setTimeout(function () {
                dialog.removeClass('active');

                setTimeout(function () {
                    dialog.css('display', 'none');
                }, 300);

            },200);
        }

        $('#finaliza-boleto').on('click', function () {
            $.ajax({
                url: base_site + '/ajax-pagamento',
                method: 'POST',
                data: {
                    totalCompra: $('#total-compra').data('value')
                },
                success: function () {
                    closeDialog();

                    snack({
                        text: 'Pedido finalizado com sucesso',
                        control: {
                            action: 'hide',
                            icon: 'close'
                        },
                        delay: 50000
                    });

                    setTimeout(function () {
                        window.open(base_site + '/public/files/boleto.pdf','_blank');
                    }, 3000);

                    setTimeout(function () {
                        window.location.href = base_site;
                    }, 5000);


                },
                error: function () {
                    snack({
                        text: 'Erro ao inserir pedido',
                        control: {
                            action: 'hide',
                            icon: 'close'
                        },
                        delay: 50000
                    });
                }
            });
        });

        $('#form-pagamento').on('submit', function (e) {

            $.ajax({
                url: base_site + '/ajax-pagamento',
                method: 'POST',
                data: {
                    numero: $('#numero').val(),
                    validade: $('#validade').val(),
                    codigo: $('#codigo').val(),
                    nome: $('#nome').val(),
                    totalCompra: $('#total-compra').data('value')
                },
                success: function () {
                    closeDialog();

                    snack({
                        text: 'Pedido finalizado com sucesso',
                        control: {
                            action: 'hide',
                            icon: 'close'
                        },
                        delay: 50000
                    });

                    setTimeout(function () {
                        window.location.href = base_site;
                    }, 5000);

                },
                error: function () {
                    snack({
                        text: 'Erro ao inserir pedido',
                        control: {
                            action: 'hide',
                            icon: 'close'
                        },
                        delay: 5000
                    });
                }
            });


            e.preventDefault();
        });
    });


})();