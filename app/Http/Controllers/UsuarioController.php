<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Http\Request;
use App\Http\Controllers\Utiles;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Usuarios::get();
        foreach ($usuarios as $usuario){
            $run = $usuario->rut;
            $dv = self::calcularDV($run);
            $formattedRun = '';
            while (strlen($run) > 3) {
                $formattedRun = '.' . substr($run, -3) . $formattedRun;
                $run = substr($run, 0, -3);
            }
            $usuario->rut = $run . $formattedRun . '-' . $dv;
        }
        return view('usuarios.index')
            ->with('usuarios', $usuarios);
    }

    function calcularDV($run) {
        $run = str_replace('.', '', $run);
        $run = str_replace('-', '', $run);

        $reversedRun = strrev($run);
        $factor = 2;
        $sum = 0;

        for ($i = 0; $i < strlen($reversedRun); $i++) {
            $sum += intval($reversedRun[$i]) * $factor;
            $factor = $factor % 7 === 0 ? 2 : $factor + 1;
        }

        $dv = 11 - ($sum % 11);

        if ($dv === 10) {
            $dv = 'K';
        } elseif ($dv === 11) {
            $dv = '0';
        }

        return $dv;
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
