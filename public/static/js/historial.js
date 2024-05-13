import Mostrar from "./funciones_generales.js";
const mostrar = new Mostrar()

$(document).ready(function (){
    obtenerHistorial();
    const currentURL = window.location.href;

    const historyConsumeLink = $('#history-consume');
    const historyGraphicsLink = $('#history-graphics');

    if (currentURL.includes('historial/historico')) {
        historyConsumeLink.addClass('activo');
        historyGraphicsLink.removeClass('activo');
    } else if (currentURL.includes('historial/grafico')) {
        historyGraphicsLink.addClass('activo');
        historyConsumeLink.removeClass('activo');
    }
    mostrar.mostrarContenidoInicial();

    if ($(window).width() < 576) {
        $("#liveToast").show();
        $("#history-graphics-content div").removeClass('texto-pequeno').addClass('texto-muy-pequeno');
        $("#history-graphics-content > div > nav").removeClass('justify-content-end').addClass('justify-content-start');
    } else {
        $("#liveToast").hide();
    }

    $('.datepicker').datepicker({
        format: 'dd/mm/yyyy',
        language: 'es',
        autoclose: true
    });

    $('#send-filter').click(function () {
       filtrar();
    });

    $("#graphics-selector li").click(function(){
        $("#graphics-selector > li > a").removeClass("activo");
        $(this).find("a").addClass("activo");
        var target = $(this).data('content');
        $(".cjs-graphic").addClass('d-none');
        $("#" + target + "-graph-content").removeClass('d-none');
    });
})

function obtenerHistorial(){
    mostrar.mostrarSpinner()
    $.ajax({
        url: '/ajax_historial',
        type: 'GET',
        dataType: 'json',
        success: function (response) {
            var datos = response;
            var productos = datos.producto
            var data = datos.data
            if (datos.exito) {
                generarGraficas(productos);
                let tbody = $("#table tbody");
                tbody.empty();
                $.each(data, function(index, item) {
                    let row = $("<tr>");
                    $("<td>").text('000' + item.id).appendTo(row);
                    $("<td>").addClass('text-end').text(item.fecha).appendTo(row);
                    let productoEncontrado = productos.find(producto => producto.id === item.producto_id);
                    if (productoEncontrado) {
                        $("<td>").addClass('text-center').text(productoEncontrado.producto).appendTo(row);
                    } else {
                        $("<td>").addClass('text-center').text("Producto no encontrado").appendTo(row);
                    }
                    $("<td>").addClass('text-center').text('Opción ' + item.opcion_id).appendTo(row);
                    $("<td>").addClass('text-end').text('$' + item.precio_actual).appendTo(row);
                    row.appendTo(tbody);
                    mostrar.ocultarSpinner()
                });
            } else {
                console.error("La solicitud no fue exitosa.");
            }
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
        }
    })
}

function generarGraficas(productos) {
    mostrar.mostrarSpinner()
    console.log(productos);
    var conteoProductos = {};
    productos.forEach(function (producto) {
        conteoProductos[producto.producto] = (conteoProductos[producto.producto] || 0) + 1;
    });
    console.log("Conteo de productos:", conteoProductos);
    var index = Object.keys(conteoProductos);
    var values = Object.values(conteoProductos);
    // Gráfico de barras
    const ctxBar = document.getElementById('bar-graph');
    const barChart = new Chart(ctxBar, {
        type: 'bar',
        data: {
            labels: index,
            datasets: [{
                label: 'Cantidad',
                data: values,
                backgroundColor: '#689c6e',
                borderColor: '#1e5128',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    $('#bar-graph').data('chart', barChart);

    // Gráfico de líneas
    const ctxLine = document.getElementById('line-graph');
    const lineChart = new Chart(ctxLine, {
        type: 'line',
        data: {
            labels: index,
            datasets: [{
                label: 'Cantidad',
                data: values,
                borderColor: '#1e5128',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    $('#line-graph').data('chart', lineChart);
    // Gráfico de pastel
    const ctxPie = document.getElementById('pie-graph');
    const pieChart = new Chart(ctxPie, {
        type: 'doughnut',
        data: {
            labels: index,
            datasets: [{
                label: 'Cantidad',
                data: values,
                backgroundColor: [
                    'rgba(118, 185, 86, 1)',
                    'rgba(143, 212, 94, 1)',
                    'rgba(0, 204, 153, 1)',
                    'rgba(115, 220, 132, 1)',
                    'rgba(0, 200, 128, 1)',
                    'rgba(0, 255, 127, 1)',
                    'rgba(0, 200, 110, 1)',
                    'rgba(37, 94, 31, 1)',
                    'rgba(24, 69, 21, 1)',
                    'rgba(12, 46, 12, 1)'
                ],
                borderColor: [
                    'rgba(118, 185, 86, 1)',
                    'rgba(143, 212, 94, 1)',
                    'rgba(0, 204, 153, 1)',
                    'rgba(115, 220, 132, 1)',
                    'rgba(0, 200, 128, 1)',
                    'rgba(0, 255, 127, 1)',
                    'rgba(0, 200, 110, 1)',
                    'rgba(37, 94, 31, 1)',
                    'rgba(24, 69, 21, 1)',
                    'rgba(12, 46, 12, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            plugins: {
                legend: {
                    position: 'right',
                    align: 'start',
                    labels: {
                        boxWidth: 20,
                        usePointStyle: false
                    }
                }
            }
        }
    });
    $('#pie-graph').data('chart', pieChart);
    mostrar.ocultarSpinner()
}

function limpiarGraficos(id) {
    var canvas = $('#' + id + '-graph');
    var existeGrafica = canvas.data('chart');

    if (existeGrafica) {
        existeGrafica.destroy();
        canvas.removeData('chart');
    }
}

function filtrar() {
    var fechaInicial = $('#start-date').val();
    var fechaFinal = $('#end-date').val();
    console.log(fechaFinal, fechaInicial)
    mostrar.mostrarSpinner()
    $.ajax({
        url: '/ajax_filtro',
        type: 'GET',
        dataType: 'json',
        data: {
            'start_date': fechaInicial,
            'end_date': fechaFinal
        },
        success: function (response) {
            var data = response;
            console.log('data', data)
            var graficas = ['bar', 'line', 'pie']
            graficas.forEach(function(chartId) {
                console.log(chartId)
                limpiarGraficos(chartId);
            });
            generarGraficas(data)
            mostrar.ocultarSpinner()
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
            mostrar.ocultarSpinner()
        }
    });
}