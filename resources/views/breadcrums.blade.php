<div class="container-fluid d-lg-none p-2" style="background: #07311B">
    <div class="nav col-12 d-flex align-items-center justify-content-center">
        <span class="material-symbols-outlined"  style="color: #B6F5A2">water_drop</span>
        <li><a href="#" class="px-2 texto-muy-pequeno text-white">Administrar usuario</a></li>
        <li><a href="#" class="px-2 texto-muy-pequeno text-white">Configurar Opciones</a></li>
        <li><a href="#" class="px-2 texto-muy-pequeno text-white">Historial</a></li>
    </div>
</div>

<div class="flex-shrink-0 p-3 col-2 d-none d-lg-inline vh-100 d-flex flex-column align-items-center" style="background: #07311B">
    <div style="color: #B6F5A2" class="d-flex align-items-center justify-content-center pb-3 mb-3 text-decoration-none border-bottom">
        <span class="material-symbols-outlined d-lg-none" style="font-size: 3rem;">admin_panel_settings</span>
        <span class="material-symbols-outlined d-none d-lg-inline" style="font-size: 2rem;">admin_panel_settings</span>
        <span class="fs-5 fw-semibold ms-1 d-none d-lg-inline">Panel de control</span>
    </div>

    <ul class="rounded fondo border border-secondary list-unstyled">
        <li class="mb-1">
            <button class="fondo col-12 btn d-inline-flex border-0">
                <span class="max-w material-symbols-outlined d-lg-inline">settings_account_box</span>
                <span class="texto-pequeno ms-2 d-none d-lg-inline">Administrar usuario</span>
            </button>

            <button class="fondo text-start col-12 btn-toggle d-inline-flex align-items-center border-0 collapsed d-none d-lg-flex border-secondary border-top" id="options-toggle" data-bs-toggle="collapse" data-bs-target="#options-collapse" aria-expanded="false">
                <span class="material-symbols-outlined">expand_more</span>
                <span class="texto-pequeno">Configurar opciones</span>
            </button>
            <div class="collapse mb-2 " id="options-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a href="#" class="ms-5 link-body-emphasis d-inline-flex text-decoration-none">Cambiar Opciones</a></li>
                    <li><a href="#" class="ms-5 link-body-emphasis d-inline-flex text-decoration-none">Cambiar Precio</a></li>
                    <li><a href="#" class="ms-5 link-body-emphasis d-inline-flex text-decoration-none">Cambiar Tiempo/Producto</a></li>
                </ul>
            </div>
            <button class="fondo text-start col-12 btn-toggle d-inline-flex align-items-center border-0 collapsed border-secondary border-top d-none d-lg-flex" id="history-toggle" data-bs-toggle="collapse" data-bs-target="#history-collapse" aria-expanded="false">
                <span class="material-symbols-outlined">expand_more</span>
                <span class="texto-pequeno">Historial</span>
            </button>
            <div class="collapse mb-2 " id="history-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a href="#" class="ms-5 link-body-emphasis d-inline-flex text-decoration-none">Histórico de consumo</a></li>
                    <li><a href="#" class="ms-5 link-body-emphasis d-inline-flex text-decoration-none">Gráficas de consumo</a></li>
                </ul>
            </div>
        </li>
    </ul>
    <script>
        $('#options-toggle, #history-toggle').click(function () {
           var icon = $(this).find('.material-symbols-outlined');
           if (icon.text() === 'expand_more') {
               icon.animate({ 'font-size': '1.2rem' }, 100).text('expand_less').animate({ 'font-size': '1.5rem' }, 100);
           } else {
               icon.animate({ 'font-size': '1.2rem' }, 100).text('expand_more').animate({ 'font-size': '1.5rem' }, 100);
           }
         });
    </script>
</div>
