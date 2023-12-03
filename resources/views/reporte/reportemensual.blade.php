@extends('plantilla.plantilla')

@section('estilos')
    <!-- Incluye los estilos de Flatpickr -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection

@section('content')
    <div class="text-center"> <!-- Agregado el contenedor con la clase text-center para centrar -->
        <!-- Campo de entrada para la fecha -->
        <input type="text" id="calendario">
    </div>
@endsection

@section('scripts')
    <!-- Inicializa Flatpickr sin el icono y mostrando automáticamente el calendario al hacer clic -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr("#calendario", {
            // Opciones de configuración...
            allowInput: true,
            clickOpens: true,
            dateFormat: "d-m-y"  // Puedes ajustar el formato de fecha según tus preferencias
        });
    </script>
@endsection

