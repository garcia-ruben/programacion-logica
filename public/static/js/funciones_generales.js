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
}

export default Mostrar;