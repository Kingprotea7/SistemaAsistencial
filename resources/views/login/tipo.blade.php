@extends('plantilla.plantilla')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center mb-4">Datos de Asistencia</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Alumno ID</th>
                    <th>Fecha</th>
                    <th>Tipo</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datosAsistencia as $asistencia)
                    <tr>
                        <td>{{ $asistencia->id }}</td>
                        <td>{{ $asistencia->alumno_id }}</td>
                        <td>{{ $asistencia->fecha }}</td>
                        <td>{{ $asistencia->tipo }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
