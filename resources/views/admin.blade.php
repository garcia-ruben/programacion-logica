@include('inicio')
<script type="module" src="{{ asset('static/js/admin.js') }}"></script>
<title>@ - Administrador</title>
<div class="container-fluid">
    <div class="row">
        <!-- Slidebar -->
        @include('breadcrums')
        <div class="col container-fluid contenido-principal">
            <!-- Contenido principal -->
            <div class="container-fluid d-flex flex-column col-12 bg-white rounded sombreado overflow-auto p-3" style="width: calc(100% - 60px);height: 90%">
                <!-- alertas -->
                <div class="col-sm-6" id="success" style="display: none">
                    <div class="alert-message alert-message-success">
                        <h4>¡Éxito!</h4>
                        <p id="succes-content">
                    </div>
                </div>
                <div class="col-sm-6" id="error" style="display: none">
                    <div class="alert-message alert-message-danger">
                        <h4>¡Error!</h4>
                        <p id="error-content">
                    </div>
                </div>
                <div class="col-12">
                    <div class="navbar navbar-expand-lg rounded text-white" style="background: var(--color-secundario); position: sticky;">
                        <div class="container-fluid">
                            <span class="texto-mediano d-flex align-items-center" >Administración de Usuario
                                <span class="navbar-toggler custom-navbar-toggler" data-bs-toggle="collapse" data-bs-target="#user-navbar" aria-controls="user-navbar" aria-expanded="false">
                                    <span class="material-symbols-outlined ms-2" style="font-size: 2rem;">toc</span>
                                </span>
                            </span>
                            <div class="collapse navbar-collapse" id="user-navbar">
                                <ul class="navbar-nav ms-auto">
                                    <li class="nav-item">
                                        <a class="nav-link item-navbar activo" id="user-data" aria-current="page" href="#">Datos de Usuario</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link item-navbar"  id="add-user" href="#">Agregar usuario</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="toast-container position-fixed bottom-0 end-0 mb-3 p-3">
                        <div id="liveToast" class="toast custom-toast" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="toast-header">
                                <span class="material-symbols-outlined">error</span>
                                <span class="ms-2 me-auto">¡Alerta!</span>
                                <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
                            </div>
                            <div class="toast-body text-dark">
                                Se recomienda cambiar las credenciales.
                            </div>
                        </div>
                    </div>

                    <div class="container-fluid mt-3 rounded contenido-secundario align-items-center">
                        <div id="user-data-content" class="cjs-opcion container-fluid rounded bg-white slide-up mt-3 mb-3" style="display: none; height: 94%; width:  calc(100% - 10px)">
                            <h1 class="mt-2">Cuenta de administrador.</h1>
                            <div class="row">
                                <div id="config" class="col-12 col-sm-12 p-3">
                                    <form id="form-config" class="d-flex flex-column form-control">
                                        <input id="user-id" type="hidden" value="">
                                        <div class="d-flex flex-column align-items-center mt-3">
                                            <div style="max-width: 100px;">
                                                <img src="{{ asset('static/img/img-perfil.png') }}" style="width: 100%; height: auto;">
                                            </div>
                                            <div>
                                                <a class="texto-muy-pequeno fw-lighter" id="forgot-pass" href="#">Cambiar imagen de perfil</a>
                                            </div>
                                        </div>

                                        <div class="d-flex align-items-center row mt-2">
                                            <label class="texto-mediano text-start" for="usuario">Nombre:</label>
                                            <div class="row">
                                                <div class="col 10">
                                                    <span class="fw-bold texto-mediano col-auto col-sm-auto text-start" id="user-name"></span>
                                                </div>
                                                <div class="col-2 align-items-center d-flex justify-content-end">
                                                    <span class="material-symbols-outlined" type="button" id="edit-username" style="color: var(--color-primario)">edit_square</span>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="text" id="user-new-name" class="col texto-pequeno p-1 form-control" style="display: none">

                                        <label class="texto-mediano text-start mt-2" for="usuario">Usuario:</label>
                                        <input class="col form-control texto-pequeno p-1" id="user-username" disabled>
                                        <div class="text-start">
                                            <a class="fw-lighte cjs-change" data-opcion="usuario">Cambiar nombre de usuaio</a>
                                        </div>

                                        <label class="texto-mediano text-start mt-2" for="contraseña">Contraseña:</label>
                                        <input class="col form-control texto-pequeno p-1" id="user-password" type="password" disabled>
                                        <div class="text-start">
                                            <a class="fw-lighter cjs-change" data-opcion="contraseña">Cambiar contraseña</a>
                                        </div>

                                        <div class="d-flex align-items-center row mt-2">
                                            <label class="texto-mediano text-start col-auto" for="usuario">Correo electrónico:</label>
                                            <div class="col-10">
                                                <span class="fw-bold texto-mediano text-start col-auto" id="user-email" style="display: inline-block; max-width: 100%; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;"></span>
                                            </div>
                                            <div class="col-2 align-items-center d-flex justify-content-end">
                                                <span class="material-symbols-outlined" type="button" id="edit-email" style="var(--color-primario)">edit_square</span>
                                            </div>
                                        </div>
                                        <input type="email" id="user-new-email" class="col texto-pequeno p-1 form-control" style="display: none">
                                        <div class="text-start mt-2" style="display: none" id="save-user">
                                            <button type="button" class="btn btn-md boton"  id="save-email-name" style="width: 100%">Guardar</button>
                                        </div>
                                    </form>
                                </div>
                                <div id="change-pass" class="col-12 col-sm-6 slide-up" style="display: none;">
                                    <form id="form-update-pass" class="d-flex flex-column form-control">
                                        <label class="texto-mediano text-start" for="usuario">Contraseña actual:</label>
                                        <div class="input-group input-group-sm d-flex align-items-center mb-2 border-bottom">
                                            <input type="password" id="pass-actual" class="col  p-1 form-control texto-mediano">
                                            <button class="cjs-view input-group-text btn" style="color: var(--color-primario)"><span class="material-symbols-outlined">visibility_off</span></button>
                                        </div>
                                        <div class="texto-muy-pequeno text-start mt-2">
                                            <p>La contraseña debe cumplir con los siguientes requisitos:</p>
                                            <ul>
                                                <li>Al menos 8 caracteres de longitud.</li>
                                                <li>Al menos una letra minúscula.</li>
                                                <li>Al menos una letra mayúscula.</li>
                                                <li>Al menos un dígito.</li>
                                                <li>Al menos un carácter especial: @$!%*?&</li>
                                            </ul>
                                        </div>
                                        <label class="texto-mediano text-start" for="pass-new">Contraseña nueva:</label>
                                        <div class="input-group input-group-sm d-flex align-items-center">
                                            <input type="password" id="pass-new" name="pass" class="col texto-mediano p-1 form-control">
                                            <button class="cjs-view input-group-text btn" style="color: var(--color-primario)"><span class="material-symbols-outlined">visibility_off</span></button>
                                        </div>
                                        <label class="texto-mediano text-start" for="pass-new-repeatas">Repita la contraseña:</label>
                                        <div class="input-group input-group-sm d-flex align-items-center">
                                            <input type="password" id="pass-new-repeat" name="pass_repeat" class="col texto-mediano p-1 form-control">
                                            <button class="cjs-view input-group-text btn" style="color: var(--color-primario)"><span class="material-symbols-outlined">visibility_off</span></button>
                                        </div>
                                        <div class="d-flex justify-content-start mt-3">
                                            <button type="button" id="save-password" class="btn btn-sm boton" disabled>Guardar</button>
                                        </div>
                                    </form>
                                </div>

                                <div id="change-user" class="col-12 col-sm-6 slide-up" style="display: none;">
                                    <form id="form-update-username" class="d-flex flex-column form-control">
                                        <label class="texto-mediano text-start" for="user-actual">Nombre de usuario:</label>
                                        <input type="text" class="col form-control texto-pequeno p-1" id="username-actual" disabled>
                                        <label class="texto-mediano text-start" for="user-new">Nuevo nombre de usuario:</label>
                                        <input type="text" id="new-user" class="col texto-mediano p-1 form-control">
                                        <div class="d-flex justify-content-start mt-3">
                                            <button type="button" id="save-username" class="btn boton con-borde btn-sm" disabled>Guardar</button>
                                            <div class="text-start" style="display: none" id="verify-username">
                                                <button type="button" class="ms-2 btn boton btn-sm"  id="verify-button-name">Verificar disponibilidad</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div id="add-user-content" class="cjs-opcion container bg-white rounded mt-3 mb-3 slide-up" style="display: none; width:  calc(100% - 10px); height: 95%">
                            <h1 class="mt-2">Agrega un nuevo usuario.</h1>
                            <div class="row">
                                <div class="col-12 col-sm-7">
                                    <form id="form-add" class="d-flex flex-column form-control">
                                        <label class="texto-mediano text-start" for="new-user-username">Usuario:</label>
                                        <input class="col form-control texto-pequeno p-1" id="new_user_username" name="new_user_username" placeholder="Ejemplo: admin">
                                        <label class="texto-mediano text-start" for="new-user-password">Contraseña:</label>
                                        <input class="col form-control texto-pequeno p-1" id="new_user_password" name="new_user_password" type="password"  placeholder="Ejemplo: @123abc">
                                        <label class="texto-mediano text-start" for="contraseña">Permiso de usuario:</label>
                                        <select class="form-select texto-pequeno" id="new_user_permissions" name="new_user_permissions" aria-label="Selecciona un permiso">
                                            <option value="" selected>Seleccionar una opción...</option>
                                        </select>
                                    </form>
                                    <div class="d-flex justify-content-start mt-3">
                                        <button type="button" id="save-add-user" class="btn boton btn-sm">Agregar usuario</button>
                                    </div>
                                </div>
                                <div class="col-md-5 mt-3 d-none d-lg-inline">
                                    <img class="img-fluid" src="{{ asset('static/img/personaje-edit.png') }}" class="img-fluid ms-lg-5" alt="Personaje">
                                </div>
                            </div>
                            <div id="informative-carousel" class="carousel slide mt-3" data-bs-ride="carousel">
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#informative-carousel" data-bs-slide-to="0" class="active" aria-label="Slide 1" aria-current="true"></button>
                                    <button type="button" data-bs-target="#informative-carousel" data-bs-slide-to="1" class=""></button>
                                    <button type="button" data-bs-target="#informative-carousel" data-bs-slide-to="2" class=""></button>
                                </div>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <svg class="bd-placeholder-img rounded" width="100%" style="background-color: var(--color-primario); height: 100px"></svg>
                                        <div class="container mt-3">
                                            <div class="carousel-caption text-start">
                                                <h1>¡Usuario administrador!</h1>
                                                <span class="opacity-75 texto-pequeno">Recuerda que usuario tendrá todos los permisos para crear, eliminar o modificar.</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <svg class="bd-placeholder-img rounded" width="100%" height="100%" style="background-color: var(--color-primario); max-height: 100px"></svg>
                                        <div class="container mt-3">
                                            <div class="carousel-caption text-start">
                                                <h1>Análisis de consumo.</h1>
                                                <span class="opacity-75 texto-pequeno">En la pestaña <span class="text-white fw-bold ">Historial </span>podrás ver un resumen del consumo.</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <svg class="bd-placeholder-img rounded" width="100%" height="100%" style="background-color: var(--color-primario); max-height: 100px"></svg>
                                        <div class="container mt-3">
                                            <div class="carousel-caption text-start">
                                                <h1>Opciones de configuración.</h1>
                                                <span class="opacity-75 texto-pequeno">No olvides que puedes cambiar los precios y tiempos de las opciones de manera remota.</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#informative-carousel" data-bs-slide="prev">
                                    <span class="material-symbols-outlined">arrow_back_ios</span>
                                    <span class="visually-hidden">Anterior</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#informative-carousel" data-bs-slide="next">
                                    <span class="material-symbols-outlined">arrow_forward_ios</span>
                                    <span class="visually-hidden">Siguiente</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>