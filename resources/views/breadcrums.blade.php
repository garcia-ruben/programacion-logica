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

    <ul class="container-fluid list-unstyled p-0">
        <li class="fondo rounded mb-1">
            <a class="col-12 btn btn-custom d-inline-flex border-0" href="/admin">
                <span class="max-w material-symbols-outlined d-lg-inline">settings_account_box</span>
                <span class="texto-pequeno ms-2 d-none d-lg-inline">Administrar usuario</span>
            </a>

            <a class="col-12 btn btn-custom d-inline-flex d-none d-lg-flex align-items-center btn-custom-bordered" href="/opciones">
                <span class="material-symbols-outlined">settings_applications</span>
                <span class="ms-2 texto-pequeno">Configurar opciones</span>
            </a>

            <button class="text-start btn-custom col-12 btn btn-toggle d-inline-flex align-items-center border-0 collapsed d-none d-lg-flex" id="history-toggle" data-bs-toggle="collapse" data-bs-target="#history-collapse" aria-expanded="false">
                <span class="material-symbols-outlined">expand_more</span>
                <span class="texto-pequeno">Historial</span>
            </button>
            <div class="collapse mb-2 " id="history-collapse">
                <ul class="btn-toggle-nav fw-normal pb-1 small">
                    <li><a href="/historial/historico" class="link-body-emphasis d-inline-flex text-decoration-none">Histórico de consumo</a></li>
                    <li><a href="/historial/grafico" class="link-body-emphasis d-inline-flex text-decoration-none">Gráficas de consumo</a></li>
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
