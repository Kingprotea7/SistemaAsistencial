@extends('plantilla.plantilla')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4 h1">Lista de Alumnos</h2>

    @if ($alumnos->count() > 0)
        <!-- Formulario para generar reporte y almacenar -->
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Asistencia</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($alumnos as $alumno)
                    <tr>

                        <td>{{ $alumno->id }}</td>
                        <td>{{ $alumno->nombre }}</td>
                        <td>{{ $alumno->apellido_paterno }}</td>
                        <td>{{ $alumno->apellido_materno }}</td>
                        <td>
                            <div class="d-flex">
                                <!-- Aquí va la lógica de los botones -->
                                <div class="d-flex">
                                   <!-- Aquí va la lógica de los botones -->
@if ($alumno->asistencia_registrada)
{{-- Botón "Anular" para Asistencia Registrada --}}
<form method="post" action="{{ route('anular-asistencia', ['alumnoId' => $alumno->id, 'tipoAsistencia' => 'asistencia']) }}" id="anular-form-{{ $alumno->id }}-asistencia">
@csrf
<input type="submit" class="btn btn-secondary" value="Anular Asistencia">
</form>
@else
{{-- Botones "Asistió", "Tarde" y "Falta" --}}
<form method="post" action="{{ route('registrar-asistencias') }}">
@csrf
<input type="hidden" name="alumno_id" value="{{ $alumno->id }}">
<input type="hidden" name="estado" value="asistio">
<input type="hidden" name="tipoAsistencia" value="asistencia"> <!-- Asegúrate de que este campo sea "asistencia" -->
<input type="submit" class="btn btn-success asistio-button" value="Asistió">

</form>
@endif


                                @if ($alumno->tardanza_registrada)
                                    {{-- Botón "Anular" para Tardanza --}}
                                    <form method="post" action="{{ route('anular-asistencia', ['alumnoId' => $alumno->id, 'tipoAsistencia' => 'tardanza']) }}" id="anular-form-{{ $alumno->id }}-tardanza">
                                        @csrf
                                        <input type="submit" class="btn btn-secondary" value="Anular Tardanza">
                                    </form>
                                @else
                                    <form method="post" action="{{ route('registrar-asistencias') }}">
                                        @csrf
                                        <input type="hidden" name="alumno_id" value="{{ $alumno->id }}">
                                        <input type="hidden" name="estado" value="tarde">
                                        <input type="hidden" name="tipoAsistencia" value="tardanza"> <!-- Añade este campo -->
                                        <input type="submit" class="btn btn-warning tarde-button" value="Tarde">
                                    </form>
                                @endif

                                @if ($alumno->falta_registrada)
                                    {{-- Botón "Anular" para Falta --}}
                                    <form method="post" action="{{ route('anular-asistencia', ['alumnoId' => $alumno->id, 'tipoAsistencia' => 'falta']) }}" id="anular-form-{{ $alumno->id }}-falta">
                                        @csrf
                                        <input type="submit" class="btn btn-secondary" value="Anular Falta">
                                    </form>
                                @else
                                    <form method="post" action="{{ route('registrar-asistencias') }}">
                                        @csrf
                                        <input type="hidden" name="alumno_id" value="{{ $alumno->id }}">
                                        <input type="hidden" name="estado" value="falta">
                                        <input type="hidden" name="tipoAsistencia" value="falta"> <!-- Añade este campo -->
                                        <input type="submit" class="btn btn-danger falta-button" value="Falta">
                                    </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
            <form class="mb-4" action="{{ route('almacenar-reporte-salon', ['nivel' => request('nivel'), 'grade' => request('grade'), 'seccion' => request('seccion')]) }}" method="POST">
            @csrf


            <!-- Contenido del primer formulario -->
            <div class="mb-3" id="selectDia">
                <label class="form-label h3">Seleccionar día de reporte de asistencia:</label>
                <select name="dia" class="form-select" aria-label="Seleccionar Día">
                    @for ($i = 1; $i <= 7; $i++)
                        <?php $dia = \Carbon\Carbon::parse("Sunday +$i days")->locale('es_ES')->isoFormat('dddd'); ?>
                        <option value="{{ strtolower($dia) }}" {{ (strtolower($dia) == strtolower(\Carbon\Carbon::now()->locale('es_ES')->isoFormat('dddd'))) ? 'selected' : '' }}>
                            {{ $dia }}
                        </option>
                    @endfor
                </select>
            </div>

            <div class="mb-3" id="selectSemana" style="display: none;">
                <label class="form-label h3">Seleccionar semana de reporte de asistencia:</label>
                <select name="semana" class="form-select" aria-label="Seleccionar Semana">
                    <option value="1">Semana 1</option>
                    <option value="2">Semana 2</option>
                    <option value="3">Semana 3</option>
                    <option value="4">Semana 4</option>
                </select>
            </div>

            <div class="mb-3" id="selectMes" style="display: none;">
                <label class="form-label h3">Reporte para el mes de:</label>
                <select name="mes" class="form-select" aria-label="Seleccionar Mes">
                    @for ($i = 1; $i <= 12; $i++)
                        <?php $nombreMes = \Carbon\Carbon::create(null, $i, 1)->locale('es_ES')->isoFormat('MMMM'); ?>
                        <option value="{{ $i }}" {{ ($i == date('n')) ? 'selected' : '' }}>
                            {{ $nombreMes }}
                        </option>
                    @endfor
                </select>
            </div>
            @csrf
            @if ($alumnos->count() > 0)

            <div class="mb-3">
                <label for="selectTipoReporte" class="form-label h3">Tipo de reporte:</label>
                <div class="btn-group">

                    <button type="button" class="btn btn-dark m-1 btn-tipo-reporte" id="btn-diario" onclick="seleccionarTipoReporte('diario')">Reporte Diario</button>
