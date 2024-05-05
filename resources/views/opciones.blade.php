<title>Configurador de opciones</title>
<div class="container-fluid">
    <div class="row">
        <!-- Slidebar -->
        @include('breadcrums')
        <div class="col container-fluid contenido-principal slide-up">
            <!-- Contenido principal -->
            <div class="container-fluid d-flex flex-column col-12 bg-white rounded sombreado overflow-auto p-3" style="width: calc(100% - 60px);height: 90%">
                <div class="col-12">
                    <div class="navbar navbar-expand-lg rounded text-white" style="background: var(--color-secundario); position: sticky;">
                        <div class="container-fluid">
                            <span class="texto-mediano d-flex align-items-center" >Opciones</span>
                        </div>
                    </div>

                    <div class="container-fluid mt-3 rounded contenido-secundario align-items-center" style="height: 100%">
                        <div id="change-option-content" class="cjs-opcion container-fluid rounded bg-white slide-up mt-3 mb-3" style="height: 94%; width:  calc(100% - 10px)">
                            <h1 class="mt-2">Lista de opciones.</h1>
                            <div class="row">
                                <div id="config" class="col-12 col-sm-12 p-3">
                                    <div class="mb-2 row align-items-center">
                                        <div class="col-sm-12 col-lg-2">
                                            <label class="texto-mediano text-start" for="option-1-name">Producto 1:</label>
                                        </div>
                                        <div class="col-sm-12 col-lg-4">
                                            <div class="input-group align-items-center">
                                                <input type="text" id="option-1-name" class="form-control rounded texto-mediano" value="Agua" disabled>
                                                <button class="cjs-view input-group-text btn" style="color: var(--color-primario)"><span class="material-symbols-outlined">edit</span></button>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-lg-2">
                                            <div class="input-group align-items-center">
                                                <div class="input-group-text"><span class="material-symbols-outlined" style="color: var(--color-primario)">price_change</span></div>
                                                <input type="number" id="option-1-price" class="form-control texto-mediano">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-lg-2">
                                            <a class="btn boton" href="#" role="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas-time" aria-controls="offcanvas-time">Cambiar tiempo</a>
                                        </div>
                                        <div class="col-sm-6 col-lg-2">
                                            <button class="btn boton con-borde" disabled>Guardar</button>
                                        </div>
                                    </div>
                                    <div class="mb-2 row align-items-center">
                                        <div class="col-sm-12 col-lg-2">
                                            <label class="texto-mediano text-start" for="option-2-name">Producto 2:</label>
                                        </div>
                                        <div class="col-sm-12 col-lg-4">
                                            <div class="input-group align-items-center">
                                                <input type="text" id="option-2-name" class="form-control rounded texto-mediano" value="Agua" disabled>
                                                <button class="cjs-view input-group-text btn" style="color: var(--color-primario)"><span class="material-symbols-outlined">edit</span></button>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-lg-2">
                                            <div class="input-group align-items-center">
                                                <div class="input-group-text"><span class="material-symbols-outlined" style="color: var(--color-primario)">price_change</span></div>
                                                <input type="number" id="option-2-price" class="form-control texto-mediano">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-lg-2">
                                            <a class="btn boton" href="#" role="button">Cambiar tiempo</a>
                                        </div>
                                        <div class="col-sm-6 col-lg-2">
                                            <button class="btn boton con-borde" disabled>Guardar</button>
                                        </div>
                                    </div>
                                    <div class="mb-2 row align-items-center">
                                        <div class="col-sm-12 col-lg-2">
                                            <label class="texto-mediano text-start" for="option-3-name">Producto 3:</label>
                                        </div>
                                        <div class="col-sm-12 col-lg-4">
                                            <div class="input-group align-items-center">
                                                <input type="text" id="option-3-name" class="form-control rounded texto-mediano" value="Agua" disabled>
                                                <button class="cjs-view input-group-text btn" style="color: var(--color-primario)"><span class="material-symbols-outlined">edit</span></button>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-lg-2">
                                            <div class="input-group align-items-center">
                                                <div class="input-group-text"><span class="material-symbols-outlined" style="color: var(--color-primario)">price_change</span></div>
                                                <input type="number" id="option-3-price" class="form-control texto-mediano">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-lg-2">
                                            <a class="btn boton" href="#" role="button">Cambiar tiempo</a>
                                        </div>
                                        <div class="col-sm-6 col-lg-2">
                                            <button class="btn boton con-borde" disabled>Guardar</button>
                                        </div>
                                    </div>
                                    <div class="mb-2 row align-items-center">
                                        <div class="col-sm-12 col-lg-2">
                                            <label class="texto-mediano text-start" for="option-4-name">Producto 4:</label>
                                        </div>
                                        <div class="col-sm-12 col-lg-4">
                                            <div class="input-group align-items-center">
                                                <input type="text" id="option-4-name" class="form-control rounded texto-mediano" value="Agua" disabled>
                                                <button class="cjs-view input-group-text btn" style="color: var(--color-primario)"><span class="material-symbols-outlined">edit</span></button>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-lg-2">
                                            <div class="input-group align-items-center">
                                                <div class="input-group-text"><span class="material-symbols-outlined" style="color: var(--color-primario)">price_change</span></div>
                                                <input type="number" id="option-4-price" class="form-control texto-mediano">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-lg-2">
                                            <a class="btn boton" href="#" role="button">Cambiar tiempo</a>
                                        </div>
                                        <div class="col-sm-6 col-lg-2">
                                            <button class="btn boton con-borde" disabled>Guardar</button>
                                        </div>
                                    </div>
                                    <div class="mb-2 row align-items-center">
                                        <div class="col-sm-12 col-lg-2">
                                            <label class="texto-mediano text-start" for="option-5-name">Producto 5:</label>
                                        </div>
                                        <div class="col-sm-12 col-lg-4">
                                            <div class="input-group align-items-center">
                                                <input type="text" id="option-5-name" class="form-control rounded texto-mediano" value="Agua" disabled>
                                                <button class="cjs-view input-group-text btn" style="color: var(--color-primario)"><span class="material-symbols-outlined">edit</span></button>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-lg-2">
                                            <div class="input-group align-items-center">
                                                <div class="input-group-text"><span class="material-symbols-outlined" style="color: var(--color-primario)">price_change</span></div>
                                                <input type="number" id="option-5-price" class="form-control texto-mediano">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-lg-2">
                                            <a class="btn boton" href="#" role="button">Cambiar tiempo</a>
                                        </div>
                                        <div class="col-sm-6 col-lg-2">
                                            <button class="btn boton con-borde" disabled>Guardar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <script type="text/javascript">
                                if ($(window).width() < 576) {
                                    $('.row .btn').addClass('btn-sm mb-2');
                                }
                            </script>
                        </div>
                        <div class="offcanvas" tabindex="-1" id="offcanvas-time" aria-labelledby="offcanvas-time-label" style="height: 50%; width: 100%">
                            <div class="offcanvas-header">
                                <h1 class="offcanvas-title" id="offcanvas-filter-label" style="color:var(--color-primario)">Selecciona el tiempo en el cronómetro:</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body d-flex align-items-center">
                                <div class="container text-center">
                                    <h1 style="color:var(--color-primario)">Cronómetro</h1>
                                    <div class="cronometro d-flex justify-content-center" id="chronometer" style="color:var(--color-primario)">00:00</div>
                                        <div class="mt-2 d-flex align-items-center justify-content-center">
                                            <button class="btn boton d-flex align-items-center" onclick="iniciarCronometro()">
                                                <span class="material-symbols-outlined" style="font-size: 40px">not_started</span>
                                            </button>
                                            <button class="ms-2 btn boton d-flex align-items-center" onclick="iniciarCronometro()">
                                                <span class="material-symbols-outlined" style="font-size: 40px">play_circle</span>
                                            </button>
                                            <button class="ms-2 btn boton d-flex align-items-center" onclick="iniciarCronometro()">
                                                <span class="material-symbols-outlined" style="font-size: 40px">stop_circle</span>
                                            </button>
                                        </div>
                                    <input type="hidden" id="chronometer-value" name="chronometer-value">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>