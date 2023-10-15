@extends('plantilla.plantilla')

@section('content')
<div class="container mt-5 mb-">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="custom-card border rounded shadow">
                <div class="custom-card-header bg-primary text-white">
                    <h1 class="card-title text-center">Crear Alumno</h1>
                </div>
                <div class="custom-card-body">
                    <form action="{{ route('Alumnado.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="ap_paterno" class="form-label">Apellido Paterno</label>
                            <input type="text" class="form-control" id="ap_paterno" name="ap_paterno" required>
                        </div>
                        <div class="mb-3">
                            <label for="ap_materno" class="form-label">Apellido Materno</label>
                            <input type="text" class="form-control" id="ap_materno" name="ap_materno" required>
                        </div>
                        <div class="mb-3">
                            <label for="num_padre" class="form-label">Número del padre:</label>
                            <input type="text" class="form-control" id="num_padre" name="num_padre" required>
                        </div>
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
                            <label for="section" class="form-label">Sección</label>
                            <select class="form-select" id="section" name="section" required>
                                <option value="" selected disabled>Seleccione una sección</option>
                                <option value="A">Sección A</option>
                                <option value="B">Sección B</option>
                                <option value="C">Sección C</option>
                                <option value="D">Sección D</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Crear Alumno</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection






