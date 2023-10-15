@extends('plantilla.plantilla')

@section('content')
<div class="container mt-5">
    <div class="custom-card-header bg-primary text-white text-center">
        <h1 class="card-title text-center">Nivel primaria</h1>
    </div>
    <div class="row">
        <div class="col-md-4 ">
            <div class="card">
                <img src="{{ asset('ruta_a_tu_imagen1.jpg') }}" class="card-img-top" alt="Imagen 1">
                <div class="card-body text-center">
                    <h5 class="card-title">Primero</h5>
                    <a href="{{ route('Salones.listarS1', ['grade' => '1']) }}" class="btn btn-primary">Ir</a>

                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="{{ asset('ruta_a_tu_imagen2.jpg') }}" class="card-img-top" alt="Imagen 2">
                <div class="card-body text-center">
                    <h5 class="card-title">Segundo</h5>
                    <a href="{{ route('Salones.listarS1', ['grade' => '2']) }}" class="btn btn-primary">Ir</a>

                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="{{ asset('ruta_a_tu_imagen3.jpg') }}" class="card-img-top" alt="Imagen 3">
                <div class="card-body text-center">
                    <h5 class="card-title">Tercero</h5>
                    <a href="{{ route('Salones.listarS1', ['grade' => '3']) }}" class="btn btn-primary">Ir</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="{{ asset('ruta_a_tu_imagen3.jpg') }}" class="card-img-top" alt="Imagen 3">
                <div class="card-body text-center">
                    <h5 class="card-title">Cuarto</h5>
                    <a href="{{ route('Salones.listarS1', ['grade' => '4']) }}" class="btn btn-primary">Ir</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="{{ asset('ruta_a_tu_imagen3.jpg') }}" class="card-img-top" alt="Imagen 3">
                <div class="card-body text-center">
                    <h5 class="card-title">Quinto</h5>
                    <a href="{{ route('Salones.listarS1', ['grade' => '5']) }}" class="btn btn-primary">Ir</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="{{ asset('ruta_a_tu_imagen3.jpg') }}" class=" card-img-top" alt="Imagen 3">
                <div class="card-body text-center">
                    <h5 class="card-title">Sexto</h5>
                    <a href="{{ route('Salones.listarS1', ['grade' => '6']) }}" class="btn btn-primary">Ir</a>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
