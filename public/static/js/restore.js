import Mostrar from "./funciones_generales.js";
const mostrar = new Mostrar();

$(document).ready(function(){
    $('[data-bs-toggle="tooltip"]').tooltip();
    $('#restore').click(function () {
        restablecer($('#email').val())
    })
});

function restablecer(correo) {
    mostrar.mostrarSpinner();
    var token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        type: 'POST',
        url: '/ajax_restablecer_usuario',
        dataType: 'json',
        data: {
            '_token': token,
            'email': correo
        },
        success: function (response) {
            var data = response;
            console.log('22:', data);
            mostrar.ocultarSpinner();
            redirigir(5);
            $('#redirect').modal('show');
        },
        error: function(xhr, status, error) {
            console.log(xhr.responseText);
            mostrar.ocultarSpinner()
            $('#error').modal('show');
        }
    })
}

function redirigir(tiempo) {
    $('#contador').text(tiempo);
    let intervalo = setInterval(function() {
        tiempo--;
        $('#contador').text(tiempo);
        if (tiempo === 0) {
            clearInterval(intervalo);
            window.location.href = '/login';
        }
    }, 1000);
}