@extends('plantilla.plantilla')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <form id="searchForm" action="{{ route('buscar-alumnos') }}" method="GET">
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="query" placeholder="Buscar alumnos...">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </div>
            </div>
        </form>

        <div class="col-md-4">
            <div class="card">
                <img src="{{ asset('ruta_a_tu_imagen1.jpg') }}" class="card-img-top" alt="Imagen 1">
                <div class="card-body text-center">
                    <h5 class="card-title">Asistencia por nivel</h5>
                    <a href="{{ route('Salones.listar') }}" class="btn btn-primary">Primaria</a>
                    <a href="{{ route('Salones.listarS') }}" class="btn btn-success">Secundaria</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="{{ asset('ruta_a_tu_imagen2.jpg') }}" class="card-img-top" alt="Imagen 2">
                <div class="card-body text-center">
                    <h5 class="card-title">Asignar Alumno nuevo</h5>
                    <a href="{{ route('Alumnado.create') }}" class="btn btn-primary text-center">Crear</a>
                </div>
            </div>
        </div>
    </div>
</div>
@if(isset($alumnos) && count($alumnos) > 0)
    <h3 class="mt-4 text-primary">Resultados de la búsqueda</h3>
    <table class="table mt-2">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($alumnos as $alumno)
                <tr class="resultado-item">
                    <td>{{ $alumno->nombre }}</td>
                    <td>{{ $alumno->apellido_paterno }}</td>
                    <td>{{ $alumno->apellido_materno }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p class="mt-4">No se encontraron resultados.</p>
@endif



@endsection


