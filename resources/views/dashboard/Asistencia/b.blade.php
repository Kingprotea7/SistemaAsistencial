@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Lista de Alumnos</h2>
    @if ($alumnos->count() > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Asistencia</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($alumnos as $alumno)
                <tr>
                    <td>{{ $alumno->id }}</td>
                    <td>{{ $alumno->nombre }}</td>
                    <td>{{ $alumno->apellido_paterno }}</td>
                    <td>{{ $alumno->apellido_materno }}</td>
                    <td>
                        <div class="d-flex">
                            <form method="post" action="{{ route('registrar-asistencia') }}">
                                @csrf
                                <input type="hidden" name="alumno_id" value="{{ $alumno->id }}">
                                <input type="hidden" name="estado" value="asistio">
                                <input type="submit" class="btn btn-success asistio-button" value="Asistió">
                            </form>
                            <form method="post" action="{{ route('registrar-asistencia') }}">
                                @csrf
                                <input type="hidden" name="alumno_id" value="{{ $alumno->id }}">
                                <input type="hidden" name="estado" value="tarde">
                                <input type="submit" class="btn btn-warning tarde-button" value="Tarde">
                            </form>
                            <form method="post" action="{{ route('registrar-asistencia') }}">
                                @csrf
                                <input type="hidden" name="alumno_id" value="{{ $alumno->id }}">
                                <input type="hidden" name="estado" value="falta">
                                <input type="submit" class="btn btn-danger falta-button" value="Falta">
                            </form>
                            <form method="post" action="{{ route('anular-asistencia', ['alumnoId' => $alumno->id, 'tipoAsistencia' => 'asistio']) }}">
                                @csrf
                                <input type="submit" class="btn btn-secondary anular-button" style="display: none" value="Anular">
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No se encontraron alumnos.</p>
    @endif
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Muestra los botones "Anular" si el alumno no tiene asistencias, tardanzas o faltas
        $(".asistio-button, .tarde-button, .falta-button").each(function() {
            var row = $(this).closest("tr");
            if (row.find(".asistio-button").length === 0 && row.find(".tarde-button").length === 0 && row.find(".falta-button").length === 0) {
                row.find(".anular-button").show();
            }
        });

        // Maneja el clic en los botones de asistencia
        $(".asistio-button, .tarde-button, .falta-button").click(function() {
            var row = $(this).closest("tr");
            row.find(".asistio-button, .tarde-button, .falta-button").hide();
            row.find(".anular-button").show();
        });
    });
    </script>
@endsection
