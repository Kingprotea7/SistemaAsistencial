@extends('plantilla.plantilla')

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
                    <!-- Agrega aquí más columnas según tus necesidades -->
                </tr>
            </thead>
            <tbody>
                @foreach ($alumnos as $alumno)
                    <tr>
                        <td>{{ $alumno->id }}</td>
                        <td>{{ $alumno->nombre }}</td>
                        <td>{{ $alumno->apellido_paterno }}</td>
                        <td>{{ $alumno->apellido_materno }}</td>
                        <!-- Agrega aquí más celdas según tus necesidades -->
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No se encontraron alumnos.</p>
    @endif
</div>
@endsection
