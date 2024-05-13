@include('inicio')
<script type="module" src="{{ asset('static/js/restore.js') }}"></script>
<title>Restablecer contraseña</title>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="container-fluid d-flex justify-content-center align-items-center vh-100 slide-up">
                <div class="bg-white p-3 rounded sombreado" style="width: 30rem;">
                    <div class="container text-center">
                        <h1>Restablecer contraseña</h1>
                        <div>
                            <span class="material-symbols-outlined icon-big fw-light">sync_lock</span>
                            <form id="forgotForm" class="d-flex flex-column form-control texto-pequeno">
                                <label class="text-start" for="email">Correo electrónico:</label>
                                <input class="p-1 form-control" type="text" id="email" name="email" placeholder=" Introduce el correo de tu cuenta">
                                <div class="text-end mt-2 d-flex align-items-center justify-content-end" style="color: darkred">
                                    <span class="material-symbols-outlined">sync_problem</span>
                                    <button id="restore" type="button" class="btn fw-semibold" style="color: darkred; text-decoration: underline" data-bs-toggle="tooltip" data-bs-placement="top" title="¡Atención! Estás a punto de restablecer tu cuenta">
                                        Restablecer contraseña
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- exito -->
<div class="modal fade" id="redirect" tabindex="1" aria-labelledby="redirect" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header custom-header">
                <h1 class="modal-title col-6" id="redirect">¡Éxito!</h1>
                <span class="material-symbols-outlined col-6 text-end" style="font-size: 35px">how_to_reg</span>
            </div>
            <div class="modal-body texto-pequeno" style="color: black ">
                <div id="mensaje"></div>
                <p>Se ha enviado una notificación a tu correo electrónico con tus nuevos datos de inicio de sesión.</p>
                <p>Redirigiendo en <span id="contador" class="fw-bold">5</span> segundos hacia la página de inicio de sesión.</p>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <div class="p-1 custom-footer">
                    <a class="btn" id="redirigir" href="/login" style="color: white">Redirigir ahora</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- error -->
<div class="modal fade" id="error" tabindex="1" aria-labelledby="error" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header custom-header-error">
                <h1 class="modal-title col-6" id="error">¡Error!</h1>
                <span class="material-symbols-outlined col-6 text-end" style="font-size: 35px">person_alert</span>
            </div>
            <div class="modal-body texto-pequeno" style="color: black ">
                <div id="mensaje"></div>
                <p>
                    No se encontró ningun usuario vinculado
                    a tu correo electrónico.
                </p>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <div class="p-1 custom-footer-error texto-pequeno">
                    <a class="btn" id="redirigir" href="/forgot-pass" style="color: white">Volver a intentarlo</a>
                </div>
            </div>
        </div>
    </div>
</div>