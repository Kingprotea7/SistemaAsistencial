<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro de Asistencia</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Registro de Asistencia</h2>
        <form action="{{ route('registrarAsistencia') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="fecha">Fecha</label>
                <input type="date" class="form-control" id="fecha" name="fecha" required>
            </div>
            <div class="form-group">
                <label for="estado">Estado de la Asistencia</label>
                <select class="form-control" id="estado" name="estado" required>
                    <option value="asistencia">Asistencia</option>
                    <option value="tardanza">Tardanza</option>
                    <option value="falta">Falta</option>
                </select>
            </div>
            <input type="hidden" name="alumno_id" value="{{ $alumno->id }}">
            <button type="submit" class="btn btn-primary">Registrar Asistencia</button>
        </form>
    </div>
</body>
</html>
