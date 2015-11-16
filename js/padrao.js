$(function() {
    $("#box").cycle({
        fx: 'fade',
        speed: 1000,
        timeout: 1000,
        prev: '#prev',
        next: '#prox'
    });

    $(window).scroll(function() {
        if ($(this).scrollTop() > $('#midBg').offset().top) {
            $('#subir').fadeIn(300);
        } else {
            $('#subir').fadeOut(300);
        }
    });
});

$(document).ready(function() {
    $(window).stellar();

    $(".scroll").click(function(event) {
        event.preventDefault();
        $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1500);
    });

    var cont1 = 1;
    var cont2 = 1;
    var cont3 = 1;
    var hue1 = 2;
    var hue2 = 2;
    var hue3 = 2;

    $('#locNorteShopping').click(function(e) {
        e.preventDefault();
        if (cont1 % 2 == 0) {
            $('#midNorteShopping').slideUp(1000);
            $("#lNorteShopping").fadeOut(500);
            $("#rNorteShopping").fadeIn(500);
        } else {
            $('#midNorteShopping').slideDown(1000);
            $("#lNorteShopping").fadeIn(500);
            $("#rNorteShopping").fadeOut(500);
        }
        cont1++;
    });

    $('#locNatalShopping').click(function(e) {
        e.preventDefault();
        if (cont2 % 2 == 0) {
            $('#midNatalShopping').slideUp(1000);
            $("#lNatalShopping").fadeOut(500);
            $("#rNatalShopping").fadeIn(500);
        } else {
            $('#midNatalShopping').slideDown(1000);
            $("#lNatalShopping").fadeIn(500);
            $("#rNatalShopping").fadeOut(500);
        }
        cont2++;
    });

    $('#locMulticine').click(function(e) {
        e.preventDefault();
        if (cont3 % 2 == 0) {
            $('#midMulticine').slideUp(1000);
            $("#lMulticine").fadeOut(500);
            $("#rMulticine").fadeIn(500);
        } else {
            $('#midMulticine').slideDown(1000);
            $("#lMulticine").fadeIn(500);
            $("#rMulticine").fadeOut(500);
        }
        cont3++;
    });

    $('#preNorteShopping').click(function(e) {
        e.preventDefault();
        if (hue1 % 2 == 0) {
            $('#midPreNorteShopping').slideUp(1000);
            $("#lpNorteShopping").fadeOut(500);
            $("#rpNorteShopping").fadeIn(500);
        } else {
            $('#midPreNorteShopping').slideDown(1000);
            $("#lpNorteShopping").fadeIn(500);
            $("#rpNorteShopping").fadeOut(500);
        }
        hue1++;
    });

    $('#preNatalShopping').click(function(e) {
        e.preventDefault();
        if (hue2 % 2 == 0) {
            $('#midPreNatalShopping').slideUp(1000);
            $("#lpNatalShopping").fadeOut(500);
            $("#rpNatalShopping").fadeIn(500);
        } else {
            $('#midPreNatalShopping').slideDown(1000);
            $("#lpNatalShopping").fadeIn(500);
            $("#rpNatalShopping").fadeOut(500);
        }
        hue2++;
    });

    $('#preMulticine').click(function(e) {
        e.preventDefault();
        if (hue3 % 2 == 0) {
            $('#midPreMulticine').slideUp(1000);
            $("#lpMulticine").fadeOut(500);
            $("#rpMulticine").fadeIn(500);
        } else {
            $('#midPreMulticine').slideDown(1000);
            $("#lpMulticine").fadeIn(500);
            $("#rpMulticine").fadeOut(500);
        }
        hue3++;
    });
});