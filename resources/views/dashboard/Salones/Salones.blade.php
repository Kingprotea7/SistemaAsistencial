@extends('plantilla.plantilla')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center"> <!-- Agregamos la clase justify-content-center para centrar los cards -->
        <div class="col-md-4">
            <div class="card">
                <img src="{{ asset('ruta_a_tu_imagen1.jpg') }}" class="card-img-top" alt="Imagen 1">
                <div class="card-body text-center">
                    <h5 class="card-title">Ver todos los salones</h5>
                    <a href="{{ route('Salones.listar') }}" class="btn btn-primary">Primaria</a>
                    <a href="{{ route('Salones.listarS') }}" class="btn btn-success">Secundaria</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="{{ asset('ruta_a_tu_imagen2.jpg') }}" class="card-img-top" alt="Imagen 2">
                <div class="card-body text-center">
                    <h5 class="card-title">Crear Salones</h5>
                    <a href="{{ route('Salones.create') }}" class="btn btn-primary text-center">Crear</a>
                </div>
            </div>
        </div>
    </div>
</div>
@if($errors->has('bien'))
<div class="alert alert-success">
    {{ $errors->first('bien') }}
</div>
@endif
@endsection
