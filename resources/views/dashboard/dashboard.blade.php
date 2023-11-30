
@extends('plantilla.plantilla')

@section('content')

<div class="dashboard">
    <div class="container mt-5">
        <!-- Tarjetas en horizontal, 4 por fila, centradas -->
        <div class="row justify-content-center ">
            <div class="col-md-3">
                <div class="card mb-4">
                    <a href="{{ route('Alumnado.index') }}">
                        <img src="{{ asset('images/Alumnado (1).jpg') }}" class="card-img-top" alt="Imagen 1">

                        <div class="card-body text-center bg-dark">
                            <h5 class="h3 text-white text-decoration-none">Alumnado</h5>
                            <p class="text-white text-decoration-none">Gestione la información de los alumnos registrados. </p>
                        </div>

                    </a>
                </div>
            </div>


            <div class="col-md-3">
                <div class="card mb-4">
                    <a href="{{ route('Salones.index') }}">
                        <img src="{{ asset('images/Salones (1).jpg') }}" class="card-img-top" alt="Imagen 1">

                        <div class="card-body text-center bg-dark">
                            <h5 class="h3 text-white text-decoration-none">Salones</h5>
                            <p class="text-white text-decoration-none">Cree,edite y visualize información de los salones.</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card mb-4">
                    <a href="{{ route('RegistrarAsistencia') }}">
                        <img src="{{ asset('images/Asistencia.jpg') }}" class="card-img-top" alt="Imagen 1">
                        <div class="card-body text-center bg-dark">
                            <h5 class="h3 text-white text-decoration-none">Asistencia</h5>
                            <p class="text-white text-decoration-none">Registre las asistencias de los alumnos mediante grado y sección.</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card mb-4">
                    <a href="{{ route('reportes') }}">
                        <img src="{{ asset('images/reportes1.jpg') }}" class="card-img-top" alt="Imagen 1">
                        <div class="card-body text-center bg-dark">
                            <h5 class="h3 text-white text-decoration-none">Reportes</h5>
                            <p class="text-white text-decoration-none">Visualize,descargue y envíe reportes institucionales. </p>
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
                    <a href="{{ route('mostrarusuarios') }}">
                        <img src="imagen1.jpg" class="card-img-top" alt="Imagen 1">
                        <div class="card-body text-center bg-dark">
                            <h5 class="h3 text-white text-decoration-none">Usuarios</h5>
                            <p class="text-white text-decoration-none">Módulo para gestionar </p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card mb-4">
                    <a href="{{ route('Alumnado.index') }}">
                        <img src="imagen1.jpg" class="card-img-top" alt="Imagen 1">
                        <div class="card-body text-center bg-dark">
                            <h5 class="h3 text-white text-decoration-none">Historial</h5>
                            <p class="text-white text-decoration-none">Módulo para gestionar </p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card mb-4">
                    <a href="{{ route('Alumnado.index') }}">
                        <img src="imagen1.jpg" class="card-img-top" alt="Imagen 1">
                        <div class="card-body text-center bg-dark">
                            <h5 class="h3 text-white text-decoration-none">Estadisticas</h5>
                            <p class="text-white text-decoration-none">Módulo para gestionar </p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card mb-4">
                    <a href="{{ route('Alumnado.index') }}">
                        <img src="imagen1.jpg" class="card-img-top" alt="Imagen 1">
                        <div class="card-body text-center bg-dark">
                            <h5 class="h3 text-white text-decoration-none">Soporte técnico</h5>
                            <p class="text-white text-decoration-none">Módulo para gestionar </p>
                        </div>
                    </a>
                </div>
            </div>
            <!-- Repite estas tarjetas para las otras 3 tarjetas abajo -->
        </div>
    </div>
</div>
@endsection

