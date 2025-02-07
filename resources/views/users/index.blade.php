
@extends('plantilla')
@section('titulo', 'lista de usuarios')
@section('contenido')

<h1>Listado de Usuarios</h1>
<table>
    <tr>
        <th>nombre</th>
        <th>email</th>
        <th>rol</th>
        <th>Acciones</th>
        <th><a href="{{route('users.create')}}">Insertar Usuario</a></th>

    </tr>
@forelse ($users as $user)
    <tr>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->rol }}</td>
        <td><a href="{{route('users.edit', $user)}}">Modificar Usuario</a></td>
        <td><form action={{ route('users.destroy', $user) }} method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">Eliminar</button>

        </form></td>
    
        <td><a href="{{route('users.show', $user)}}"><button class="btn btn-success">Ver Usuario</button></a></td>

    </tr>
@empty

@endforelse
</table>
@endsection



