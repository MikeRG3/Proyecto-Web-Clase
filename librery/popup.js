$(document).ready(function() {
    alert("Hola");
    $('.open').on('click', function() {
        $('#popup').fadeIn('slow');
        $('.popup-overlay').fadeIn('slow');
        $('.popup-overlay').height($(window).height());

        $('')
        return false;
    });

    $('.close').on('click', function() {
        $('#popup').fadeOut('slow');
        $('.popup-overlay').fadeOut('slow');
        return false;
    });
});