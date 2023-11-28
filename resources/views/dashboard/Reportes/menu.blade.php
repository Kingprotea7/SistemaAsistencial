
@extends('plantilla.plantilla')

@section('content')
<div class="container mt-5">
    <!-- Tarjetas en horizontal, 4 por fila, centradas -->
    <div class="row justify-content-center ">
        <div class="col-md-3">
            <div class="card mb-4">
                <a href="{{ route('genera-reporte') }}">
                    <img src="imagen1.jpg" class="card-img-top" alt="Imagen 1">
                    <div class="card-body text-center">
                        <h5 class="card-title">Generar Reporte de asistencia</h5>
                        <p class="card-text">Módulo para gestionar </p>
                    </div>
                </a>
            </div>
        </div>


        <div class="col-md-3">
            <div class="card mb-4">
                <a href="{{ route('Salones.index') }}">
                    <img src="imagen1.jpg" class="card-img-top" alt="Imagen 1">
                    <div class="card-body text-center">
                        <h5 class="card-title">Salones</h5>
                        <p class="card-text">Módulo para gestionar </p>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mb-4">
                <a href="{{ route('RegistrarAsistencia') }}">
                    <img src="imagen1.jpg" class="card-img-top" alt="Imagen 1">
                    <div class="card-body text-center">
                        <h5 class="card-title">Asistencia</h5>
                        <p class="card-text">Módulo para gestionar </p>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mb-4">
                <a href="{{ route('Alumnado.index') }}">
                    <img src="imagen1.jpg" class="card-img-top" alt="Imagen 1">
                    <div class="card-body text-center">
                        <h5 class="card-title">Reportes</h5>
                        <p class="card-text">Módulo para gestionar </p>
                    </div>
                </a>
            </div>
        </div>
        <!-- Repite estas tarjetas para las otras 3 tarjetas en horizontal -->
    </div>
</div>

@endsection
