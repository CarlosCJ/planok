<?php
ini_set('max_execution_time', 800);
?>
@extends('layouts.layout')
@section('title', 'Detalle Cotización')
@section('content')

    <div class="container pt-md-5 pb-md-5 pt-3 pb-3">
        <div class="d-flex flex-wrap">
            <div class="flex-fill mb-4 mx-4">
                <h3>Datos de cliente</h3>
                <table class="table table-auto">
                    <tbody>
                    <tr>
                        <td>ID</td>
                        <td>{{ $detalleCotizacion['cotizacion']['cliente']['id'] }}</td>
                    </tr>
                    <tr>
                        <td>RUN</td>
                        <td>{{ Utiles::calcularDV($detalleCotizacion['cotizacion']['cliente']['rut']) }}</td>
                    </tr>
                    <tr>
                        <td>Nombre</td>
                        <td>{{ $detalleCotizacion['cotizacion']['cliente']['nombre'] }}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>{{ $detalleCotizacion['cotizacion']['cliente']['email'] }}</td>
                    </tr>
                    <tr>
                        <td>Teléfono</td>
                        <td>{{ $detalleCotizacion['cotizacion']['cliente']['telefono'] }}</td>
                    </tr>
                    <tr>
                        <td>Edad</td>
                        <td>{{ $detalleCotizacion['cotizacion']['cliente']['edad'] }}</td>
                    </tr>
                    <tr>
                        <td>Sexo</td>
                        <td>{{ $detalleCotizacion['cotizacion']['cliente']['sexo'] }}</td>
                    </tr>
                    <tr>
                        <td>Región</td>
                        <td>{{ $detalleCotizacion['cotizacion']['cliente']['region'] }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="flex-fill mb-4 mx-4">
                <h3>Datos del usuario</h3>
                <table class="table table-auto">
                    <tbody>
                        <tr>
                            <td>ID</td>
                            <td>{{ $detalleCotizacion['cotizacion']['usuario']['id'] }}</td>
                        </tr>
                        <tr>
                            <td>RUN</td>
                            <td>{{ Utiles::calcularDV($detalleCotizacion['cotizacion']['usuario']['rut']) }}</td>
                        </tr>
                        <tr>
                            <td>Nombre completo</td>
                            <td>
                                {{ Utiles::capitalizaPrimeraPalabra($detalleCotizacion['cotizacion']['usuario']['nombre']) }}
                                {{ Utiles::capitalizaPrimeraPalabra($detalleCotizacion['cotizacion']['usuario']['apellido']) }}
                            </td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{ mb_strtolower($detalleCotizacion['cotizacion']['usuario']['correo']) }}</td>
                        </tr>
                        <tr>
                            <td>Edad</td>
                            <td>{{ $detalleCotizacion['cotizacion']['usuario']['edad'] }}</td>
                        </tr>
                        <tr>
                            <td>Sexo</td>
                            <td>{{ $detalleCotizacion['cotizacion']['usuario']['sexo'] }}</td>
                        </tr>
                        <tr>
                            <td>Estado</td>
                            <td>{{ $detalleCotizacion['cotizacion']['usuario']['estado'] }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <h3>Datos de producto</h3>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Tipo Producto</th>
                    <th scope="col">ID</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Valor Lista</th>
                    <th scope="col">Orientación</th>
                    <th scope="col">Piso</th>
                    <th scope="col">Superficie</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Sector</th>
                </tr>
            </thead>
            <tbody>
                @foreach($detalleCotizacion['cotizacion']['productos'] as $producto)
                    <tr>
                        <td>{{ $producto['tipo']['descripcion'] }}</td>
                        <td>{{ $producto['id'] }}</td>
                        <td>{{ $producto['descripcion'] }}</td>
                        <td>{{ Utiles::ponePuntosNumero($producto['valorLista']) }}</td>
                        <td>{{ $producto['orientacion'] }}</td>
                        <td>{{ $producto['piso'] }}</td>
                        <td>{{ $producto['superficie'] }}</td>
                        <td>{{ $producto['estado'] }}</td>
                        <td>{{ $producto['sector'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <button type="button" class="btn btn-info my-4 btn-lg" id="btnVolverCotizaciones" data-url="{{ route('cotizaciones') }}">
            Volver
        </button>
    </div>

@stop

@section('scriptJS')
    <script>
        $(document).ready(function() {
            $('#btnVolverCotizaciones').click(function() {
                var url = $(this).data('url');
                window.location.href = url;
            });
        });
    </script>
@stop
