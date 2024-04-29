<script src="../resources/js/inicio.js"></script>
<title>Inicio de sesión</title>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div id="spinner-overlay" style="display: none;">
              	<div class="spinner-border" role="status" style="width: 5rem; height: 5rem;"></div>
            </div>
            <div class="container-fluid d-flex justify-content-center align-items-center vh-100 slide-up">
                <div class="bg-white p-3 rounded sombreado" style="width: 30rem;">
                    <div class="container text-center">
                    <h1>Iniciar sesión</h1>
                  		<div>
                  			<span class="material-symbols-outlined icon-big fw-light">account_circle</span>
                  			<div class="d-flex flex-column">
                  				<label class="text-start" for="usuario">Usuario:</label>
                  				<input type="text" id="usuario" name="usuario" placeholder=" Introduce tu usuario">
                  				<label class="text-start" for="contraseña">Contraseña:</label>
                  				<input type="password" id="contraseña" name="contraseña" placeholder=" Contraseña">
                                <div class="text-start">
                                    <a class="fw-lighter" id="forgot-pass" href="#">¿Has olvidado tu contraseña?</a>
                                </div>
                  				<div class="text-end mt-2">
                  					<a class="fw-semibold" id="mostrarSpinner" onclick="mostrar_spinner()" href="#">Iniciar sesión</a>
                  				</div>
                  			</div>
                  		</div>
                	</div>
                </div>
            </div>
        </div>
    </div>
</div>
