<?php

namespace App\Http\Controllers;

use App\Models\CotizarProducto;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Process\Process;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $startDate = $request->input('start-date');
        $endDate = $request->input('end-date');

        $productosQuery = Producto::with('typeProduct');
        if ($startDate && $endDate) {
            $productosQuery->whereBetween('fechaCreacion', [$startDate, $endDate]);
        }
        $productos = $productosQuery->paginate(10);
        $productos->appends($request->query());
        return view('producto.index')
            ->with('productos', $productos);
    }

    public function getTotalDepartamentosVendidos()
    {
        $productosVendidos = DB::table('usuario')
            ->join('cotizacion', 'usuario.id', '=', 'cotizacion.idUsuario')
            ->join('cotizacion_producto', 'cotizacion.idCotizacion', '=', 'cotizacion_producto.idCotizacion')
            ->join('producto', 'cotizacion_producto.idProducto', '=', 'producto.idProducto')
            ->join('tipo_producto', 'producto.idTipoProducto', '=', 'tipo_producto.idTipoProducto')
            ->select('usuario.*', 'producto.estado', 'producto.sector', 'tipo_producto.descripcion')
            ->where('usuario.nombre', '=', 'PILAR')
            ->where('usuario.apellido', '=', 'PINO')
            ->where('producto.sector', '=', 'Las Condes')
            ->where('producto.estado', '=', 'vendido')
            ->get();
        $cantProducto = $productosVendidos->count();

        return view('producto.vendidos')
            ->with('productos', $productosVendidos)
            ->with('cantProducto', $cantProducto);
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
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        //
    }
}
