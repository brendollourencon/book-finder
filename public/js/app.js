(function () {

    'use strict';

    $(document).ready(function () {

        var base_site = "http://localhost/book-finder";

        // ajax teste

        $("#login").on("submit", function (event) {
            event.preventDefault();
            $.ajax({
                url: base_site + "/ajax-auth",
                method: "POST",
                data: {ajax: $("#ajax").val(), email: $("#email").val(), senha: $("#senha").val()},
                success: function (data) {
                    console.log(data);
                }
            });
        });


        $('.menu-container').append('<div class="background-click"></div>');

        $('.background-click').on('click', function () {
            $('.menu-container').removeClass('active')
        });

        $(document).on('keyup', function (evt) {
            if (evt.keyCode === 27) {
                $('.menu-container').removeClass('active')
            }
        });

        $('.menu-btn').on('click', function () {
            $('.menu-container').removeClass('active');
            $(this).parent().addClass('active');
        });

        $('.input-container .control').on('focusout', function () {
            var field = $(this),
                label = field.parent().find('label');

            if (field.val())
                label.addClass('keep-float');
            else
                label.removeClass('keep-float');

        });

        $('.open-search').on('click', function () {
            var search = $(this).parent().parent().find('.search');

            search.addClass('active enter');

            setTimeout(function () {
                search.removeClass('enter');

            }, 200);
        });

        $('.close-search').on('click', function () {
            var search = $(this).parent().parent().find('.search');
            search.addClass('leave');

            setTimeout(function () {
                search.removeClass('active leave');
            }, 200);
        });


    });
})();