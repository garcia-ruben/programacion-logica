<script type="module" src="../resources/js/historial.js"></script>
<title>Historial de consumo</title>
<div class="container-fluid">
    <div class="row">
        <?php include 'breadcrums.php'?>
        <div class="col container-fluid contenido-principal slide-up">
            <!-- Contenido principal -->
            <div class="container-fluid d-flex flex-column col-12 bg-white rounded sombreado overflow-auto p-3" style="width: calc(100% - 60px);height: 90%">
                <div class="col-12">
                    <div class="navbar navbar-expand-lg rounded text-white" style="background: var(--color-secundario); position: sticky;">
                        <div class="container-fluid">
                            <span class="texto-mediano d-flex align-items-center"><span>Historial</span>
                                <span class="navbar-toggler custom-navbar-toggler" data-bs-toggle="collapse" data-bs-target="#history-navbar" aria-controls="history-navbar" aria-expanded="false" style="right: 0">
                                    <span class="material-symbols-outlined ms-2" style="font-size: 2rem;">toc</span>
                                </span>
                            </span>
                            <div class="collapse navbar-collapse" id="history-navbar">
                                <ul class="navbar-nav ms-auto">
                                    <li class="nav-item">
                                        <a class="nav-link item-navbar" id="history-consume" href="#">Histórico de Consumo</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link item-navbar activo"  id="history-graphics" href="#">Gráfico de consumo</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="toast-container position-fixed bottom-0 mb-3 end-0 me-2 p-3">
                        <div id="liveToast" class="toast custom-toast info" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="toast-header">
                                <span class="material-symbols-outlined">info</span>
                                <span class="ms-2 me-auto">¡Alerta!</span>
                                <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
                            </div>
                            <div class="toast-body text-dark">
                                Se recomienda girar el dispositivo.
                            </div>
                        </div>
                    </div>

                    <div class="container-fluid mt-3 rounded contenido-secundario align-items-center">
                        <div id="history-consume-content" class="cjs-opcion container-fluid rounded bg-white slide-up mt-3 mb-3" style="display: none; height: 96%; width:  calc(100% - 10px)">
                            <h1 class="mt-2">Histórico de consumo.</h1>
                            <div class="row">
                                <div id="table" class="col-12 col-sm-12 overflow-auto">
                                    <table class="table custom-table texto-pequeno table-striped table-hover">
                                        <thead>
                                        <tr>
                                            <th class="text-start" scope="col">Folio</th>
                                            <th class="text-end" scope="col">Fecha</th>
                                            <th class="text-center" scope="col">Producto</th>
                                            <th class="text-center" scope="col">Opción</th>
                                            <th class="text-end" scope="col">Precio</th>
                                        </tr>
                                        </thead>
                                        <tbody class="table-group-divider">
                                        <tr>
                                            <td class="text-start">10</td>
                                            <td class="text-end">2024-05-01</td>
                                            <td class="text-center">Producto A</td>
                                            <td class="text-center">Opción 1</td>
                                            <td class="text-end">$10.00</td>
                                        </tr>
                                        <tr>
                                            <td class="text-start">11</td>
                                            <td class="text-end">2023-07-15</td>
                                            <td class="text-center">Producto D</td>
                                            <td class="text-center">Opción 2</td>
                                            <td class="text-end">$42.50</td>
                                        </tr>
                                        <tr>
                                            <td class="text-start">12</td>
                                            <td class="text-end">2022-11-30</td>
                                            <td class="text-center">Producto A</td>
                                            <td class="text-center">Opción 1</td>
                                            <td class="text-end">$88.20</td>
                                        </tr>
                                        <tr>
                                            <td class="text-start">13</td>
                                            <td class="text-end">2024-02-18</td>
                                            <td class="text-center">Producto C</td>
                                            <td class="text-center">Opción 2</td>
                                            <td class="text-end">$21.90</td>
                                        </tr>
                                        <tr>
                                            <td class="text-start">14</td>
                                            <td class="text-end">2023-10-05</td>
                                            <td class="text-center">Producto B</td>
                                            <td class="text-center">Opción 1</td>
                                            <td class="text-end">$65.70</td>
                                        </tr>
                                        <tr>
                                            <td class="text-start">15</td>
                                            <td class="text-end">2022-08-20</td>
                                            <td class="text-center">Producto E</td>
                                            <td class="text-center">Opción 2</td>
                                            <td class="text-end">$30.80</td>
                                        </tr>
                                        <tr>
                                            <td class="text-start">16</td>
                                            <td class="text-end">2023-04-02</td>
                                            <td class="text-center">Producto D</td>
                                            <td class="text-center">Opción 1</td>
                                            <td class="text-end">$17.40</td>
                                        </tr>
                                        <tr>
                                            <td class="text-start">17</td>
                                            <td class="text-end">2024-01-10</td>
                                            <td class="text-center">Producto A</td>
                                            <td class="text-center">Opción 2</td>
                                            <td class="text-end">$52.60</td>
                                        </tr>
                                        <tr>
                                            <td class="text-start">18</td>
                                            <td class="text-end">2023-09-25</td>
                                            <td class="text-center">Producto C</td>
                                            <td class="text-center">Opción 1</td>
                                            <td class="text-end">$75.30</td>
                                        </tr>
                                        <tr>
                                            <td class="text-start">19</td>
                                            <td class="text-end">2022-12-12</td>
                                            <td class="text-center">Producto E</td>
                                            <td class="text-center">Opción 1</td>
                                            <td class="text-end">$80.10</td>
                                        </tr>
                                        <tr>
                                            <td class="text-start">20</td>
                                            <td class="text-end">2024-03-28</td>
                                            <td class="text-center">Producto B</td>
                                            <td class="text-center">Opción 2</td>
                                            <td class="text-end">$44.90</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div id="history-graphics-content" class="cjs-opcion container bg-white rounded mt-3 mb-3 slide-up" style="display: none; width:  calc(100% - 10px); height: 95%">
                            <div class="mt-2 row texto-pequeno">
                                <h1 class="col">Gráficos de consumo.</h1>
                                <nav class="col-sm-6 d-flex justify-content-end" aria-label="breadcrumb">
                                    <span class="me-2">Gráfico de:</span>
                                    <ol class="breadcrumb" id="graphics-selector">
                                        <li class="breadcrumb-item" data-content="bar"><a class="activo" href="#">Barras</a></li>
                                        <li class="breadcrumb-item" data-content="line"><a href="#">Lineal</a></li>
                                        <li class="breadcrumb-item" data-content="pie"><a href="#">Pastel</a></li>
                                    </ol>
                                </nav>
                            </div>

                            <div class="container-fluid border-top">
                                <div class="mt-2 d-flex align-items-center justify-content-end">
                                    <span class="material-symbols-outlined" style="font-size: 23px; color: var(--color-primario)">filter_alt</span>
                                    <a class="texto-pequeno" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas-filter" aria-controls="offcanvas-filter" style="color: var(--color-primario)">
                                        Filtros
                                    </a>
                                </div>
                            </div>


                            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvas-filter" aria-labelledby="offcanvas-filter-label" style="height: 102.7%">
                                <div class="offcanvas-header">
                                    <h1 class="offcanvas-title" id="offcanvas-filter-label">Filtro de consumo por fechas</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                </div>
                                <div class="offcanvas-body">
                                    <div class="row align-items-end">
                                        <div class="col-12">
                                            <label for="start-date">Fecha inicial:</label>
                                            <input type="text" class="form-control datepicker" id="start-date" placeholder="Selecciona una fecha">
                                        </div>
                                        <div class="col-12 mt-2">
                                            <label for="end-date">Fecha final:</label>
                                            <input type="text" class="form-control datepicker" id="end-date" placeholder="Selecciona una fecha">
                                        </div>
                                        <div class="col-auto justify-content-end mt-2">
                                            <button type="button" class="btn boton btn-sm form-control text-end" id="send-filter">Guardar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div id="bar-graph-content" class="slide-up col-12 mb-3 d-flex align-items-center justify-content-center cjs-graphic" style="max-height: 500px;">
                                    <canvas id="bar-graph"></canvas>
                                </div>
                                <div id="line-graph-content" class="slide-up d-none col-12 mb-3 d-flex align-items-center justify-content-center cjs-graphic" style="max-height: 500px;">
                                    <canvas id="line-graph"></canvas>
                                </div>

                                <div id="pie-graph-content" class="slide-right d-none col-12 mb-3 d-flex align-items-center justify-content-start cjs-graphic" style="max-height: 500px;">
                                    <canvas id="pie-graph"></canvas>
                                </div>
                                <script>
                                    const ctxBar = document.getElementById('bar-graph');
                                    new Chart(ctxBar, {
                                        type: 'bar',
                                        data: {
                                            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                                            datasets: [{
                                                label: '# of Votes',
                                                data: [12, 19, 3, 5, 2, 3],
                                                borderWidth: 1
                                            }]
                                        },
                                        options: {
                                            scales: {
                                                y: {
                                                    beginAtZero: true
                                                }
                                            }
                                        }
                                    });
                                    const ctxLine = document.getElementById('line-graph');
                                    new Chart(ctxLine, {
                                        type: 'line',
                                        data: {
                                            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                                            datasets: [{
                                                label: '# of Votes',
                                                data: [12, 19, 3, 5, 2, 3],
                                                borderWidth: 1
                                            }]
                                        },
                                        options: {
                                            scales: {
                                                y: {
                                                    beginAtZero: true
                                                }
                                            }
                                        }
                                    });

                                    const ctxPie = document.getElementById('pie-graph');
                                    new Chart(ctxPie, {
                                        type: 'doughnut',
                                        data: {
                                            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                                            datasets: [{
                                                label: '# of Votes',
                                                data: [12, 19, 3, 5, 2, 3],
                                                borderWidth: 1
                                            }]
                                        },
                                        options: {
                                            plugins: {
                                                legend: {
                                                    position: 'right',
                                                    align: 'start',
                                                    labels: {
                                                        boxWidth: 20,
                                                        usePointStyle: false
                                                    }
                                                }
                                            },
                                            scales: {
                                                y: {
                                                    beginAtZero: true
                                                }
                                            }
                                        }
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>