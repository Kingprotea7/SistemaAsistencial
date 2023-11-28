@extends('plantilla.plantilla')

@section('content')

<div class="dashboard">
    <div class="container mt-5">
        <!-- Tarjetas en horizontal, 3 por fila, centradas -->
        <div class="row justify-content-center ">
            <div class="col-md-4">
                <div class="card mb-4">
                    <a href="{{ route('mostrarSalonesparaReporte') }}">
                        <img src="imagen1.jpg" class="card-img-top" alt="Imagen 1">
                        <div class="card-body text-center">
                            <h5 class="card-title">Reporte Diario</h5>
                            <p class="card-text">Módulo para gestionar el reporte diario</p>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card mb-4">

                                          <img src="imagen1.jpg" class="card-img-top" alt="Imagen 1">
                        <div class="card-body text-center">
                            <h5 class="card-title">Reporte Semanal</h5>
                            <p class="card-text">Módulo para gestionar el reporte semanal</p>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card mb-4">

                        <img src=                   "imagen1.jpg" class="card-img-top" alt="Imagen 1">
                        <div class="card-body text-center">
                            <h5 class="card-title">Reporte Mensual</h5>
                            <p class="card-text">Módulo para gestionar el reporte mensual</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
