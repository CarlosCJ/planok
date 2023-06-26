<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\TipoProducto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
//        $clientes = Cliente::with('quotes.quoteProduct.product.typeProduct')->get();
        $clientes = DB::table('cliente')
            ->rightJoin('cotizacion', 'cliente.id', '=', 'cotizacion.idCliente')
            ->join('cotizacion_producto', 'cotizacion.idCotizacion', '=', 'cotizacion_producto.idCotizacion')
            ->join('producto', 'cotizacion_producto.idProducto', '=', 'producto.idProducto')
            ->join('tipo_producto', 'producto.idTipoProducto', '=', 'tipo_producto.idTipoProducto')
            ->select('cliente.*', 'producto.estado', 'producto.sector', 'tipo_producto.descripcion')
            ->distinct();
        if ($request->has('estado') && $request->estado != '') {
            $clientes->where('producto.estado', $request->estado);
        }

        if ($request->has('sector') && $request->sector != '') {
            $clientes->where('producto.sector', $request->sector);
        }

        if ($request->has('descripcion') && $request->descripcion != '') {
            $clientes->where('tipo_producto.idTipoProducto', $request->descripcion);
        }

        $clientes = $clientes->get();
        $tipoProductos = TipoProducto::get();
        $sectores = DB::table('producto')->select('sector')->distinct()->get();

        return view('cliente.index')
            ->with('clientes', $clientes)
            ->with('tipoProductos', $tipoProductos)
            ->with('sectores', $sectores);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        //
    }
}
