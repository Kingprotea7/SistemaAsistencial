@extends('plantilla.plantilla')
@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Salones de Nivel Primaria1</h2>
    <table class="table table-striped table-bordered table-hover text-center">
        <thead>
            <tr>
                <th>Grado</th>
                <th>Sección</th>
                <th>Tutor</th>
                <th>Acciones</th> <!-- Nueva columna para acciones -->
            </tr>
        </thead>
        <tbody>
            @foreach($salones as $salon)
            @if ($salon->nivel === 'primaria')
            <tr>
                <td class="text-center">{{ $salon->grade }}</td>
                <td>{{ $salon->section }}</td>
                <td>
                    @if ($salon->docente)
                        {{ $salon->docente->name }} {{ $salon->docente->lastname }}
                    @else
                        Sin docente asignado
                    @endif
                </td>
                <td>
                    <div class="btn-group" role="group">
                        <a href="{{ route('verAlumnosDelSalon', $salon->id) }}" class="btn btn-info btn-sm">Ver Alumnos</a>

                        <a href="{{ route('borrarSalon', $salon->id) }}" class="btn btn-danger btn-sm">Borrar</a>
                    </div>
                </td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
</div>
@endsection
