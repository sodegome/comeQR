<?php

namespace App\Http\Controllers;

use App\Casa;
use Illuminate\Http\Request;

class CasaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $casas = Casa::paginate(10);
        return view('casa.casaindex', compact('casas'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('casa.casacreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['manzana'=>'required','villa'=>'required','telefono'=>'required']);
        Casa::create($request->all());
        return redirect('casas')->with('success','Registro Almacenado Satisfactoriamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Casa  $casa
     * @return \Illuminate\Http\Response
     */
    public function show(Casa $casa)
    {
        return $casa;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Casa  $casa
     * @return \Illuminate\Http\Response
     */
    public function edit(Casa $casa)
    {
        return view('casa.casaedit', compact('casa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Casa  $casa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Casa $casa)
    {
        $this->validate($request, ['manzana'=>'required','villa'=>'required','telefono'=>'required']);
        $casa->update($request->all());
        return redirect('casas')->with('success','Registro Actualizado Satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Casa  $casa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Casa $casa)
    {
        $casa->delete();
        return redirect('casas')->with('success','Registro Eliminado Satisfactoriamente');
    }
}
