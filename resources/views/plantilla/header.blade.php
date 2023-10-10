<!-- header.blade.php -->
<div>
    @yield('head')

    <nav class="navbar navbar-expand-lg navbar-light bg-light border border-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Sistema asistencial I.E | Lucia Quispe Nina</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item mb-2 mb-lg-0 mr-3 mr-lg-4">
                        <a class="nav-link" href="{{ route('inicio') }}">Inicio</a>

                    </li>
                    <li class="nav-item mb-2 mb-lg-0 mr-3 mr-lg-4">
                        <a class="nav-link" href="#">Perfil</a>
                    </li>
                    <li class="nav-item mb-2 mb-lg-0 mr-3 mr-lg-4">
                        <a class="nav-link" href="#">Configuración</a>
                    </li>
                    <li class="nav-item mb-2 mb-lg-0 mr-3 mr-lg-4">
                        <a class="nav-link" href="#">Temas</a>
                    </li>
                    <li class="nav-item mb-2 mb-lg-0 mr-3 mr-lg-4">
                        <a class="nav-link" href="#">Ayuda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Salir</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

</div>

