@extends('plantilla.plantilla')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Escojer salón para el reporte</h2>
    <form action="{{ route('reporte_diario') }}" method="GET">
        <div class="mb-3">
            <label for="nivel" class="form-label">Nivel Educativo</label>
            <select class="form-select" id="nivel" name="nivel" required>
                @foreach ($niveles as $nivel)
                    <option value="{{ $nivel }}">{{ $nivel }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="grade" class="form-label">Grado</label>
            <select class="form-select" id="grade" name="grade" required>
                <option value="">Seleccione un grado</option>
                @foreach ($grados as $grado)
                    <option value="{{ $grado }}">{{ $grado }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="seccion" class="form-label">Sección</label>
            <select class="form-select" id="seccion" name="seccion" required>
                <option value="">Seleccione una sección</option>
                @foreach ($secciones as $seccion)
                    <option value="{{ $seccion }}">{{ $seccion }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Mostrar reporte del salón.</button>
    </form>
</div>
@endsection
