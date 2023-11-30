@extends('plantilla.plantilla')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4 h1">Lista de Reportes Diarios</h2>

    @if ($reportesDiarios->count() > 0)
        <table class="table table-bordered table-striped table-dark">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Tipo de Reporte</th>
                    <th>Tipo de Asistencia</th>
                    <th>Día</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reportesDiarios as $reporteDiario)
                @if ($reporteDiario->tipo_asistencia)
                    <tr>
                        <td>{{ $reporteDiario->id }}</td>
                        <td>{{ $reporteDiario->alumno->nombreCompleto() }}</td>
                        <td>{{ $reporteDiario->alumno->apellido() }}</td>
                        <td>{{ $reporteDiario->alumno->lastname2() }}</td>
                        <td>{{ $reporteDiario->tipo_reporte }}</td>
                        <td>{{ $reporteDiario->tipo_asistencia }}</td>
                        <td>{{ $reporteDiario->dia }}</td>
                        <td>
                            <!-- Puedes agregar botones de acciones aquí según tus necesidades -->
                        </td>
                    </tr>
                @else
                    <tr class="bg-danger table-danger text-white">
                        <td class="h5 text-center bg-danger  text-dark" colspan="8">
                            {{ $reporteDiario->alumno->nombreCompleto() }},
                            {{ $reporteDiario->alumno->apellido() }},
                            {{ $reporteDiario->alumno->lastname2() }} <br>
                            Posee registros corruptos, se recomienda rehacer el reporte del salón.
                        </td>
                    </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    @else
        <p class="text-center bg-dark text-white">No hay reportes diarios disponibles.</p>
    @endif
</div>
@endsection
