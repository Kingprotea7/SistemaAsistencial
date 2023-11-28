<!-- header.blade.php -->
<div>
    @yield('head')

    <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <div class="container-fluid">
            <!-- Elemento div para el texto de la marca -->
            <div class="navbar-brand-container">
                <a class="navbar-brand" href="#" style="color: #007BFF; font-weight: bold;">Sistema Asistencial I.E |</a>
                <a class="navbar-brand" href="#" style="color: #007BFF; font-weight: bold;">Lucia Quispe Nina</a>
            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item mb-2 mb-lg-0 mr-3 mr-lg-4">
                        <a class="nav-link" href="{{ route('inicio') }}" style="color: #007BFF;">Inicio</a>
                    </li>
                    <li class="nav-item mb-2 mb-lg-0 mr-3 mr-lg-4">
                        <a class="nav-link" href="#" style="color: #007BFF;">Perfil</a>
                    </li>
                    <li class="nav-item mb-2 mb-lg-0 mr-3 mr-lg-4">
                        <a class="nav-link" href="#" style="color: #007BFF;">Configuración</a>
                    </li>
                    <li class="nav-item mb-2 mb-lg-0 mr-3 mr-lg-4">
                        <a class="nav-link" href="#" style="color: #007BFF;">Temas</a>
                    </li>
                    <li class="nav-item mb-2 mb-lg-0 mr-3 mr-lg-4">
                        <a class="nav-link" href="#" style="color: #007BFF;">Ayuda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}" style="color: #007BFF;">Salir</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>

<style>
    /* Estilos para dispositivos de pantalla pequeña */
    @media (max-width: 767px) {
        .navbar-brand-container {
            flex-direction: column; /* Apila los elementos en columnas */
            align-items: center; /* Centra los elementos horizontalmente */
            text-align: center; /* Centra el texto dentro de cada elemento */
        }
    }

    /* Estilos para hovers */
    .navbar-nav .nav-link:hover {
        color: #0056b3; /* Cambia el color al hacer hover */
    }
</style>
