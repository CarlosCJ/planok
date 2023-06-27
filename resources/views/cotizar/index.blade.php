<?php
ini_set('max_execution_time', 800);
?>
@extends('layouts.layout')
@section('title', 'Cotizaciones')
@section('content')

<div class="container pt-md-5 pb-md-5 pt-3 pb-3">
    <h1>Cotizaciones</h1>
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
                    <td>{{ Utiles::ponePuntosNumero($cotizacion->total) }}</td>
                    <td>
{{--                        <button type="button" class="btn btn-info btn-ver-detalle" data-url="{{ route('verDetalle', $cotizacion->idCotizacion) }}">--}}
{{--                            Ver Detalle--}}
{{--                        </button>--}}
                        <button class="btn btn-info btn-ver-detalle" data-id="{{ $cotizacion->idCotizacion }}">Ver detalles</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $cotizaciones->links() }}
    <div class="row">
        <!-- Modal -->
        <div class="modal fade" id="modal-detalle" tabindex="-1" aria-labelledby="modal-detalle-label" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-detalle-label">Detalles del dato</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Aquí se mostrará la información detallada del dato -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop

@section('scriptJS')
<script>
    $(document).ready(function() {
        $('.btn-ver-detalle').click(function() {
            var id = $(this).data('id');
            console.log(id);
            $.ajax({
                url: '/get-data/' + id,
                type: 'GET',
                success: function(response) {
                    console.log(response);
                    // var html = generateModalContent(response);
                    // $('#modal-detalle .modal-body').html(html);
                    var detalleHtml = generateDetalleHtml(response);
                    $('#modal-detalle .modal-body').html(detalleHtml);
                    $('#modal-detalle').modal('show');
                },
                error: function(xhr) {
                    // Manejar errores aquí
                }
            });
        });
    });

    function generateDetalleHtml(detalleCotizacion) {
        var clienteHtml = generateClienteHtml(detalleCotizacion.cotizacion.cliente);
        var usuarioHtml = generateUsuarioHtml(detalleCotizacion.cotizacion.usuario);
        var productosHtml = generateProductosHtml(detalleCotizacion.cotizacion.productos);

        var html =
            '<div class="container pt-md-5 pb-md-5 pt-3 pb-3">' +
            '<div class="d-flex flex-wrap">' +
            '<div class="flex-fill mb-4 mx-4">' +
            '<h3>Datos de cliente</h3>' +
            '<table class="table table-auto">' +
            '<tbody>' +
            clienteHtml +
            '</tbody>' +
            '</table>' +
            '</div>' +
            '<div class="flex-fill mb-4 mx-4">' +
            '<h3>Datos del usuario</h3>' +
            '<table class="table table-auto">' +
            '<tbody>' +
            usuarioHtml +
            '</tbody>' +
            '</table>' +
            '</div>' +
            '</div>' +
            '<h3>Datos de producto</h3>' +
            '<table class="table">' +
            '<thead>' +
            '<tr>' +
            '<th scope="col">Tipo Producto</th>' +
            '<th scope="col">ID</th>' +
            '<th scope="col">Descripción</th>' +
            '<th scope="col">Valor Lista</th>' +
            '<th scope="col">Orientación</th>' +
            '<th scope="col">Piso</th>' +
            '<th scope="col">Superficie</th>' +
            '<th scope="col">Estado</th>' +
            '<th scope="col">Sector</th>' +
            '</tr>' +
            '</thead>' +
            '<tbody>' +
            productosHtml +
            '</tbody>' +
            '</table>';

        return html;
    }

    function generateClienteHtml(cliente) {
        var id = cliente.id;
        var nombreCompleto = capitalizeFirstWord(cliente.nombre);
        var email = cliente.email.toLowerCase();
        var telefono = cliente.telefono;
        var edad = cliente.edad;
        var sexo = cliente.sexo;
        var estado = cliente.region;

        var html =
            '<tr>' +
            '<td>ID</td>' +
            '<td>' + id + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>RUN</td>' +
            '<td>' + cliente.rut + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Nombre completo</td>' +
            '<td>' + nombreCompleto + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Email</td>' +
            '<td>' + email + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Telefono</td>' +
            '<td>' + telefono + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Edad</td>' +
            '<td>' + edad + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Sexo</td>' +
            '<td>' + sexo + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Estado</td>' +
            '<td>' + estado + '</td>' +
            '</tr>';
        return html;
    }

    function generateUsuarioHtml(usuario) {
        var id = usuario.id;
        var nombreCompleto = capitalizeFirstWord(usuario.nombre) + ' ' + capitalizeFirstWord(usuario.apellido);
        var email = usuario.correo.toLowerCase();
        var edad = usuario.edad;
        var sexo = usuario.sexo;
        var estado = usuario.estado;

        var html =
            '<tr>' +
            '<td>ID</td>' +
            '<td>' + id + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>RUN</td>' +
            '<td>' + rut + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Nombre completo</td>' +
            '<td>' + nombreCompleto + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Email</td>' +
            '<td>' + email + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Edad</td>' +
            '<td>' + edad + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Sexo</td>' +
            '<td>' + sexo + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Estado</td>' +
            '<td>' + estado + '</td>' +
            '</tr>';

        return html;
    }

    function generateProductosHtml(productos) {
        var html = '';

        productos.forEach(function(producto) {
            var tipoDescripcion = producto.tipo.descripcion;
            var id = producto.id;
            var descripcion = producto.descripcion;
            var valorLista = producto.valorLista;
            var orientacion = producto.orientacion;
            var piso = producto.piso;
            var superficie = producto.superficie;
            var estado = producto.estado;
            var sector = producto.sector;

            html +=
                '<tr>' +
                '<td>' + tipoDescripcion + '</td>' +
                '<td>' + id + '</td>' +
                '<td>' + descripcion + '</td>' +
                '<td>' + valorLista + '</td>' +
                '<td>' + orientacion + '</td>' +
                '<td>' + piso + '</td>' +
                '<td>' + superficie + '</td>' +
                '<td>' + estado + '</td>' +
                '<td>' + sector + '</td>' +
                '</tr>';
        });
        return html;
    }

    function capitalizeFirstWord(string) {
        return string.charAt(0).toUpperCase() + string.slice(1).toLowerCase();
    }

</script>
@stop
