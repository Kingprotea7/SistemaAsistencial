
@extends('plantilla.plantilla')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-primary">
                <div class="card-header bg-primary text-white">
                    <h1 class="card-title">Formulario de Creación de Salones</h1>
                </div>
                <div class="card-body">
                    <form action="{{ route('Salones.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="grado" class="form-label">Grado</label>
                            <input type="text" class="form-control" id="grado" name="grade" required>
                        </div>
                        <div class="mb-3">
                            <label for="section" class="form-label">Sección</label>
                            <input type="text" class="form-control" id="section" name="section" required>
                        </div>
                        <div class="mb-3">
                            <label for="salon_id" class="form-label">Salón</label>
                            <select class="form-select" id="salon_id" name="salon_id" required>
                                <option value="" selected>Selecciona un salón</option>
                                <!-- Aquí puedes incluir opciones de salones desde tu base de datos -->
                                <option value="1">Salón A</option>
                                <option value="2">Salón B</option>
                                <option value="3">Salón C</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Crear Salón</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal Responsivo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Contenido del modal -->
                <p>Aquí puedes agregar contenido al modal. Puede ser un formulario, información adicional, etc.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary">Guardar cambios</button>
            </div>
        </div>
    </div>
</div>
@endsection






