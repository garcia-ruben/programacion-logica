@include('inicio')
<title>Inicio de sesión</title>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="container-fluid d-flex justify-content-center align-items-center vh-100 slide-up">
                <div class="bg-white p-3 rounded sombreado" style="width: 30rem;">
                    <div class="container text-center">
                    <h1>Iniciar sesión</h1>
                  		<div>
                  			<span class="material-symbols-outlined icon-big fw-light">account_circle</span>
                  			<form id="loginForm" class="d-flex flex-column form-control texto-pequeno" method="POST" action="{{ route('login') }}">
                                @csrf
                  				<label class="text-start" for="username">Usuario:</label>
                                <input class="p-1 form-control" type="text" id="username" name="username" placeholder=" Introduce tu usuario">
                                <label class="text-start" for="password">Contraseña:</label>
                                <input class="p-1 form-control" type="password" id="password" name="password" placeholder=" Contraseña">
                                <div class="text-start">
                                    <a class="fw-lighter" id="forgot-pass" href="/forgot-pass">¿Has olvidado tu contraseña?</a>
                                </div>
                  				<div class="text-end mt-2">
                                    <button type="submit" class="btn fw-semibold" style="color: var(--color-primario)">Iniciar sesión</button>
                  				</div>
                  			</form>
                  		</div>
                	</div>
                </div>
            </div>
        </div>
    </div>
</div>