<button type="button" class="btn btn-dark m-1 btn-tipo-reporte" id="btn-semanal" onclick="seleccionarTipoReporte('semanal')">Reporte Semanal</button>
<button type="button" class="btn btn-dark m-1 btn-tipo-reporte" id="btn-mensual" onclick="seleccionarTipoReporte('mensual')">Reporte Mensual</button>

<style>
    .btn-tipo-reporte.active {
    background-color: #ff0000; /* Cambia este color según tus preferencias */
    color: #ebdddd; /* Cambia este color según tus preferencias */
    border: #070707;
    font-size: 18px
}

</style>

                </div>
            </div>
            @else

        @endif
        <input type="hidden" name="tipo_reporte" id="tipoReporte" value="">



            <!-- Botón de submit para generar el reporte -->
            <button type="submit" class="btn btn-success">Generar Reporte</button>


        </form>


    @else
        <p>No se encontraron alumnos.</p>
    @endif
</div>
<script>
function seleccionarTipoReporte(tipo) {
    console.log('Tipo seleccionado:', tipo);

    var tipoReporteInput = document.getElementById('tipoReporte');
    if (tipoReporteInput) {
        tipoReporteInput.value = tipo;
        console.log('Valor del tipoReporte actualizado:', tipoReporteInput.value);
    } else {
        console.error('El elemento con id tipoReporte no fue encontrado.');
    }

    document.querySelectorAll('.btn-tipo-reporte').forEach(function(btn) {
        btn.classList.remove('active');
    });

    var selectedButton = document.getElementById('btn-' + tipo);
    if (selectedButton) {
        selectedButton.classList.add('active');
        console.log('Clase "active" añadida al botón:', selectedButton);
    } else {
        console.error('El botón con id btn-' + tipo + ' no fue encontrado.');
    }
}



</script>

<script>
    function mostrarSelect(id) {
        document.getElementById('selectDia').style.display = 'none';
        document.getElementById('selectSemana').style.display = 'none';
        document.getElementById('selectMes').style.display = 'none';

        document.getElementById(id).style.display = 'block';
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- Agrega tus scripts JS aquí, como Bootstrap o scripts personalizados -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Bootstrap Datepicker -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <footer class="footer-wrapper">
        <script>
            function ocultarBotones(tipo) {
                if (tipo === 'asistencia') {
                    document.getElementById('btn-tardanza').style.display = 'none';
                    document.getElementById('btn-falta').style.display = 'none';
                } else if (tipo === 'tardanza') {
                    document.getElementById('btn-asistencia').style.display = 'none';
                    document.getElementById('btn-falta').style.display = 'none';
                } else if (tipo === 'falta') {
                    document.getElementById('btn-asistencia').style.display = 'none';
                    document.getElementById('btn-tardanza').style.display = 'none';
                }
            }
        </script>
@endsection
