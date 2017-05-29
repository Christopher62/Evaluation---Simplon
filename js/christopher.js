// Back To Top
$(window).scroll(function() {
    if ($(this).scrollTop() >= 10) {
        $('#toTop').fadeIn(200);
    } else {
        $('#toTop').fadeOut(200);
    }
});
$('#toTop').click(function() {
    $('body,html').animate({
        scrollTop : 0
    }, 500);
});
