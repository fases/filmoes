$(function () {
    $("#box").cycle({
        fx: 'fade',
        speed: 1000,
        timeout: 1000,
        prev: '#prev',
        next: '#prox'
    });

    $(window).scroll(function () {
        if ($(this).scrollTop() >= $('#midBg').offset().top) {
            $('#subir').fadeIn(300);
        } else {
            $('#subir').fadeOut(300);
        }
    });
});

$(document).ready(function () {
    $(window).stellar();

    $(".scroll").click(function (event) {
        event.preventDefault();
        $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1500);
    });

    var cont1 = 1;
    var cont2 = 1;
    var cont3 = 1;
    var cont4 = 1;
    var hue1 = 1;
    var hue2 = 1;
    var hue3 = 1;
    var hue4 = 1;

    $('#locNorteShopping').click(function (e) {
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

    $('#locNatalShopping').click(function (e) {
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

    $('#locMulticine').click(function (e) {
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

    $('#locCinemark').click(function (e) {
        e.preventDefault();
        if (cont4 % 2 == 0) {
            $('#midCinemark').slideUp(1000);
            $("#lCinemark").fadeOut(500);
            $("#rCinemark").fadeIn(500);
        } else {
            $('#midCinemark').slideDown(1000);
            $("#lCinemark").fadeIn(500);
            $("#rCinemark").fadeOut(500);
        }
        cont4++;
    });

    $('#preNorteShopping').click(function (e) {
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

    $('#preNatalShopping').click(function (e) {
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

    $('#preMulticine').click(function (e) {
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

    $('#preCinemark').click(function (e) {
        e.preventDefault();
        if (hue4 % 2 == 0) {
            $('#midPreCinemark').slideUp(1000);
            $("#lpCinemark").fadeOut(500);
            $("#rpCinemark").fadeIn(500);
        } else {
            $('#midPreCinemark').slideDown(1000);
            $("#lpCinemark").fadeIn(500);
            $("#rpCinemark").fadeOut(500);
        }
        hue4++;
    });
});

$(document).ready(function () {
    $('#acessarPainel').click(function (e) {
        e.preventDefault();
        $('.modal').fadeIn(500);
        $('#loginPainel').fadeIn(500);
        document.getElementById('usuario').focus();
    });

    $('#btnCadastro').click(function (e) {
        e.preventDefault();
        $('.modal').fadeIn(500);
        $('#cadastro').fadeIn(500);
        document.getElementById('nomeCad').focus();
    });

    $('.modal, .fechar').click(function (e) {
        if (e.target !== this)
            return;
        $('.modal').fadeOut(500);
        $('#loginPainel').fadeOut(500);
        $('#cadastro').fadeOut(500);
    });
});

function propaganda() {
    document.getElementById('divCad').style.display = 'block';
    document.getElementById('trRazao').style.display = 'table-row';
    document.getElementById('trCad').style.display = 'table-row';
    document.getElementById('pfjCNPJ').checked = 'true';
}

function emails() {
    document.getElementById('divCad').style.display = 'none';
    document.getElementById('trRazao').style.display = 'none';
    document.getElementById('trCad').style.display = 'none';
}

function CPF() {
    document.getElementById('trRazao').style.display = 'none';
    document.getElementById('nomeTipoCad').innerHTML = 'CPF';
}

function CNPJ() {
    document.getElementById('trRazao').style.display = 'table-row';
    document.getElementById('nomeTipoCad').innerHTML = 'CNPJ';
}

function validacao() {
    var regra = /^[0-9]+$/;

    if (document.getElementById('tipoCad2').checked == true) {
        if (document.getElementById('pfjCNPJ').checked == true) {
            if (document.getElementById('razaoCad').value == '') {
                alert("Digite uma razão social!");
                return false;
            }
            if (document.getElementById('cadCad').value == '') {
                alert("Digite o CNPJ!");
                return false;
            }
            if (!document.getElementById('cadCad').value.match(regra)) {
                alert("CNPJ: Digite apenas números!");
                return false;
            }
            if (document.getElementById('cadCad').value.length != '14') {
                alert("CNPJ inválido!");
                return false;
            }
        }
        if (document.getElementById('pfjCPF').checked == true) {
            if (document.getElementById('cadCad').value == '') {
                alert("Digite o CPF!");
                return false;
            }
            if (!document.getElementById('cadCad').value.match(regra)) {
                alert("CPF: Digite apenas números!");
                return false;
            }
            if (document.getElementById('cadCad').value.length != '11') {
                alert("CPF inválido!");
                return false;
            }
        }
    }

    if (document.getElementById('senhaCad1').value != document.getElementById('senhaCad2').value) {
        alert("Senhas incompatíveis!");
        return false;
    }
}

function newAlert1(texto, tipo, link) {
    swal({
        title: "",
        text: texto,
        type: tipo,
        animation: false
    }, function () {
        location.href = link;
    });
}

function newAlert2(texto, tipo) {
    swal({
        title: "",
        text: texto,
        type: tipo,
        animation: false
    });
}

function newAlert3(texto, tipo) {
    swal({
        title: "",
        text: texto,
        type: tipo,
        animation: false
    }, function () {
        history.back();
    });
}