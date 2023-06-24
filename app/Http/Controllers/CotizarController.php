<?php

namespace App\Http\Controllers;

use App\Models\Cotizar;
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
        $cotizaciones = Cotizar::with('user')->with('customer')->get();
        return view('cotizar.index')
            ->with('cotizaciones', $cotizaciones);
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
    public function show(Cotizar $cotizar)
    {
        //
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
