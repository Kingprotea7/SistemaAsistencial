
<div class="container-fluid">
    <!-- Contenido para dispositivos de pantalla grande -->
    @yield('sidebar')

    <div class="row">
        <!-- Sidebar (visible solo en pantallas grandes) -->
        <nav id="sidebar" class="col-md-5 col-lg-4 d-md-block bg-light sidebar d-none d-md-flex">
            <div class="position-sticky h-100">
                <ul class="nav flex-column flex-fill">
                    <li class="nav-item">
                        <a class="nav-link active btn btn-outline-dark rounded-0 btn-lg" href="#">
                            <span class="fw-bold">Interacciones</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-dark rounded-0 btn-lg" href="#">
                            <span class="fw-bold">Alumnos</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-dark rounded-0 btn-lg" href="#">
                            <span class="fw-bold">Salones</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-dark rounded-0 btn-lg" href="#">
                            <span class="fw-bold">Búsqueda Rápida</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active btn btn-outline-dark rounded-0 btn-lg" href="#">
                            <span class="fw-bold">Procedimientos</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-dark rounded-0 btn-lg" href="#">
                            <span class="fw-bold">Usuarios</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-dark rounded-0 btn-lg" href="#">
                            <span class="fw-bold">Historial</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-dark rounded-0 btn-lg" href="#">
                            <span class="fw-bold">Reportes</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-dark rounded-0 btn-lg" href="#">
                            <span class="fw-bold">Estadísticas</span>
                        </a>
                    </li>
                </ul>
              <ul class="nav flex-column flex-fill">
    <li class="nav-item">
        <a class="nav-link active btn btn-outline-dark rounded-0 btn-lg" href="#">
            <span class="fw-bold">Usuarios en línea:</span>
            <span class="fw-bold">{{$usuariosEnLinea->count()}}
            </span>
        </a>
        <div class="fw-bold pl-3">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>




                            <!-- Agrega cualquier otra columna que desees mostrar -->
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($usuariosEnLinea as $index => $usuario)
                            <tr class="{{ $index >= 4 ? 'fila-adicional' : '' }}">
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $usuario->name }} {{ $usuario->lastname }}</td>
                                <!-- Agrega cualquier otra columna que desees mostrar -->
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3">No hay usuarios en línea en este momento, mi loco.</td>
                            </tr>
                        @endforelse
                    </tbody>



                </table>
            </div>
        </div>
    </li>

</ul>
@if (count($usuariosEnLinea) > 6)
                        <p id="verMasEnlace" class=" h5 bg-danger text-white text-center">Ver más</p>
                    @endif
            </div>
        </nav>


    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const filasAdicionales = document.querySelectorAll('.fila-adicional');
        const verMasEnlace = document.getElementById('verMasEnlace');

        // Oculta las filas adicionales al cargar la página
        filasAdicionales.forEach(function (fila) {
            fila.style.display = 'none';
        });

        // Muestra u oculta las filas adicionales al hacer clic en "Ver más"
        verMasEnlace.addEventListener('click', function () {
            filasAdicionales.forEach(function (fila) {
                fila.style.display = fila.style.display === 'none' ? '' : 'none';
            });
        });
    });
</script>
