(function () {

    'use strict';

    $(document).ready(function () {
        var base_site = "http://localhost/book-finder";

        $('#login').submit(function (e) {
            $.ajax({
                url: base_site + "/ajax-auth",
                method: "POST",
                data: {
                    email: $("#email").val(),
                    senha: $("#senha").val()
                },
                success: function () {
                    snack({
                        text: 'Login efetuado com sucesso',
                        control: {
                            action: 'hide',
                            icon: 'close'
                        },
                        delay: 5000
                    });

                    setTimeout(function () {
                        window.location.href = base_site;
                    }, 2000);
                },
                error: function () {
                    snack({
                        text: 'Usuário inexistente',
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