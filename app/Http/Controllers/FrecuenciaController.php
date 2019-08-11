<?php

namespace App\Http\Controllers;

use App\Frecuencia;
use Illuminate\Http\Request;

class FrecuenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $input = request()->all();
        $request->validate([
            'hora_desde'=> 'required|date_format:"H:i"',
            'hora_hasta' => 'required|date_format:"H:i"',
            'lunes' => 'required|in:S,N',
            'martes' => 'required|in:S,N',
            'miercoles' => 'required|in:S,N',
            'jueves' => 'required|in:S,N',
            'viernes' => 'required|in:S,N',
            'sabado' => 'required|in:S,N',
            'domingo' => 'required|in:S,N'   
        ]);

        $frecuencia = new Frecuencia ([
            'hora_desde'=> $input['hora_desde'],
            'hora_hasta' => $input['hora_hasta'],
            'lunes' => $input['lunes'],
            'martes' => $input['martes'],
            'miercoles'  => $input['miercoles'],
            'jueves' => $input['jueves'],
            'viernes' => $input['viernes'],
            'sabado' => $input['sabado'],
            'domingo' => $input['domingo']
        ]);

        $frecuencia->save();

        return response()->json(['frecuencia'=>$frecuencia->id],200);$frecuencia->id;

        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Frecuencia  $frecuencia
     * @return \Illuminate\Http\Response
     */
    public function show(Frecuencia $frecuencia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Frecuencia  $frecuencia
     * @return \Illuminate\Http\Response
     */
    public function edit(Frecuencia $frecuencia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Frecuencia  $frecuencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Frecuencia $frecuencia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Frecuencia  $frecuencia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Frecuencia $frecuencia)
    {
        //
    }


   









}
