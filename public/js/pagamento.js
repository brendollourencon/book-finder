(function () {

    'use strict';

    $(document).ready(function () {
        $('.open-dialog').on('click', function () {
            var dialog = $('.dialog');

            dialog.css('display', 'flex');

            setTimeout(function () {
                dialog.addClass('active');
                dialog.find('.dialog-wrap').addClass('active');
            },0);
        });

        $('.dialog-background-click').on('click', function () {
            var dialog = $('.dialog');

            dialog.find('.dialog-wrap').removeClass('active');

            setTimeout(function () {
                dialog.removeClass('active');

                setTimeout(function () {
                    dialog.css('display', 'none');
                }, 300);

            },200);
        });

        $('.btn-confirma').on('click', function () {
            $('.dialog-background-click').click();
        });
    });


})();