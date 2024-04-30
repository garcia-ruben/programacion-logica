$(document).ready(function() {
    if ($(window).width() < 576) {
        $("#informative-carousel").hide();
    } else {
        $("#informative-carousel").show();
    }
    $('.cjs-opcion').hide()
    var seleccion = mostrar_contenido()
    $('#opciones-toggle, #historial-toggle').click(function () {
        var icon = $(this).find('.material-symbols-outlined');
        if (icon.text() === 'expand_more') {
            icon.animate({ 'font-size': '1.2rem' }, 100).text('expand_less').animate({ 'font-size': '1.5rem' }, 100);
        } else {
            icon.animate({ 'font-size': '1.2rem' }, 100).text('expand_more').animate({ 'font-size': '1.5rem' }, 100);
        }
    });

    $('#liveToastBtn').click(function(){
        $('.toast').toast('show');
    });
    var username = $('#usuario-username').val();
    var password = $('#usuario-contraseña').val();

    if (username === 'admin' || password === 'admin') {
        var toast = new bootstrap.Toast($('#liveToast')[0]);
        toast.show();
    }

    $('.cjs-view').click(function () {
        event.preventDefault();
        var inputField = $(this).closest('.input-group').find('input');
        var icon = $(this).find('.material-symbols-outlined');
        if (icon.text() === 'visibility_off') {
            icon.text('visibility');
            inputField.attr('type', 'text');
        } else {
            icon.text('visibility_off');
            inputField.attr('type', 'password');
        }
    });
    $(window).resize(function() {
        if ($(window).width() < 576) {
            $("#informative-carousel").hide();
        } else {
            $("#informative-carousel").show();
        }
    });
});

function mostrar_contenido() {
    var item_seleccionado_anterior = $('.item-navbar.activo').attr('id');
    var item_seleccionado_actual = null;
    if (item_seleccionado_anterior) {
        $('.cjs-opcion').hide();
        $('#' + item_seleccionado_anterior + '-contenido').show();
    }
    $('.item-navbar').click(function () {
        $('.item-navbar').removeClass('activo');
        $(this).addClass('activo');
        item_seleccionado_actual = $(this).attr('id');
        $('.cjs-opcion').hide();
        $('#' + item_seleccionado_actual + '-contenido').show();
        if (item_seleccionado_anterior !== item_seleccionado_actual && item_seleccionado_anterior) {
            $('#' + item_seleccionado_anterior + '-contenido').hide();
        }
        item_seleccionado_anterior = item_seleccionado_actual;
    });
    return item_seleccionado_actual;
}

function mostrar_opciones(opcion) {
    $('#config').attr({
        class: 'col-12 col-sm-6 slide-right'
    })
    if (opcion == "contraseña") {
        $('#cambiar-pass').show();
        $('#cambiar-user').hide();
    } else {
        $('#cambiar-user').show();
        $('#cambiar-pass').hide();
    }

}