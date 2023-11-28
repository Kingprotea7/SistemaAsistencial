@extends('plantilla.plantilla')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center mb-4 h1">Lista de Reportes Diarios</h2>

        @if ($reportesDiarios->count() > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Tipo de Reporte</th>
                        <th>Tipo de Asistencia</th>
                        <th>Día</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reportesDiarios as $reporteDiario)
                        <tr>
                            <td>{{ $reporteDiario->id }}</td>
                            <td>{{ $reporteDiario->alumno->nombreCompleto() }}</td>
                            <td>{{ $reporteDiario->alumno->apellido() }}</td>
                            <td>{{ $reporteDiario->alumno->lastname2() }}</td>
                            <td>{{ $reporteDiario->tipo_reporte }}</td>
                            <td>
                                {{ optional($reporteDiario->asistencia)->tipo ?? 'Sin tipo de asistencia' }}
                            </td>
                            <td>{{ $reporteDiario->dia }}</td>
                            <td>
                                <!-- Puedes agregar botones de acciones aquí según tus necesidades -->
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No hay reportes diarios disponibles.</p>
        @endif
    </div>
@endsection
