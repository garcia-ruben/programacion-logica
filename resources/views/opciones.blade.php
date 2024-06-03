@include('inicio')
<script type="module" src="{{ asset('static/js/opciones.js') }}"></script>
<title>Configurador de opciones</title>
<div class="container-fluid">
    <div class="row">
        <!-- Slidebar -->
        @include('breadcrums')
        <div class="col container-fluid contenido-principal slide-up">
            <!-- Contenido principal -->
            <div class="container-fluid d-flex flex-column col-12 bg-white rounded sombreado overflow-auto p-3" style="width: calc(100% - 60px);height: 90%">
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
                            <span class="texto-mediano d-flex align-items-center" >Opciones</span>
                        </div>
                    </div>

                    <div class="container-fluid mt-3 rounded contenido-secundario align-items-center mb-3" style="height: 100%">
                        <div id="change-option-content" class="cjs-opcion container-fluid rounded bg-white slide-up mt-3 mb-3" style="height: 94%; width:  calc(100% - 10px)">
                            <h1 class="mt-2">Lista de opciones.</h1>
                            <div class="row">
                                <div id="config" class="col-12 col-sm-12 p-3 align-items-center">
                                    <div class="mb-2 ms-1 me-1 row align-items-center border rounded p-1">
                                        <div class="col-sm-12 col">
                                            <label class="texto-mediano text-start" for="option-1-name">Opción 1:</label>
                                        </div>
                                        <div class="col-sm-12 col-lg-4">
                                            <div class="input-group align-items-center">
                                                <input id="option-1-name" class="form-control texto-mediano cjs-select" disabled></input>
                                                <button class="cjs-view input-group-text btn" style="color: var(--color-primario)"><span class="material-symbols-outlined">edit</span></button>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-lg-2">
                                            <div class="input-group align-items-center">
                                                <div class="input-group-text"><span class="material-symbols-outlined" style="color: var(--color-primario)">price_change</span></div>
                                                <input type="number" id="option-1-price" class="form-control texto-mediano">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-lg-4">
                                            <div class="input-group align-items-center rounded">
                                                <span class="input-group-text d-none d-lg-inline">Tiempo actual:</span>
                                                <input id="option-1-time-value" type="text" class="form-control texto-pequeno" disabled></input>
                                                <button id="option-1-time" class="cjs-time input-group-text btn" data-bs-toggle="modal" data-bs-target="#modal-time" style="color: var(--color-primario)"><span class="material-symbols-outlined">manage_history</span></button>
                                            </div>
                                        </div>
                                        <!--<div class="col-sm-6 col-lg-2">
                                            <a class="btn boton cjs-time" href="#" role="button" id="option-1-time">Cambiar tiempo</a>
                                        </div>-->
                                        <div class="col-sm-6 col-lg-2 text-center">
                                            <button class="btn boton con-borde" id="save-option-1" disabled>Actualizar</button>
                                        </div>
                                    </div>
                                    <div class="mb-2 ms-1 me-1 row align-items-center border rounded p-1">
                                        <div class="col-sm-12 col">
                                            <label class="texto-mediano text-start" for="option-2-name">Opción 2:</label>
                                        </div>
                                        <div class="col-sm-12 col-lg-4">
                                            <div class="input-group align-items-center">
                                                <input id="option-2-name" class="form-control rounded texto-mediano cjs-select" disabled></input>
                                                <button class="cjs-view input-group-text btn" style="color: var(--color-primario)"><span class="material-symbols-outlined">edit</span></button>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-lg-2">
                                            <div class="input-group align-items-center">
                                                <div class="input-group-text"><span class="material-symbols-outlined" style="color: var(--color-primario)">price_change</span></div>
                                                <input type="number" id="option-2-price" class="form-control texto-mediano">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-lg-4">
                                            <div class="input-group align-items-center rounded">
                                                <span class="input-group-text d-none d-lg-inline">Tiempo actual:</span>
                                                <input id="option-2-time-value" type="text" class="form-control texto-pequeno" disabled></input>
                                                <button id="option-2-time" class="cjs-time input-group-text btn" data-bs-toggle="modal" data-bs-target="#modal-time" style="color: var(--color-primario)"><span class="material-symbols-outlined">manage_history</span></button>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-lg-2 text-center">
                                            <button class="btn boton con-borde" id="save-option-2" disabled>Actualizar</button>
                                        </div>
                                    </div>
                                    <div class="mb-2 ms-1 me-1 row align-items-center border rounded p-1">
                                        <div class="col-sm-12 col">
                                            <label class="texto-mediano text-start" for="option-3-name">Opción 3:</label>
                                        </div>
                                        <div class="col-sm-12 col-lg-4">
                                            <div class="input-group align-items-center">
                                                <input id="option-3-name" class="form-control rounded texto-mediano cjs-select" disabled></input>
                                                <button class="cjs-view input-group-text btn" style="color: var(--color-primario)"><span class="material-symbols-outlined">edit</span></button>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-lg-2">
                                            <div class="input-group align-items-center">
                                                <div class="input-group-text"><span class="material-symbols-outlined" style="color: var(--color-primario)">price_change</span></div>
                                                <input type="number" id="option-3-price" class="form-control texto-mediano">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-lg-4">
                                            <div class="input-group align-items-center rounded">
                                                <span class="input-group-text d-none d-lg-inline">Tiempo actual:</span>
                                                <input id="option-3-time-value" type="text" class="form-control texto-pequeno" disabled></input>
                                                <button id="option-3-time" class="cjs-time input-group-text btn" data-bs-toggle="modal" data-bs-target="#modal-time" style="color: var(--color-primario)"><span class="material-symbols-outlined">manage_history</span></button>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-lg-2 text-center">
                                            <button class="btn boton con-borde" id="save-option-3" disabled>Actualizar</button>
                                        </div>
                                    </div>
                                    <div class="mb-2 ms-1 me-1 row align-items-center border rounded p-1">
                                        <div class="col-sm-12 col">
                                            <label class="texto-mediano text-start" for="option-4-name">Opción 4:</label>
                                        </div>
                                        <div class="col-sm-12 col-lg-4">
                                            <div class="input-group align-items-center">
                                                <input id="option-4-name" class="form-control rounded texto-mediano cjs-select" disabled></input>
                                                <button class="cjs-view input-group-text btn" style="color: var(--color-primario)"><span class="material-symbols-outlined">edit</span></button>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-lg-2">
                                            <div class="input-group align-items-center">
                                                <div class="input-group-text"><span class="material-symbols-outlined" style="color: var(--color-primario)">price_change</span></div>
                                                <input type="number" id="option-4-price" class="form-control texto-mediano">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-lg-4">
                                            <div class="input-group align-items-center rounded">
                                                <span class="input-group-text d-none d-lg-inline">Tiempo actual:</span>
                                                <input id="option-4-time-value" type="text" class="form-control texto-pequeno" disabled></input>
                                                <button id="option-4-time" class="cjs-time input-group-text btn" data-bs-toggle="modal" data-bs-target="#modal-time" style="color: var(--color-primario)"><span class="material-symbols-outlined">manage_history</span></button>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-lg-2 text-center">
                                            <button class="btn boton con-borde" id="save-option-4" disabled>Actualizar</button>
                                        </div>
                                    </div>
                                    <div class="mb-2 ms-1 me-1 row align-items-center border rounded p-1">
                                        <div class="col-sm-12 col">
                                            <label class="texto-mediano text-start" for="option-5-name">Opción 5:</label>
                                        </div>
                                        <div class="col-sm-12 col-lg-4">
                                            <div class="input-group align-items-center">
                                                <input id="option-5-name" class="form-control rounded texto-mediano cjs-select" disabled></input>
                                                <button class="cjs-view input-group-text btn" style="color: var(--color-primario)"><span class="material-symbols-outlined">edit</span></button>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-lg-2">
                                            <div class="input-group align-items-center">
                                                <div class="input-group-text"><span class="material-symbols-outlined" style="color: var(--color-primario)">price_change</span></div>
                                                <input type="number" id="option-5-price" class="form-control texto-mediano">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-lg-4">
                                            <div class="input-group align-items-center rounded">
                                                <span class="input-group-text d-none d-lg-inline">Tiempo actual:</span>
                                                <input id="option-5-time-value" type="text" class="form-control texto-pequeno" disabled></input>
                                                <button id="option-5-time" class="cjs-time input-group-text btn" data-bs-toggle="modal" data-bs-target="#modal-time" style="color: var(--color-primario)"><span class="material-symbols-outlined">manage_history</span></button>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-lg-2 text-center">
                                            <button class="btn boton con-borde" id="save-option-5" disabled>Actualizar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- CRONOMETRO -->
