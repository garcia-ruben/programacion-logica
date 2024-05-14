class Mostrar {
    constructor() {
        this.itemSeleccionadoAnterior = null;
        this.itemSeleccionadoActual = null;
        this.inicializarEventos();
        this.mostrarContenidoInicial();
    }

    inicializarEventos() {
        $('.item-navbar').click((event) => {
            this.actualizarSeleccion(event.target);
        });
    }

    mostrarContenidoInicial() {
        const contenidoInicial = $('.item-navbar.activo');
        if (contenidoInicial.length > 0) {
            this.itemSeleccionadoActual = contenidoInicial.attr('id');
            $('#' + this.itemSeleccionadoActual + '-content').show();
        }
    }

    actualizarSeleccion(elemento) {
        $('.item-navbar').removeClass('activo');
        $(elemento).addClass('activo');
        this.itemSeleccionadoActual = $(elemento).attr('id');
        $('.cjs-opcion').hide();
        $('#' + this.itemSeleccionadoActual + '-content').show();
        if (this.itemSeleccionadoAnterior !== this.itemSeleccionadoActual && this.itemSeleccionadoAnterior) {
            $('#' + this.itemSeleccionadoAnterior + '-content').hide();
        }
        this.itemSeleccionadoAnterior = this.itemSeleccionadoActual;
    }

    mostrarSpinner() {
        $('#spinner-overlay').fadeIn();
    }

    ocultarSpinner() {
        $('#spinner-overlay').fadeOut();
    }
    playSound() {
        var audio = $("#notification")[0];
        audio.play();
    }

    alertError(message) {
        $('#error-content').html(message)
        $('#error').css({opacity: 0, zIndex: 9999}).show().animate({ opacity: 1 }, 1000);
        setTimeout(function() {
            $('#error').animate({ opacity: 0 }, 1000, function() {
                $(this).hide();
            });
        }, 5000);
        this.ocultarSpinner()
        this.playSound()
    }

    alertSuccess(message) {
        $('#succes-content').html(message)
        $('#success').css({opacity: 0, zIndex: 9999}).show().animate({opacity: 1}, 1000);
        setTimeout(function () {
            $('#success').animate({opacity: 0}, 1000, function () {
                $(this).hide();
            });
        }, 5000);
        this.ocultarSpinner()
        this.playSound()
    }
}

export default Mostrar;