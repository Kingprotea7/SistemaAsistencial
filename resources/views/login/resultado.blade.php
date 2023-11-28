<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Resultado de Consulta</title>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .card-container {
            display: flex;
            gap: 20px;
        }

        .card {
            border-radius: 1rem;
            width: 400px;
        }

        .card-body {
            padding: 4rem 2rem;
        }

        h1 {
            color: #007bff;
            text-align: center;
        }

        p {
            margin-bottom: 0.5rem;
        }

        .summary-card {
            border-radius: 1rem;
            width: 300px;
        }

        .summary-card-body {
            padding: 2rem;
        }

        .summary-title {
            color: #28a745;
            text-align: center;
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card-container">
            <div class="card">
                <div class="card-body">
                    <h1 class="mb-4">Información del Alumno</h1>
                    @if ($alumno)
                        <p><strong>Nombre:</strong> {{ $alumno->nombre }}</p>
                        <p><strong>Apellido Paterno:</strong> {{ $alumno->apellido_paterno }}</p>
                        <p><strong>Apellido Materno:</strong> {{ $alumno->apellido_materno }}</p>
                        <p><strong>Número del Padre:</strong> {{ $alumno->num_padre }}</p>
                        <p><strong>Nivel Educativo:</strong> {{ $alumno->nivel }}</p>
                        <p><strong>Grado:</strong> {{ $alumno->grado }}</p>
                        <p><strong>Sección:</strong> {{ $alumno->seccion }}</p>
                        <p><strong>Identificador</strong> {{ $alumno->numero_aleatorio }}</p>
                    @else
                        <p>Alumno no encontrado</p>
                    @endif
                </div>
            </div>

            <div class="card summary-card">
                <div class="card-body">
                    <h2 class="card-title">Resumen de Asistencia Semanal</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Asistencias</th>
                                <th>Tardanzas</th>
                                <th>Faltas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $alumno->asistencias }}</td>
                                <td>{{ $alumno->tardanzas }}</td>
                                <td>{{ $alumno->faltas }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
