@extends('plantilla.plantilla')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="custom-card border rounded shadow">
                <div class="custom-card-header bg-primary text-white">
                    <h1 class="card-title text-center">Crear Salón</h1>
                </div>
                <div class="custom-card-body">
                    <form action="{{ route('Salones.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nivel" class="form-label">Nivel educativo</label>
                            <select class="form-select" id="nivel" name="nivel" required>
                                <option value="" selected disabled>Selecciona un nivel educativo</option>
                                <option value="primaria">Primaria</option>
                                <option value="secundaria">Secundaria</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="grade" class="form-label">Grado</label>
                            <select class="form-select" id="grade" name="grade" required>
                                <option value="" selected disabled>Selecciona un grado</option>
                                <option value="1">Primero</option>
                                <option value="2">Segundo</option>
                                <option value="3">Tercero</option>
                                <option value="4">Cuarto</option>
                                <option value="5">Quinto</option>
                                <option value="6">Sexto</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for ="section" class="form-label">Sección</label>
                            <select class="form-select" id="section" name="section" required>
                                <option value="" selected disabled>Seleccione una sección</option>
                                <option value="A">Sección A</option>
                                <option value="B">Sección B</option>
                                <option value="C">Sección C</option>
                                <option value="D">Sección D</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="docente_id" class="form-label">Tutor</label>
                            <select class="form-select" id="docente_id" name="docente_id" required>
                                <option value="" selected disabled>Seleccione un docente</option>
                                @foreach($docentes as $docente)
                                    <option value="{{ $docente->id }}">{{ $docente->name }} {{ $docente->lastname }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary mb-3">Crear Salón</button>
                        @if($errors->has('mal'))
<div class="alert alert-danger">
    {{ $errors->first('mal') }}
</div>
@endif
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const nivelSelect = document.getElementById('nivel');
    const gradeSelect = document.getElementById('grade');
    nivelSelect.addEventListener('change', function () {
        if (nivelSelect.value === 'secundaria') {
            gradeSelect.querySelector('option[value="6"]').style.display = 'none';
        } else {
            gradeSelect.querySelector('option[value="6"]').style.display = 'block';
        }
    });
});
</script>

@endsection






