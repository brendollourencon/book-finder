(function(){

    'use strict';

    $(document).ready(function () {

        $('.menu-container').append('<div class="background-click"></div>');

        $('.background-click').on('click', function () {
            $('.menu-container').removeClass('active')
        });

        $(document).on('keyup', function (evt) {
            if (evt.keyCode === 27) {
                $('.menu-container').removeClass('active')
            }
        });

        $('.menu-btn').on('click', function (){
            $('.menu-container').removeClass('active');
            $(this).parent().addClass('active');
        });


    });
})();