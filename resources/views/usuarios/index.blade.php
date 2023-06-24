<?php
ini_set('max_execution_time', 800);
?>
@extends('layouts.layout')
@section('title', 'Usuarios')
@section('content')

<div class="container pt-md-5 pb-md-5 pt-3 pb-3">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">RUN</th>
                <th scope="col">Nombre</th>
                <th scope="col">Correo</th>
                <th scope="col">Perfil</th>
                <th scope="col">Estado</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>

            @foreach($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->rut }}</td>
                    <td>{{ mb_convert_case($usuario->nombre, MB_CASE_TITLE, "UTF-8") }} {{ mb_convert_case($usuario->apellido, MB_CASE_TITLE, "UTF-8") }}</td>
                    <td>{{ mb_strtolower($usuario->correo) }}</td>
                    <td>{{ $usuario->profile->descripcion }}</td>
                    <td>{{ $usuario->estado }}</td>
                    <td>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@stop

