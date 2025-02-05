
@extends('plantilla')
@section('titulo', 'lista de usuarios')
@section('contenido')

<h1>Listado de Usuarios</h1>
<table>
    <tr>
        <th>nombre</th>
        <th>email</th>
        <th>rol</th>
    </tr>
@forelse ($users as $user)
    <tr>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->rol }}</td>
    </tr>
@empty

@endforelse
</table>
@endsection



