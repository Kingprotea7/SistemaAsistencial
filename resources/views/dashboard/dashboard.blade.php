
@extends('plantilla.plantilla')

@section('content')

<div class="dashboard">
    <div class="container mt-5">
        <!-- Tarjetas en horizontal, 4 por fila, centradas -->
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="card mb-4">
                    <a href="{{ route('Alumnado.index') }}">
                        <img src="imagen1.jpg" class="card-img-top" alt="Imagen 1">
                        <div class="card-body text-center">
                            <h5 class="card-title">Alumnado</h5>
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
                    <a href="{{ route('Alumnado.index') }}">
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

    <div class="container mt-5">
        <!-- Tarjetas abajo, 4 por fila, centradas -->
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="card mb-4">
                    <a href="{{ route('Alumnado.index') }}">
                        <img src="imagen1.jpg" class="card-img-top" alt="Imagen 1">
                        <div class="card-body text-center">
                            <h5 class="card-title">Usuarios</h5>
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
                            <h5 class="card-title">Historial</h5>
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
                            <h5 class="card-title">Estadisticas</h5>
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
                            <h5 class="card-title">Soporte técnico</h5>
                            <p class="card-text">Módulo para gestionar </p>
                        </div>
                    </a>
                </div>
            </div>
            <!-- Repite estas tarjetas para las otras 3 tarjetas abajo -->
        </div>
    </div>
</div>
@endsection

