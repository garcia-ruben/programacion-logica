<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-datepicker@1.10.0/dist/css/bootstrap-datepicker3.min.css">
    <!-- estilos css -->
    <link rel="stylesheet" href="{{ asset('static/css/main.css') }}">
    <!-- graficas --->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.2/dist/chart.umd.min.js"></script>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
</head>
<body>
    <div id="spinner-overlay" style="display: none;">
        <div class="spinner-border" role="status" style="width: 5rem; height: 5rem;"></div>
    </div>
    <!-- mandar llamar las vistas en el index que verá el usuario -->
    <script type="text/javascript">
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
    </script>
    <footer>
        <section class="container d-flex flex-column flex-md-row justify-content-between text-center">
            <a class="text-white" href="https://villahermosa.tecnm.mx/">2024 © TecNM Campus Villahermosa ®.</a>
        </section>
    </footer>
    <!-- javascript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.es.min.js"></script>
</body>
</html>
