@extends('plantilla.plantilla')
@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Salones de Nivel Secundaria</h2>
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
            @if ($salon->nivel === 'secundaria')
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
                        <a href="{{ route('verSalon', $salon->id) }}" class="btn btn-success btn-sm">Ver</a>
                        <a href="{{ route('editarSalon', $salon->id) }}" class="btn btn-primary btn-sm">Editar</a>
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
