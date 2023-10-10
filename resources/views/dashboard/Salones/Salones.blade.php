@extends('Dashboard.Salones.crearSalon')
@extends('plantilla.plantilla')

@section('content')

<div class="dashboard">
    <a href="{{ route('Salones.create') }}" class="btn btn-primary mb-3">Crear Salón</a>

</div>
@endsection

