@extends('plantilla')
@section('titulo', 'lista de usuarios')
@section('contenido')

<h1>Editar un Usuario</h1>
<form action="{{route('user.update', $user)}}" method="post">

    @csrf
    nombre:
    <input type="text" name="name" value="{{$user->name}}"><br>
    email:
    <input type="text" name="email" value="{{$user->email}}"><br>
    password:
    <input type="text" name = "passwod"><br>
    rol:
    <input type="text" name="rol" value="{{$user->rol}}"><br>

    <input type="submit" value="enviar">
</form>
@endsection
