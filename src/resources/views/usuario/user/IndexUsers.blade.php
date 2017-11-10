<!--<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title> Usuarios </title>

<!- Styles -
    <link href="{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>-->
@extends('layouts.app')

@section('titulo')
    Modulo Cliente, Lista de Usuarios
    @endsection

@section('content')
        <a href="{{route('Usuario.index')}}" class="btn btn-info">All</a></h2>
        <a href="{{route('Cliente.index')}}" class="btn btn-info">Only Clientes</a></h2>
        <a href="{{route('Empleado.index')}}" class="btn btn-info">Only Empleados</a></h2>
        <a href="{{route('Contrato.index')}}" class="btn btn-info">All Contratos</a></h2>
    <table class="table">
        <thead>
          <th>Nombre</th>
          <th>Apellidos</th>
          <th>Correo</th>
          <th>Telefono</th>
          <th>Tipo Rol</th>
          <th>es la hora</th>
        </thead>
    @foreach($users as $user)
    @if ($user->tipo_rol!='root')
    <tbody>
        @php
        $Telefono = App\Models\Usuarios\Telefono::findOrFail($user->id);
      @endphp
            <td><a href="{{route('Usuario.show',['usuario' => $user->id])}}">{{$user->name}}</a></td>
            <td>{{$user->apellidos}}</td>
            <td>{{$user->email}}</td>
            <td>{{$Telefono->telefono}}</td>
            <td>{{$user->tipo_rol}}</td>
            <td>{{$user->active}}
              <small class="pull-right">
              <form action="{{route('Usuario.destroy',['usuario' => $user->id])}}" method="post">
                {{csrf_field()}}
                {{method_field('DELETE')}}
                <button type="submit" class="btn btn-danger">Delete</button>
              </form></small><small class="pull-right">
                  <a href="{{route ('Usuario.edit',['user' => $user->id])}}" class="btn btn-info">Edit</a>
            </small></td>
          </tbody>
          @endif
    @endforeach
@endsection
