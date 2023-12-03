<!-- usuarios.blade.php -->

@extends('plantilla.plantilla')

@section('content')
<div class="container text-center">
    <h2>Lista de Usuarios registrados </h2>

    <table class="table table-hover">
        <thead>
            <tr class="bg-danger">
                <th><a href="{{ route('ordenarusuarios', ['order_by' => 'id']) }}" class="text-decoration-none text-white">ID</a></th>
                <th><a href="{{ route('ordenarusuarios', ['order_by' => 'name']) }}" class="text-decoration-none text-white">Nombre</a></th>
                <th><a href="{{ route('ordenarusuarios', ['order_by' => 'lastname']) }}" class="text-decoration-none text-white">Apellido</a></th>
                <th><a href="{{ route('ordenarusuarios', ['order_by' => 'email']) }}" class="text-decoration-none text-white">Email</a></th>
                <th><a href="{{ route('ordenarusuarios', ['order_by' => 'role']) }}" class="text-decoration-none text-white">Rol</a></th>
                <th><a href="{{ route('ordenarusuarios', ['order_by' => 'created_at']) }}" class="text-decoration-none text-white">Creado en</a></th>
                <th><a href="{{ route('ordenarusuarios', ['order_by' => 'updated_at']) }}" class="text-decoration-none text-white">Ultima conexión</a></th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->lastname }}</td>
                    <td>{{ $user->email }}</td>
                    <td class="{{ $user->role === 'admi' ? 'bg-danger text-white' : ($user->role === 'user' ? 'bg-info' : '') }}">{{ $user->role }}</td>
                    <td>{{ $user->created_at->format('d/m/Y H:i:s') }}</td>
                    <td>{{ $user->updated_at}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
