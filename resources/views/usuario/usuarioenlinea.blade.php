@extends('plantilla.plantilla')

@section('content')
    <h2>Usuarios en Líneas</h2>

    @if (Auth::check())
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <!-- Agrega cualquier otra columna que desees mostrar -->
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ Auth::user()->name }}</td>
                    <td>{{ Auth::user()->lastname }}</td>
                    <td>{{ Auth::user()->email }}</td>
                    <!-- Agrega cualquier otro dato que desees mostrar -->
                </tr>
            </tbody>
        </table>
    @else
        <p>No hay usuarios en línea en este momento.</p>
    @endif
@endsection
