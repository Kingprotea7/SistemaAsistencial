@extends('plantilla.plantilla')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Calendario de Reportes Asistenciales</h2>

    <!-- Calendario -->
    <div class="input-group date">
        <input type="text" class="form-control" placeholder="Seleccionar fecha" readonly id="datepicker">
        <div class="input-group-append">
            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
        </div>
    </div>

    <!-- Botón para mostrar reportes -->
    <button class="btn btn-primary mt-3" onclick="mostrarReportes()">Mostrar Reportes</button>

    <!-- Espacio para mostrar los reportes -->
    <div id="reportesContainer" class="mt-4">
        <!-- Aquí se mostrarán los reportes -->
    </div>
</div>


<script>
    // Inicializar el datepicker
    $(document).ready(function(){
        $("#datepicker").datepicker({
            format: 'yyyy-mm-dd',
            todayHighlight: true,
            autoclose: true
        });
    });

    // Función para mostrar reportes
    function mostrarReportes() {
        // Obtener la fecha seleccionada
        var fechaSeleccionada = $("#datepicker").val();

        // Realizar una llamada AJAX para obtener y mostrar los reportes asistenciales para la fecha seleccionada
        // Aquí deberías implementar la lógica para obtener y mostrar los reportes en el contenedor correspondiente
        // Puedes utilizar jQuery.ajax() o la API Fetch de JavaScript para la llamada AJAX.
        // Por ahora, simplemente mostraremos un mensaje de ejemplo.

        // Mostrar un mensaje de ejemplo
        $("#reportesContainer").html("<p>Reportes para la fecha " + fechaSeleccionada + ":</p><p>Reporte 1...</p><p>Reporte 2...</p>");
    }
</script>

@endsection
