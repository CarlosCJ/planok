<?php
ini_set('max_execution_time', 800);
?>
@extends('layouts.layout')
@section('title', 'Ventas Realizadas')
@section('content')

<div class="container pt-md-5 pb-md-5 pt-3 pb-3">

    <form action="#" method="GET" class="mb-5">
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="sector">Comuna:</label>
                    <select name="sector" id="sector" class="form-control">
                        <option value="">Todos</option>
                        @foreach($productos as $sector)
                            <option value="{{ $sector->sector }}">{{ $sector->sector }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col text-center">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Filtrar</button>
                </div>
            </div>
        </div>
    </form>

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Comuna</th>
                <th scope="col">Total Venta</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $venta)
                <tr>
                    <td></td>
                    <td>{{ $venta->sector }}</td>
                    <td>{{ Utiles::ponePuntosNumero($venta->total) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@stop

