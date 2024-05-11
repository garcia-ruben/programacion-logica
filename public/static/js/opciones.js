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
               let selectProducto = $('#option-' + (index + 1) + '-name');
               let precioProducto = $('#option-' + (index + 1) + '-price');
               let tiempoProdcuto = $('#option-' + (index + 1) + '-time-value');

               $.each(productos, function(i, prod) {
                   $("<option>").val(prod.id).text(prod.producto).appendTo(selectProducto);
               });

               selectProducto.val(productoEncontrado.id);
               precioProducto.val(item.precio);
               tiempoProdcuto.val(item.tiempo);
           });

           mostrar.ocultarSpinner()
       }
   });
    $('.cjs-start').on('click', iniciarCronometro);
    $('.cjs-pause').on('click', pausarCronometro);
    $('.cjs-stop').on('click', detenerCronometro);
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
            $('#offcanvas-time').offcanvas('show')
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
}

function pausarCronometro() {
    if (running) {
        running = false;
        elapsedTime = Date.now() - startTime;
    }
}

function detenerCronometro() {
    if (running) {
        pausarCronometro();
        console.log($('#chronometer-value').val())
    }
    elapsedTime = 0;
    actualizarCronometro();
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