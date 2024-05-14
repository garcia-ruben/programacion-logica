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
        var nombre = $('#user-new-name').val();
        var correo = $('#user-new-email').val();
        let datos = {'id': idUsuario}
        if (nombre) {
            datos['nombre'] = nombre
        }
        if (correo) {
            datos['correo'] = correo
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
        $('#user-new-name').toggle();
    });
    $('#edit-email').click(function() {
        $('#user-new-email').toggle();
    });
    // activa botones de gaurdar en los forms
    $('#form-config input').on('change', function() {
        $('#save-user').show();
    });

    $('#form-update-pass input').on('change', function() {
        initFormUpdatePass('form-update-pass');
        activarContrasena();
    });

    $('#form-add input').on('change', function() {
        initAddForm()
    });

    $('#form-update-username input').on('change', function() {
        $('#verify-username').show();
    });
    $('#verify-button-name').on('click',function () {
        var username = $('#new-user').val()
        verificarDisponibilidadUsuario(username, function(disponible) {
            console.log('Username disponible:', disponible);
            if (disponible) {
                $('#save-username').prop('disabled', false)
                $('#succes-content').html("Usuario disponible, puedes continuar")
                $('#success').css({opacity: 0, zIndex: 9999}).show().animate({ opacity: 1 }, 1000);
                setTimeout(function() {
                    $('#error').animate({ opacity: 0 }, 1000, function() {
                        $(this).hide();
                    });
                }, 5000);
                mostrar.playSound()
            } else {
                $('#save-username').prop('disabled', true)
                $('#error-content').html("El nombre de usuario ya está en uso")
                $('#error').css({opacity: 0, zIndex: 9999}).show().animate({ opacity: 1 }, 1000);
                setTimeout(function() {
                    $('#error').animate({ opacity: 0 }, 1000, function() {
                        $(this).hide();
                    });
                }, 5000);
                mostrar.playSound()
            }
        });
    })
    $('#save-username').on('click', function() {
        var nombre_usuario = $('#new-user').val();
        var datos = {
            'id': idUsuario,
            'nombre_usuario': nombre_usuario
        };
        actualizarUsuario(datos);
        $('#save-username').prop('disabled', true)
        $('#verify-username').hide();
        $('#new-user').val("");
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
    let esValido = validar('form-update-pass')
    console.log('115', esValido)
    if (esValido) {
        $('#save-password').prop('disabled', false).click(function() {
            actualizarContrasena(idUsuario, contrasenaNueva);
        });
    }
}

function obtenerDatos() {
    mostrar.mostrarSpinner()
    $.ajax({
        url: '/ajax_usuario',
        type: 'GET',
        success: function (response) {
            response.roles.forEach(function(rol) {
                $('#new-user-permissions').append($('<option>', {
                    value: rol.id,
                    text: rol.nombre
                }));
            });
            idUsuario = response.id_usuario;
            $('#user-username, #username-actual').val(response.nombre_usuario);
            $('#user-password, #pass-actual').val(response.contrasena);
            $('#user-name').text(response.nombre);
            $('#user-email').text(response.correo);
            $('#user-id').val(idUsuario);
            mostrar.ocultarSpinner()
        }
    });
}

function actualizarUsuario(datos){
    mostrar.mostrarSpinner()
    $.ajax({
        url: 'ajax_upd_nombre',
        type: 'POST',
        data: datos,
        success: function (response) {
            if (response.exito) {
                var data = response;
                var mensajeNombre = data['nombre']
                var mensajeUsername = data['nombre_usuario']
                var mensajeCorreo = data['correo']
                var mensajesError = []
                var mensajesSucces= []
                console.log('data', data);
                if (mensajeNombre == 'same value') {
                    var messageErrorNombre = '<p>' + 'Error al actualizar Nombre.' + ' Es el nombre actual de tu cuenta' + '</p>';
                    mensajesError.push(messageErrorNombre)
                } else if (mensajeNombre.includes('success')) {
                    var messageSuccessNombre = '<p>' + 'Has actualizado Nombre correctamente.' + '</p>';
                    $('#user-name').text(datos.nombre)
                    mensajesSucces.push(messageSuccessNombre)
                }
                if (mensajeUsername == 'same value') {
                    var messageErrorUsername = '<p>' + 'Error al actualizar Nombre de Usuario.' + ' Es el nombre de usuario actual de tu cuenta' + '</p>';
                    mensajesError.push(messageErrorUsername)
                } else if (mensajeUsername.includes('en uso')) {
                    var messageErrorUsername = '<p>' + 'Error al actualizar Nombre de Usuario. ' + mensajeUsername + '</p>';
                    mensajesError.push(messageErrorUsername)
                } else if (mensajeUsername == 'success') {
                    $('#user-username').val(datos.nombre_usuario)
                    var messageSuccessUsername = '<p>' + 'Has actualizado Nombre de Usuario correctamente.' + '</p>';
                    mensajesSucces.push(messageSuccessUsername)
                }
                if (mensajeCorreo == 'same value') {
                    var messageErrorCorreo = '<p>' + 'Error al actualizar Correo.' + ' Es el correo actual de tu cuenta' + '</p>';
                    mensajesError.push(messageErrorCorreo)
                } else if (mensajeCorreo.includes('en uso')) {
                    var messageErrorCorreo = '<p>' + 'Error al actualizar Correo.' + mensajeCorreo + '</p>';
                    mensajesError.push(messageErrorCorreo)
                } else if (mensajeCorreo == 'success') {
                    $('#user-email').text(datos.correo)
                    var messageSuccessCorreo = '<p>' + 'Has actualizado Correo correctamente.' + '</p>';
                    mensajesSucces.push(messageSuccessCorreo)
                }

                if (mensajesError.length > 0) {
                    mostrar.alertError(mensajesError)
                }
                if (mensajesSucces.length > 0) {
                    mostrar.alertSuccess(mensajesSucces)
                }
                mostrar.ocultarSpinner()
                mostrar.playSound()
                $('#user-new-email, #user-new-name').val("")
            }
        },
        error: function (xhr, status, error) {
            mostrar.alertError(xhr.responseText)
        }
    })
}

function actualizarContrasena(id, username){
    mostrar.mostrarSpinner()
    $.ajax({
        url: 'ajax_upd_contrasena',
        type: 'POST',
        dataType: 'json',
        data: {
            'id': id,
            'contrasena': username
        },
        success: function (response) {
            if (response.exito) {
                var data = response;
                mostrar.alertSuccess('La contraseña ha sido actualizada correctamente')
            } else {
                let message = '<p>' + 'Error al actualziar la contraseña ' + response.error + '</p>';
                mostrar.alertError(message)
            }
        },
        error: function(xhr, status, error) {
            let message = '<p>' + 'Error al actualziar la contraseña ' + xhr.responseText + '</p>';
            mostrar.alertError(message)
        }
    })
}

function verificarDisponibilidadUsuario (username, callback) {
    mostrar.mostrarSpinner()
    $.ajax({
        url: '/ajax_verificar_username',
        type: 'POST',
        dataType: 'json',
        data: {
            'id': idUsuario,
            'username': username
        },
        success: function (response) {
            var disponible = response.exito
            mostrar.ocultarSpinner()
            callback(disponible)
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
            mostrar.ocultarSpinner()
            mostrar.playSound()
        }
    })
}

function agregarUsuario(nombre_usuario, contraseña, rol){
    let esValido = validar('form-add')
    console.log('288', esValido)
    if (esValido) {
        mostrar.mostrarSpinner()
        $.ajax({
            url: '/ajax_agregar_user',
            type: 'POST',
            dataType: 'json',
            data: {
                'nombre_usuario': nombre_usuario,
                'contrasena': contraseña,
                'rol_id': rol
            },
            success: function (response) {
                var data = response;
                if (response.exito !== false) {
                    mostrar.alertSuccess('¡Usuario agregado correctamente!')
                } else {
                    mostrar.alertError(response.error)
                }
            },
            error: function(xhr, status, error) {
                mostrar.alertError('Ha ocurrido un error inesperado')
            }
        })
    }
}

function validar(form) {
    var esValido = $('#' + form).valid()
    return esValido
}

function initFormUpdatePass(form) {
    $.validator.addMethod("regex", function(value, element) {
        return this.optional(element) || /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/.test(value);
    }, "La contraseña debe contener al menos una letra minúscula, una letra mayúscula, un dígito y un carácter especial.");

    $('#' + form).validate({
        rules: {
            pass: {
                required: true,
                minlength: 8,
                regex: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/
            },
            pass_repeat: {
                equalTo: "#pass-new"
            }
        },
        messages: {
            pass: {
                required: "Por favor ingresa tu contraseña.",
                minlength: "La contraseña debe tener al menos 8 caracteres.",
            },
            pass_repeat: {
                equalTo: "Las contraseñas no coinciden."
            }
        },
        errorPlacement: function(error, element) {
            error.addClass('error-message');
            var inputGroup = element.closest('.input-group');
            if (inputGroup.length) {
                error.insertAfter(inputGroup);
            } else {
                error.insertAfter(element);
            }
        }
    });
}

function initAddForm() {
    $('#form-add').validate({
        rules: {
            new_user_username: {
                required: true
            },
            new_user_permissions: {
                required: true
            },
            new_user_password: {
                required: true
            }
        },
        messages: {
            new_user_username: {
                required: "Este campo es requerido"
            },
            new_user_permissions: {
                required: "Este campo es requerido"
            },
            new_user_password: {
                required: "Este campo es requerido"
            }
        },
        errorPlacement: function(error, element) {
            error.addClass('error-message');
            error.insertAfter(element)
        }
    });
}