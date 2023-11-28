@extends('plantilla.plantilla')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4 h1">Reportes</h2>

    <div class="row">
        <!-- Reporte Diario -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Reporte Diario</h5>
                    <p class="card-text">Aquí va la descripción del reporte diario.</p>
                    <a href="{{ route('mostrarbarrareporte') }}" class="btn btn-primary text-center">Generar Reporte</a>
                </div>
            </div>
        </div>

        <!-- Reporte Semanal -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Reporte Semanal</h5>
                    <p class="card-text">Aquí va la descripción del reporte semanal.</p>
                    <a href="{{ route('reporte_semanal') }}" class="btn btn-primary text-center">Generar Reporte</a>
                </div>
            </div>
        </div>

        <!-- Reporte Mensual -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Reporte Mensual</h5>
                    <p class="card-text">Aquí va la descripción del reporte mensual.</p>
                    <a href="{{ route('reporte_mensual') }}" class="btn btn-primary text-center">Generar Reporte</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
