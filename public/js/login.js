(function () {

    'use strict';

    $(document).ready(function () {
        var base_site = "http://localhost/book-finder";

        $('#login').click(function () {
            $.ajax({
                url: base_site + "/ajax-auth",
                method: "POST",
                data: {
                    email: $("#email").val(),
                    senha: $("#senha").val()
                },
                success: function (data) {
                    console.log(data);
                }
            });
        });


    });

})();