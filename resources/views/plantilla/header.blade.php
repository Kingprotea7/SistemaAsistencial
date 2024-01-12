<!-- header.blade.php -->
<div>
    @yield('head')

    <nav class="navbar navbar-expand-lg navbar-light bg-danger border-bottom mb-3 text-center justify-content-center">
        <div class="container d-flex justify-content-between align-items-center text-center">
            <!-- Logo y nombre de la aplicación -->
            <div class="navbar-brand-container d-flex align-items-center">
                <img src="{{ asset('images/i.e.png') }}" class="card-img-top img-fluid " style="max-width: 10%; height: auto;" alt="Imagen 1">
                <div class="px-2">
                    <a class="navbar-brand" href="#" style="color: #eaf1f8; font-weight: bold;">Sistema Asistencial I.E</a>
                    <a class="navbar-brand" href="#" style="color: #e7eaee; font-weight: bold;">Lucia Quispe Nina</a>
                </div>
            </div>


            <!-- Botón de hamburguesa para pantallas pequeñas -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Enlaces de navegación -->
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('inicio') }}" style="color: #f3f5f8;">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" style="color: #f3f5f8;">Perfil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" style="color: #f3f5f8;">Configuración</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" style="color: #f3f5f8;">Temas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" style="color: #f3f5f8">Ayuda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout.custom') }}" style="color: #f3f5f8;">Salir</a>
                    </li>
                </ul>
            </div>


        </div>
        <!-- ... (código previo) ... -->

<ul class="navbar-nav ml-auto ">
    <li class="nav-item">
        @auth
            <a class="nav-link h5 bg-dark" href="{{ route('logout') }}" style="color: #f3f5f8;">
                <i class="fas fa-user"></i> Usuario: {{ auth()->user()->name }} <br>
                {{ auth()->user()->lastname_name }}
            </a>
        @endauth
    </li>
</ul>

<!-- ... (resto del código) ... -->

    </nav>

</div>

<style>

    /* Estilos para dispositivos de pantalla pequeña */
    @media (max-width: 767px) {
        .navbar-brand-container {
            flex-direction: column;
            align-items: center;
            text-align: center;
            margin-bottom: 10px;
        }
    }

    /* Estilos para hovers */
    .navbar-nav .nav-link:hover {
        color: #0056b3;
    }
</style>
