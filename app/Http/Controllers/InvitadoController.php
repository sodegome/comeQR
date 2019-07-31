<?php

namespace App\Http\Controllers;

use App\Invitado;
use App\User;

use Illuminate\Http\Request;

class InvitadoController extends Controller
{
    /**
     *  Muestra los invitados por usuario 
     *     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $user = auth()->guard('api')->user();
       $invitados = $user->invitados;
       return $invitados;
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
        $user = Auth()->guard('api')->user();
        $input = request()->all();


        $request->validate([
            'name'=> 'required|string',
            'last_name' => 'required|string',
            'cell' => 'required|string',
            'identification' => 'required|string',
            'email' => 'required|email|string',
            'type_id' => ['required','string'],
        ]);
        
        $invitado = new Invitado(['name' => $input['name'] ,
                                  'last_name' => $input['last_name'] ,  
                                  'cell' => $input['cell'],
                                  'identification' => $input['identification'],
                                  'email' => $input['email'] ,
                                  'type_id' => $input['type_id'],
                                  'state' => "A",
                                  'user_id' => $user->id
                                ]);
  
        $invitado->save();                        //$user->save($invitado);   
            
        return $invitado->toJson();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Invitado  $invitado
     * @return \Illuminate\Http\Response
     */
    public function show(Invitado $invitado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Invitado  $invitado
     * @return \Illuminate\Http\Response
     */
    public function edit(Invitado $invitado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Invitado  $invitado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invitado $invitado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Invitado  $invitado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invitado $invitado)
    {
        //
    }
}
