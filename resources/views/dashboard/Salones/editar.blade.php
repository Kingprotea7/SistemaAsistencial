@extends('plantilla.plantilla')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="custom-card border rounded shadow">
                <div class="custom-card-header bg-primary text-white">
                    <h1 class="card-title text-center">Editar Salón</h1>
                </div>
                <form action="{{ route('Salones.store1', ['id' => $salon->id]) }}" method="POST">
                    @csrf

                    <!-- Agregar un campo oculto con el id del salón -->
                    <input type="hidden" name="salon_id" value="{{ $salon->id }}">

                    <div class="mb-3">
                        <label for="docente_id" class="form-label">Tutor</label>
                        <select class="form-select" id="docente_id" name="docente_id" required>
                            <option value="" selected disabled>Seleccione un nuevo tutor</option>
                            @foreach($docentes as $docente)
                                <option value="{{ $docente->id }}">{{ $docente->name }} {{ $docente->lastname }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Editar Salón</button>
                </form>

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
