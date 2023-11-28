<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @extends('plantilla.plantilla')
    @section('content')
    <div class="container mt-5">
        <h2 class="text-center mb-4">Listado de Alumnos</h2>

        @if ($alumnos !== null && count($alumnos) > 0)
        <table class="table table-striped table-bordered table-hover text-center">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Num. de Padre</th>
                    <th>Nivel</th>
                    <th>Grado</th>
                    <th>Sección</th>
                </tr>
            </thead>
            <tbody>
                @foreach($alumnos as $alumno)
                <tr>
                    <td>{{ $alumno->nombre }}</td>
                    <td>{{ $alumno->apellido_paterno }}</td>
                    <td>{{ $alumno->apellido_materno }}</td>
                    <td>{{ $alumno->num_padre }}</td>
                    <td>{{ $alumno->nivel }}</td>
                    <td>{{ $alumno->grado }}</td>
                    <td>{{ $alumno->seccion }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <p>No se encontraron resultados.</p>
        @endif
    </div>

    @endsection

</body>
</html>