<div class="modal fade modal-lg" id="modal-time" tabindex="-1" data-bs-backdrop="static" aria-labelledby="modal-time-label" aria-hidden="true" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header custom-header">
                <h5 class="modal-title" id="modal-time-label">Selecciona el tiempo en el cronómetro.</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <h1 style="color: var(--color-primario);">Cronómetro</h1>
                <div class="cronometro" id="chronometer" style="color: var(--color-primario);">00:00</div>
                <div class="mt-2 d-flex align-items-center justify-content-center">
                    <button class="btn boton d-flex align-items-center cjs-start">
                        <span class="material-symbols-outlined" style="font-size: 40px" title="Iniciar">not_started</span>
                    </button>
                    <button class="ms-2 btn boton d-flex align-items-center cjs-pause">
                        <span class="material-symbols-outlined" style="font-size: 40px">pause_circle</span>
                    </button>
                    <button class="ms-2 btn boton d-flex align-items-center cjs-stop">
                        <span class="material-symbols-outlined" style="font-size: 40px" title="Detener">stop_circle</span>
                    </button>
                </div>
                <input type="hidden" id="chronometer-value" name="chronometer-value">
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="button" class="btn boton cjs-savetime" data-bs-target="#modal-time-confirm" data-bs-toggle="modal" style="color: var(--color-primario); border-radius: 15px; width: 50%">
                    Guardar tiempo
                </button>

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-time-confirm" aria-hidden="true" data-bs-backdrop="static"  aria-labelledby="confirm-time" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header custom-header-alert">
                <h1 class="modal-title fs-5" id="confirm-time">¡Alerta!</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="color: black">
                <span>El tiempo del Producto <span id="id-option"></span> </span></span><span id="new-time-confirm"></span>
            </div>
            <div class="modal-footer custom-footer-alert">
                <button class="btn boton" data-bs-target="#modal-time" data-bs-toggle="modal" style="background: #F2BE22">Regresar</button>
                <button class="btn boton" id="confirm-time-button" style="background: #cb3234">Guardar</button>
            </div>
        </div>
    </div>
</div>
