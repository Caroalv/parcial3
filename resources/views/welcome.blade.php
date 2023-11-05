<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    <!-- Enlace al archivo CSS de Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-sm-6">
                @if (Route::has('login'))
                <div class="card">
                    <div class="card-body">
                        @auth
                            <h5 class="card-title">¡Bienvenido!</h5>
                            <p class="card-text">Has iniciado sesión correctamente.</p>
                            <a href="{{ url('/home') }}" class="btn btn-primary btn-block">Ir a Casa</a>
                        @else
                            <h5 class="card-title">Iniciar Sesión</h5>
                            <a href="{{ route('login') }}" class="btn btn-primary btn-block">Ingresar</a>

                            @if (Route::has('register'))
                                <p class="mt-3">¿No tienes una cuenta?</p>
                                <a href="{{ route('register') }}" class="btn btn-secondary btn-block">Registrarse</a>
                            @endif
                        @endauth
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Enlace al archivo JS de Bootstrap (No se requiere para esta página estática) -->
</body>
</html>
