<title>Historial de consumo</title>
<div class="col container-fluid contenido-principal slide-up">
    <!-- Contenido principal -->
    <div class="container-fluid d-flex flex-column col-12 bg-white rounded sombreado overflow-auto p-3" style="width: calc(100% - 60px);height: 90%">
        <div class="col-12">
            <div class="navbar navbar-expand-lg rounded text-white" style="background: var(--color-secundario); position: sticky;">
                <div class="container-fluid">
                            <span class="texto-mediano d-flex align-items-center" >Administración de Usuario
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

            <div class="toast-container position-fixed bottom-0 end-0 p-3">
                <div id="liveToast" class="toast custom-toast" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                        <span class="material-symbols-outlined">error</span>
                        <span class="ms-2 me-auto">¡Alerta!</span>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body text-dark">
                        Se recomienda cambiar las credenciales.
                    </div>
                </div>
            </div>

            <div class="container-fluid mt-3 rounded contenido-secundario align-items-center">
                <div id="datos-usuario-contenido" class="cjs-opcion container-fluid rounded bg-white slide-up mt-3 mb-3" style="display: none; height: 94%; width:  calc(100% - 10px)">
                    <h1 class="mt-2">Cuenta de administrador.</h1>
                    <div class="row">
                        <div id="config" class="col-12 col-sm-12 p-3">
                            <form id="form-config" class="d-flex flex-column form-control">
                                <div class="d-flex flex-column align-items-center mt-3">
                                    <div style="max-width: 100px;">
                                        <img src="../resources/img/img-perfil.png" style="width: 100%; height: auto;">
                                    </div>
                                    <div>
                                        <a class="texto-muy-pequeno fw-lighter" id="forgot-pass" href="#">Cambiar imagen de perfil</a>
                                    </div>
                                </div>
                                <label class="texto-mediano text-start" for="usuario">Nombre:</label>
                                <div class="input-group input-group-sm d-flex align-items-center">
                                    <input type="text" id="usuario-nombre" class="col texto-pequeno p-1 form-control">
                                    <button class="input-group-text btn" style="color: var(--color-primario)"><span class="material-symbols-outlined">edit_square</span></button>
                                </div>
                                <label class="texto-mediano text-start" for="usuario">Usuario:</label>
                                <input class="col form-control texto-pequeno p-1" id="usuario-username" disabled value="admin">
                                <div class="text-start">
                                    <a class="fw-lighter" id="forgot-pass" data-opcion="usuario" onclick="mostrar_opciones(this.dataset.opcion)">Cambiar nombre de usuaio</a>
                                </div>
                                <label class="texto-mediano text-start" for="contraseña">Contraseña:</label>
                                <input class="col form-control texto-pequeno p-1" id="usuario-contraseña" type="password" disabled value="admin">
                                <div class="text-start">
                                    <a class="fw-lighter" id="forgot-pass" data-opcion="contraseña" onclick="mostrar_opciones(this.dataset.opcion)">Cambiar contraseña</a>
                                </div>
                                <label class="texto-mediano text-start" for="usuario">Correo electrónico:</label>
                                <div class="input-group input-group-sm d-flex align-items-center">
                                    <input type="email" id="usuario-correo" class="col texto-pequeno p-1 form-control">
                                    <button class="input-group-text btn" style="color: var(--color-primario)"><span class="material-symbols-outlined">edit_square</span></button>
                                </div>
                            </form>
                        </div>
                        <div id="cambiar-pass" class="col-12 col-sm-6 slide-up" style="display: none;">
                            <form id="form-update-pass" class="d-flex flex-column form-control">
                                <label class="texto-mediano text-start" for="usuario">Contraseña actual:</label>
                                <div class="input-group input-group-sm d-flex align-items-center mb-2 border-bottom">
                                    <input type="password" id="pass-actual" class="col  p-1 form-control texto-mediano" value="admin">
                                    <button class="cjs-view input-group-text btn" style="color: var(--color-primario)"><span class="material-symbols-outlined">visibility_off</span></button>
                                </div>

                                <label class="texto-mediano text-start" for="usuario">Contraseña nueva:</label>
                                <div class="input-group input-group-sm d-flex align-items-center">
                                    <input type="password" id="pass-new" class="col texto-mediano p-1 form-control">
                                    <button class="cjs-view input-group-text btn" style="color: var(--color-primario)"><span class="material-symbols-outlined">visibility_off</span></button>
                                </div>
                                <label class="texto-mediano text-start" for="usuario">Repita la contraseña:</label>
                                <div class="input-group input-group-sm d-flex align-items-center">
                                    <input type="password" id="pass-new-repeat" class="col texto-mediano p-1 form-control">
                                    <button class="cjs-view input-group-text btn" style="color: var(--color-primario)"><span class="material-symbols-outlined">visibility_off</span></button>
                                </div>
                            </form>
                            <div class="d-flex justify-content-start mt-3">
                                <button class="btn btn-sm btn-success">Guardar</button>
                            </div>
                        </div>

                        <div id="cambiar-user" class="col-12 col-sm-6 slide-up" style="display: none;">
                            <form id="form-update-pass" class="d-flex flex-column form-control">
                                <label class="texto-mediano text-start" for="user-actual">Nombre de usuario:</label>
                                <input type="text" class="col form-control texto-pequeno p-1" id="usuario-username" disabled value="admin">
                                <label class="texto-mediano text-start" for="user-new">Nuevo nombre de usuario:</label>
                                <input type="text" id="user-new" class="col texto-mediano p-1 form-control">
                            </form>
                            <div class="d-flex justify-content-start mt-3">
                                <button class="btn btn-outline-success btn-sm" disabled>Guardar</button>
                                <button class="ms-2 btn btn-success btn-sm">Verificar disponibilidad</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="agregar-usuario-contenido" class="cjs-opcion container bg-white rounded mt-3 mb-3 slide-up" style="display: none; width:  calc(100% - 10px); height: 95%">
                    <h1 class="mt-2">Agrega un nuevo usuario.</h1>
                    <div class="row">
                        <div class="col-12 col-sm-7">
                            <form id="form-config" class="d-flex flex-column form-control">
                                <label class="texto-mediano text-start" for="usuario">Usuario:</label>
                                <input class="col form-control texto-pequeno p-1" id="usuario-nuevo-username" placeholder="Ejemplo: admin">
                                <label class="texto-mediano text-start" for="contraseña">Contraseña:</label>
                                <input class="col form-control texto-pequeno p-1" id="usuario-nuevo-contraseña" type="password"  placeholder="Ejemplo: @123abc">
                                <label class="texto-mediano text-start" for="contraseña">Permiso de usuario:</label>
                                <select class="form-select texto-pequeno" id="usuario-nuevo-permiso" aria-label="Selecciona un permiso">
                                    <option selected>Seleccionar una opción...</option>
                                    <option value="1">Administrador</option>
                                    <option value="2">Solo configura precios</option>
                                    <option value="3">Solo consulta histórico</option>
                                </select>
                            </form>
                            <div class="d-flex justify-content-start mt-3">
                                <button class="btn btn-success btn-sm">Agregar usuario</button>
                            </div>
                        </div>
                        <div class="col-md-5 mt-3 d-none d-lg-inline">
                            <img class="img-fluid" src="../resources/img/personaje-edit.png" class="img-fluid ms-lg-5" alt="Personaje">
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
<div class="container-fluid d-flex justify-content-center align-items-center vh-100">
    <div>
        <h4 class="text-center fw-medium">Historial de ventas.</h4>
        <table class="table">
            <thead>
                <tr>
                    <th class="fw-light">Folio</th>
                    <th class="fw-light">Fecha</th>
                    <th class="fw-light">Producto</th>
                    <th class="fw-light">Opcion</th>
                    <th class="fw-light">Precio</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
            </tbody>
            <tfoot>
            </tfoot>
        </table>
    </div>
</div>