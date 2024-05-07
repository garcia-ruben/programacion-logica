import Mostrar from "./funciones_generales.js";
const mostrar = new Mostrar();
var idUsuario;
$(document).ready(function() {
    obtenerDatos();
    idUsuario = $('#user-id').val();
    $('#edit-username').click(function() {
        $('#user-name').prop('disabled', function(i, v) {
            return !v;
        });
    });
    $('#edit-email').click(function() {
        $('#user-email').prop('disabled', function(i, v) {
            return !v;
        });
    });
    // activa botones de gaurdar en los forms
    $('#form-config input').on('change', function() {
        $('#save-user').show();
    });

    $('#form-update-pass input').on('change', function() {
        activarContrasena();
    });
    $('#form-update-username input').on('change', function() {
        $('#verify-username').attr('disabled', false);
        var verificarActivado = !$('#verify-username').prop('disabled');
        if (verificarActivado) {
            $('#save-username').prop('disabled', false).click(function() {
                var nombreUsuario = $('#new-user').val();
                var idUsuario = $('#user-id').val();
                actualizarNombre(idUsuario, nombreUsuario);
            });
        }
    });
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

function activarContrasena() {
    var contrasenaNueva = $('#pass-new').val();
    var contrasenaNuevaDos = $('#pass-new-repeat').val();
    if (contrasenaNueva == contrasenaNuevaDos){
        $('#save-password').prop('disabled', false).click(function() {
            actualizarContrasena(idUsuario, contrasenaNueva);
        });
    }
}

function obtenerDatos() {
    $.ajax({
        url: '/ajax-usuario',
        type: 'GET',
        success: function (response) {
            $('#user-username, #username-actual').val(response.nombre_usuario);
            $('#user-password, #pass-actual').val(response.contrasena);
            $('#user-id').val(response.id);
        }
    });
}

function actualizarNombre(id, username){
    $.ajax({
        url: 'ajax-upd-nombre',
        type: 'GET',
        data: {
            'id': id,
            'nombre_usuario': username
        },
        success: function (response) {
            var data = response;
            console.log('data', data);
        }
    })
}

function actualizarContrasena(id, username){
    $.ajax({
        url: 'ajax-upd-contrasena',
        type: 'GET',
        data: {
            'id': id,
            'contrasena': username
        },
        success: function (response) {
            var data = response;
            console.log('data', data);
        }
    })
}
