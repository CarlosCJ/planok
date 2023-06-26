<?php
ini_set('max_execution_time', 800);
?>
@extends('layouts.layout')
@section('title', 'Productos')
@section('content')

<div class="container pt-md-5 pb-md-5 pt-3 pb-3">

    <form action="#" method="GET" class="mb-5">
        <div class="row">
            <div class="col-md-5">
                <label for="start-date">Fecha desde:</label>
                <input type="date" id="start-date" name="start-date" class="form-control" value="{{ old('start-date') }}">
            </div>
            <div class="col-md-5">
                <label for="end-date">Fecha hasta:</label>
                <input type="date" id="end-date" name="end-date" class="form-control" value="{{ old('end-date') }}">
            </div>
            <div class="col-md-2 text-center">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Filtrar</button>
                </div>
            </div>
        </div>
    </form>

    @if($productos->total() !== 0)
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">Producto</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Valor Lista</th>
                    <th scope="col">Orientación</th>
                    <th scope="col">Piso</th>
                    <th scope="col">Superficie</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Fecha Creción</th>
                    <th scope="col">Sector</th>
                </tr>
            </thead>
            <tbody>

                @foreach($productos as $producto)
                    <tr>
                        <td>{{ $producto->typeProduct->descripcion }}</td>
                        <td>{{ $producto->descripcion }}</td>
                        <td>{{ Utiles::ponePuntosNumero($producto->valorLista) }}</td>
                        <td>{{ $producto->orientacion }}</td>
                        <td>{{ $producto->piso }}</td>
                        <td>{{ $producto->superficie }}</td>
                        <td>{{ $producto->estado }}</td>
                        <td>{{ Utiles::getFormateaFecha($producto->fechaCreacion) }}</td>
                        <td>{{ $producto->sector }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $productos->appends(request()->query())->links() }}
    @else
        <div class="alert alert-danger">
            No hay datos disponibles entre las fechas seleccionadas.
        </div>
    @endif
</div>

@stop

