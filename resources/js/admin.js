import Mostrar from "./funciones_generales.js";
const mostrar = new Mostrar()
$(document).ready(function() {
    if ($(window).width() < 576) {
        $("#informative-carousel").hide();
    } else {
        $("#informative-carousel").show();
    }
    var username = $('#username-user').val();
    var password = $('#user-password').val();
    if (username === 'admin' || password === 'admin') {
        var toast = new bootstrap.Toast($('#liveToast')[0]);
        toast.show();
    }
    $('.cjs-change').on('click', function() {
        mostrarOpciones($(this).data('opcion'));
    });
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

    $(window).resize(function() { // detecta cambios en el tamaño de la pantalla
        if ($(window).width() < 576) {
            $("#informative-carousel").hide();
        } else {
            $("#informative-carousel").show();
        }
    });
});

function mostrarOpciones(opcion) {
    $('#config').attr({
        class: 'col-12 col-sm-6 slide-right'
    })
    if (opcion == "contraseña") {
        $('#change-pass').show();
        $('#change-user').hide();
    } else {
        $('#change-user').show();
        $('#change-pass').hide();
    }
}

function login() {

}