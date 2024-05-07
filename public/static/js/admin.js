import Mostrar from "./funciones_generales.js";
const mostrar = new Mostrar();
var idUsuario;
$(document).ready(function() {
    var token = $('meta[name="csrf-token"]').attr('content');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': token
        }
    });
    obtenerDatos();
    $('#save-email-name').click(function() {
        var nombre = $('#user-name').val();
        var correo = $('#user-email').val();
        var datos = {
            'nombre': nombre,
            'correo': correo,
            'id': idUsuario
        }
        actualizarUsuario(datos)
    });

    $('#save-add-user').click(function() {
        var nombre = $('#new-user-username').val();
        var contraseña = $('#new-user-password').val();
        var rol = $('#new-user-permissions').val();
        agregarUsuario(nombre, contraseña, rol)
    });

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
                var nombre_usuario = $('#new-user').val();
                var datos = {
                    'id': idUsuario,
                    'nombre_usuario': nombre_usuario
                }
                actualizarUsuario(datos)
            });
        }
    });
    if ($(window).width() < 576) {
        $("#informative-carousel").hide();
    } else {
        $("#informative-carousel").show();
    }
    var username = $('#user-username').val();
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
        url: '/ajax_usuario',
        type: 'GET',
        success: function (response) {
            idUsuario = response.id_usuario;
            $('#user-username, #username-actual').val(response.nombre_usuario);
            $('#user-password, #pass-actual').val(response.contrasena);
            $('#user-id').val(idUsuario);
        }
    });
}

function actualizarUsuario(datos){
    $.ajax({
        url: 'ajax_upd_nombre',
        type: 'POST',
        data: datos,
        success: function (response) {
            var data = response;
            console.log('data', data);
        }
    })
}

function actualizarContrasena(id, username){
    $.ajax({
        url: 'ajax_upd_contrasena',
        type: 'POST',
        dataType: 'json',
        data: {
            'id': id,
            'contrasena': username
        },
        success: function (response) {
            var data = response;
            console.log('data', data);
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
        }
    })
}

function agregarUsuario(nombre_usuario, contraseña, rol){
    $.ajax({
        url: 'ajax_agregar_user',
        type: 'POST',
        dataType: 'json',
        data: {
            'nombre_usuario': nombre_usuario,
            'contrasena': contraseña,
            'rol_id': rol
        },
        success: function (response) {
            var data = response;
            console.log('data', data);
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
        }
    })
}
