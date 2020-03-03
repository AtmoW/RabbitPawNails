$(document).ready(function () {
    $('.burger').on('click',function (event) {
        $('.burger, .menu').toggleClass('active');
        $('body').toggleClass('lock')
    });
});