<li class="nav-item">
    <a class="nav-link active btn btn-outline-dark rounded-0 btn-lg" href="#">
        <span class="fw-bold">Usuarios en línea</span>
    </a>
    <div class="fw-bold pl-3">
        @if (Auth::check())
            <table class="table table-hover rounded">
                <thead>
                    <!-- Encabezados de la tabla si es necesario -->
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <!-- Agrega cualquier otro encabezado necesario -->
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usuariosEnLinea as $index => $usuario)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $usuario->name }}</td>
                            <td>{{ $usuario->lastname }}</td>
                            <!-- Agrega cualquier otro dato que desees mostrar para cada usuario -->
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No hay usuarios en línea en este momento.</p>
        @endif
    </div>
</li>
