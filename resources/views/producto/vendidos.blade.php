<?php
ini_set('max_execution_time', 800);
?>
@extends('layouts.layout')
@section('title', 'Productos')
@section('content')

<div class="container pt-md-5 pb-md-5 pt-3 pb-3">

{{--    <form action="#" method="GET" class="mb-5">--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-5">--}}
{{--                <label for="start-date">Fecha desde:</label>--}}
{{--                <input type="date" id="start-date" name="start-date" class="form-control" value="{{ old('start-date') }}">--}}
{{--            </div>--}}
{{--            <div class="col-md-5">--}}
{{--                <label for="end-date">Fecha hasta:</label>--}}
{{--                <input type="date" id="end-date" name="end-date" class="form-control" value="{{ old('end-date') }}">--}}
{{--            </div>--}}
{{--            <div class="col-md-2 text-center">--}}
{{--                <div class="form-group">--}}
{{--                    <button type="submit" class="btn btn-primary">Filtrar</button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </form>--}}

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Producto</th>
                <th scope="col">Sector</th>
                <th scope="col">Estado</th>
                <th scope="col">Cantidad</th>
            </tr>
        </thead>
        <tbody>

            @foreach($productos as $producto)
                <tr>
                    <td>{{ Utiles::capitalizaPrimeraPalabra($producto->nombre) }} {{ Utiles::capitalizaPrimeraPalabra($producto->apellido)  }}</td>
                    <td>{{ $producto->descripcion }}</td>
                    <td>{{ $producto->sector }}</td>
                    <td>{{ $producto->estado }}</td>
                    <td>{{ $cantProducto }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@stop

