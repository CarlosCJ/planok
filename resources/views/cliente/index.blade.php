<?php
ini_set('max_execution_time', 800);
?>
@extends('layouts.layout')
@section('title', 'Clientes')
@section('content')

<div class="container pt-md-5 pb-md-5 pt-3 pb-3">

    <form action="#" method="GET" class="mb-5">
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="estado">Estado:</label>
                    <select name="estado" id="estado" class="form-control">
                        <option value="">Todos</option>
                        <option value="disponible">Disponible</option>
                        <option value="vendido">Vendido</option>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="sector">Sector:</label>
                    <select name="sector" id="sector" class="form-control">
                        <option value="">Todos</option>
                        @foreach($sectores as $sector)
                            <option value="{{ $sector->sector }}">{{ $sector->sector }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="descripcion">Descripción:</label>
                    <select name="descripcion" id="descripcion" class="form-control">
                        <option value="">Todos</option>
                        @foreach($tipoProductos as $tipoProducto)
                            <option value="{{ $tipoProducto->idTipoProducto }}">{{ $tipoProducto->descripcion }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-3 text-center">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Filtrar</button>
                </div>
            </div>
        </div>
    </form>

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">RUN</th>
                <th scope="col">Nombre</th>
                <th scope="col">Correo</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Estado</th>
                <th scope="col">Sector</th>
                <th scope="col">Producto</th>
            </tr>
        </thead>
        <tbody>

            @foreach($clientes as $cliente)
                <tr>
                    <td>{{ Utiles::calcularDV($cliente->rut) }}</td>
                    <td>{{ Utiles::capitalizaPrimeraPalabra($cliente->nombre) }}</td>
                    <td>{{ mb_strtolower($cliente->email) }}</td>
                    <td>{{ $cliente->telefono }}</td>
                    <td>{{ $cliente->estado }}</td>
                    <td>{{ $cliente->sector }}</td>
                    <td>{{ $cliente->descripcion }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@stop

