import Mostrar from "./funciones_generales.js";
const mostrar = new Mostrar()

$(document).ready(function (){
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

    $("#graphics-selector li").click(function(){
        $(this).find("a").removeClass("activo");
        $(this).find("a").addClass("activo");
        var target = $(this).data('content');
        $(".cjs-graphic").addClass('d-none');
        $("#" + target + "-graph-content").removeClass('d-none');
    });
})