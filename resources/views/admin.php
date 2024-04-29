<script src="../resources/js/admin.js"></script>
<title>@ - Administrador</title>
<div class="container-fluid">
    <div class="row">
        <!-- Slidebar -->
        <div class="flex-shrink-0 p-3 col-2 vh-100 d-flex flex-column align-items-center" style="background: #07311B">
            <div style="color: #B6F5A2" class="d-inline-flex align-items-center justify-content-center pb-3 mb-3 text-decoration-none border-bottom">
                <span class="material-symbols-outlined d-lg-none" style="font-size: 3rem;">admin_panel_settings</span>
                <span class="material-symbols-outlined d-none d-lg-inline" style="font-size: 2rem;">admin_panel_settings</span>
                <span class="fs-5 fw-semibold ms-1 d-none d-lg-inline">Panel de control</span>
            </div>

            <ul class="rounded fondo border border-secondary list-unstyled">
                <li class="mb-1">
                    <button class="fondo col-12 btn d-inline-flex align-items-center border-0">
                        <span class="max-w material-symbols-outlined d-lg-inline">settings_account_box</span>
                        <span class="ms-2 d-none d-lg-inline">Administrar usuario</span>
                    </button>

                    <button class="fondo col-12 btn rounded border-0 d-inline-flex d-sm-none">
                        <span class="material-symbols-outlined">folder_managed</span>
                    </button>

                    <button class="fondo text-start col-12 btn-toggle d-inline-flex align-items-center border-0 collapsed d-none d-lg-inline border-secondary border-top" data-bs-toggle="collapse" data-bs-target="#opciones-collapse" aria-expanded="false">
                        <span class="material-symbols-outlined">arrow_drop_down</span>
                        <span>Configurar opciones</span>
                    </button>
                    <div class="collapse mb-2 " id="opciones-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li><a href="#" class="ms-5 link-body-emphasis d-inline-flex text-decoration-none">Cambiar Opciones</a></li>
                            <li><a href="#" class="ms-5 link-body-emphasis d-inline-flex text-decoration-none">Cambiar Precio</a></li>
                            <li><a href="#" class="ms-5 link-body-emphasis d-inline-flex text-decoration-none">Cambiar Tiempo/Producto</a></li>
                        </ul>
                    </div>

                    <button class="fondo col-12 btn rounded border-0 d-inline-flex d-sm-none border-top">
                        <span class="material-symbols-outlined">manage_history</span>
                    </button>

                    <button class="fondo text-start col-12 btn-toggle d-inline-flex align-items-center border-0 collapsed border-secondary border-top d-none d-lg-inline" data-bs-toggle="collapse" data-bs-target="#historial-collapse" aria-expanded="false">
                        <span class="material-symbols-outlined">arrow_drop_down</span>
                        <span>Historial</span>
                    </button>
                    <div class="collapse mb-2 " id="historial-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li><a href="#" class="ms-5 link-body-emphasis d-inline-flex text-decoration-none">Histórico de consumo</a></li>
                            <li><a href="#" class="ms-5 link-body-emphasis d-inline-flex text-decoration-none">Gráficas de consumo</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>

        <div class="col container-fluid contenido-principal slide-up">
            <!-- Contenido principal -->
            <div class="container d-flex flex-column bg-white rounded sombreado p-4" style="width: calc(100% - 60px); height: 90%;">
                <div class="col-12">
                    <div class="navbar navbar-expand-lg rounded text-white" style="background: var(--color-secundario)">
                        <div class="container-fluid">
                            <span class="texto-mediano d-flex align-items-center">Administración de Usuario
                                <span class="navbar-toggler custom-navbar-toggler" data-bs-toggle="collapse" data-bs-target="#user-navbar" aria-controls="user-navbar" aria-expanded="false">
                                    <span class="material-symbols-outlined" style="font-size: 2rem;">toc</span>
                                </span>
                            </span>
                            <div class="collapse navbar-collapse" id="user-navbar">
                                <ul class="navbar-nav ms-auto">
                                    <li class="nav-item">
                                        <a class="nav-link item-navbar activo" id="datos-usuario" aria-current="page" href="#">Datos de Usuario</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link item-navbar"  id="agregar-usuario" href="#">Agregar usuario</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="container-fluid mt-3 rounded contenido-secundario d-flex flex-column flex-grow-1">
                        <div id="datos-usuario-contenido" class="cjs-opcion" style="display: none;">
                            <span class="texto-mediano">Datos del usuario</span>
                        </div>
                        <div id="agregar-usuario-contenido" class="cjs-opcion" style="display: none;">
                            <span>Agregar un usuario</span>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
