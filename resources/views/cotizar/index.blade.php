<?php
ini_set('max_execution_time', 800);
?>
@extends('layouts.layout')
@section('title', 'Cotizaciones')
@section('content')

<div class="container pt-md-5 pb-md-5 pt-3 pb-3">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">RUN Cliente</th>
                <th scope="col">Sub Total</th>
                <th scope="col">Descuento</th>
                <th scope="col">Total</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>

            @foreach($cotizaciones as $cotizacion)
                <tr>
                    <td>{{ $cotizacion->idCotizacion }}</td>
                    <td>{{ Utiles::calcularDV($cotizacion->customer->rut) }}</td>
                    <td>{{ Utiles::ponePuntosNumero($cotizacion->subtotal) }}</td>
                    <td>{{ $cotizacion->descuento }}</td>
                    <td>{{  Utiles::ponePuntosNumero($cotizacion->total) }}</td>
                    <td>
                        <button class="btn btn-info">Ver Detalle</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@stop

