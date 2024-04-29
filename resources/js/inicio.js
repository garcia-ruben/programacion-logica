function mostrar_spinner() {
    $('#mostrarSpinner').click(function(event) {
        event.preventDefault();
        $('#spinner-overlay').fadeIn();
        setTimeout(function() {
            $('#spinner-overlay').fadeOut();
        }, 3000);
    });
    $(window).on('load', function() {
        $('#spinner-overlay').hide();
    });
}