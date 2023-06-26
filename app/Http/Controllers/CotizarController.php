<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Cotizar;
use App\Models\Usuario;
use Illuminate\Http\Request;

class CotizarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cotizaciones = Cotizar::with('user')->with('customer')->paginate(10);
        return view('cotizar.index')
            ->with('cotizaciones', $cotizaciones);
    }

    public function getData($id)
    {
        $data = [];
        $cotizacionProducto = Cotizar::with('quoteProduct.product.typeProduct')->find($id);
        // Verificar si se encontró la cotización
        if (!$cotizacionProducto) {
            // Manejar el caso de cotización no encontrada
            return response()->json(['error' => 'La cotización no existe'], 404);
        }

        // Mapear los datos
        $cotizacion = [
            'id' => $cotizacionProducto->idCotizacion,
            'usuario' => Usuario::find($cotizacionProducto->idUsuario),
            'cliente' => Cliente::find($cotizacionProducto->idCliente),
            'productos' => []
        ];

        foreach ($cotizacionProducto->quoteProduct as $quoteProduct) {
            $producto = [
                'id' => $quoteProduct->product->idProducto,
                'descripcion' => $quoteProduct->product->descripcion,
                'valorLista' => $quoteProduct->product->valorLista,
                'orientacion' => $quoteProduct->product->orientacion,
                'piso' => $quoteProduct->product->piso,
                'superficie' => $quoteProduct->product->superficie,
                'estado' => $quoteProduct->product->estado,
                'sector' => $quoteProduct->product->sector,
                'tipo' => [
                    'id' => $quoteProduct->product->typeProduct->idTipoProducto,
                    'descripcion' => $quoteProduct->product->typeProduct->descripcion
                ]
            ];

            $cotizacion['productos'][] = $producto;
        }

        // Devolver los datos en una variable para llevar a la vista
        $datosCotizacion = [
            'cotizacion' => $cotizacion
        ];
        return $datosCotizacion;

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
     * @param  \App\Models\Cotizar  $cotizar
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = [];
        $cotizacionProducto = Cotizar::with('quoteProduct.product.typeProduct')->find($id);
        // Verificar si se encontró la cotización
        if (!$cotizacionProducto) {
            // Manejar el caso de cotización no encontrada
            return response()->json(['error' => 'La cotización no existe'], 404);
        }

        // Mapear los datos
        $cotizacion = [
            'id' => $cotizacionProducto->idCotizacion,
            'usuario' => Usuario::find($cotizacionProducto->idUsuario),
            'cliente' => Cliente::find($cotizacionProducto->idCliente),
            'productos' => []
        ];

        foreach ($cotizacionProducto->quoteProduct as $quoteProduct) {
            $producto = [
                'id' => $quoteProduct->product->idProducto,
                'descripcion' => $quoteProduct->product->descripcion,
                'valorLista' => $quoteProduct->product->valorLista,
                'orientacion' => $quoteProduct->product->orientacion,
                'piso' => $quoteProduct->product->piso,
                'superficie' => $quoteProduct->product->superficie,
                'estado' => $quoteProduct->product->estado,
                'sector' => $quoteProduct->product->sector,
                'tipo' => [
                    'id' => $quoteProduct->product->typeProduct->idTipoProducto,
                    'descripcion' => $quoteProduct->product->typeProduct->descripcion
                ]
            ];

            $cotizacion['productos'][] = $producto;
        }

        // Devolver los datos en una variable para llevar a la vista
        $detalleCotizacion = [
            'cotizacion' => $cotizacion
        ];

        return view('cotizar.show')
            ->with('detalleCotizacion', $detalleCotizacion);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cotizar  $cotizar
     * @return \Illuminate\Http\Response
     */
    public function edit(Cotizar $cotizar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cotizar  $cotizar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cotizar $cotizar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cotizar  $cotizar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cotizar $cotizar)
    {
        //
    }
}
