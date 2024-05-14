import Mostrar from "./funciones_generales.js";
const mostrar = new Mostrar()

$(document).ready(function () {
    var token = $('meta[name="csrf-token"]').attr('content');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': token
        }
    });
    $('select.cjs-select, button.con-borde').prop('disabled', true)

    $('.cjs-time').click(function () {
        mostrarTiempo(this)
    })
    mostrar.mostrarSpinner();
   $.ajax({
       url: '/ajax_opciones',
      type: 'GET',
       dataType: 'json',
       success: function (response) {
           var datos = response
           var productos = datos.producto
           var data = datos.data
           console.log(data)
           $.each(data, function(index, item) {
               let productoEncontrado = productos.find(producto => producto.id === item.producto_id);
               let idProducto = $('#save-option-' + (index + 1));
               let dataIdForTime = $('#option-' + (index + 1) + '-time')
               let selectProducto = $('#option-' + (index + 1) + '-name');
               let precioProducto = $('#option-' + (index + 1) + '-price');
               let tiempoProdcuto = $('#option-' + (index + 1) + '-time-value');

               $.each(productos, function(i, prod) {
                   $("<option>").val(prod.id).text(prod.producto).appendTo(selectProducto);
               });

               selectProducto.val(productoEncontrado.id);
               precioProducto.val(item.precio);
               tiempoProdcuto.val(item.tiempo);
               dataIdForTime.data('id', item.id).click(function () {
                   $('#modal-time-confirm').data('id', $(this).data('id'))
               })
               idProducto.data('id', item.id).click(function () {
                   actualizarOpcion($(this).data('id'))
               })
           });

           mostrar.ocultarSpinner()
       }
   });
    $('#modal-time').on('hidden.bs.modal', function () {
        detenerCronometro();
        $('#chronometer').text('00:00');
        $('#chronometer-value').val('00:00');
        $('.cjs-start').attr('disabled', false);
        $('.cjs-pause span').text('pause_circle');
        $('.cjs-savetime').attr('disabled', true);
    });

    $('.cjs-start').on('click', iniciarCronometro);
    $('.cjs-pause').on('click', pausarCronometro).attr('disabled', true);
    $('.cjs-stop').on('click', detenerCronometro).attr('disabled', true);
    $('.cjs-savetime').attr('disabled', true);
    $('input[id^="option-"][id$="-price"], select[id^="option-"][id$="-name"]').on('change', function() {
        habilitarBoton(this);
    });

    if ($(window).width() < 576) {
        $('.row').addClass('mb-2');
        $('.btn.con-borde').addClass('btn-sm mt-1 mb-1').css('width', '100%').text('Guardar cambios');
    }

    $('.cjs-view').on('click', function() {
        var input = $(this).closest('.input-group').find('select');
        input.prop('disabled', false);
    });
});

function habilitarBoton(input) {
    let guardarButton = $(input).closest('.row').find('.con-borde');
    guardarButton.prop('disabled', $(input).val().trim() === '');
}

function mostrarTiempo(boton) {
    mostrar.mostrarSpinner()
    console.log(boton)
    var idBoton = $(boton).attr('id');
    var opcion = idBoton.split('-')[1];
    console.log(opcion)
    $.ajax ({
        url: '/ajax_opcion_tiempo',
        type: 'POST',
        dataType: 'json',
        data: {
            'id': opcion
        },
        success: function (response) {
            var datos = response
            console.log('49', datos.tiempo)
            $('#actual-time').text(datos.tiempo['tiempo'])
            mostrar.ocultarSpinner()
        }
    });
}
// cronometro
let startTime;
let running = false;
let elapsedTime = 0;

function iniciarCronometro() {
    if (!running) {
        startTime = Date.now() - elapsedTime;
        running = true;
        actualizarCronometro();
    }
    $('.cjs-start').attr('disabled', true);
    $('.cjs-pause').attr({
        'disabled': false,
        'title': 'Pausar'
    });
    $('.cjs-stop').attr('disabled', false);
}

function pausarCronometro() {
    $('.cjs-stop span').text('stop_circle')
    if (running) {
        running = false;
        elapsedTime = Date.now() - startTime;
        $('.cjs-pause span').text('play_circle').attr('title', 'Reanudar');
        $('.cjs-stop span').text('restart_alt')
    } else {
        iniciarCronometro();
        $('.cjs-pause span').text('pause_circle').attr('title', 'Pausar');
    }
    $('.cjs-savetime').attr('disabled', true)
}

function detenerCronometro() {
    if (running) {
        pausarCronometro();
        $('.cjs-stop span').text('restart_alt')
        actualizarCronometro();
    } else {
        $('.cjs-stop span').text('stop_circle')
        elapsedTime = 0;
        $('.cjs-start').attr('disabled', false);
        $('.cjs-pause, .cjs-stop, .cjs-savetime').attr('disabled', true);
    }
    $('.cjs-savetime').attr('disabled', false)
    $('#new-time-confirm').text($('#chronometer-value').val())
    $('#confirm-time-button').on('click', function () {
        var id = $('#modal-time-confirm').data('id')
        var tiempo = $('#new-time-confirm').text()
        $('#option-' + id + '-time-value').val(tiempo)
        $('#save-option-' + id).attr('disabled', false)
    })
}

function actualizarCronometro() {
    if (running) {
        const currentTime = Date.now();
        elapsedTime = currentTime - startTime;
    }
    const minutes = Math.floor(elapsedTime / 60000);
    const seconds = Math.floor((elapsedTime % 60000) / 1000);
    const displayTime = `${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
    $('#chronometer').text(displayTime);
    $('#chronometer-value').val(displayTime);

    if (running) {
        requestAnimationFrame(actualizarCronometro);
    }
}

function actualizarOpcion(id) {
    var producto = $('#option-' + id + '-name').val()
    var tiempo = $('#option-' + id + '-time-value').val()
    var precio = $('#option-' + id + '-price').val()
    mostrar.mostrarSpinner()
    $.ajax({
        type: 'POST',
        url: '/ajax_upd_option',
        dataType: 'json',
        data: {
            'id': id,
            'producto_id': producto,
            'tiempo': tiempo,
            'precio': precio
        },
        success: function (response) {
            if (response.exito !== false) {
                mostrar.alertSuccess('Opcion ' + id + ' actualizada correctamente');
                mostrar.ocultarSpinner()
            } else {
                mostrar.alertError('Error inesperado');
                mostrar.ocultarSpinner()
            }
        },
        error: function (xhr, status, error) {
            mostrar.alertError('Error inesperado');
            mostrar.ocultarSpinner()
        }
    })
}