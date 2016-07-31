jQuery(document).ready(function ($) {
    $('.login h1 a').on('click', function (e) {
        $(this).attr('href', '');
        e.preventDefault();
    });
});