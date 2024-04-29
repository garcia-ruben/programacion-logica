$(document).ready(function() {
    $('.cjs-opcion').hide()
    var seleccion = mostrar_contenido()
    console.log(seleccion)

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

