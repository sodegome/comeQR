<?php

namespace App\Http\Controllers;

use App\Invitado;
use App\Invitation;
use App\Frecuencia;
use Illuminate\Http\Request;

class InvitationController extends Controller
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
    public function store(Request $request, Invitado $invitado)
    {
        if($invitado == null)return response()->json(['error'=>'error creando invitacion'],500);
        $input = request()->all();

        try{

            $request->validate([
                'serial' => 'required|string',
                'placa_vehiculo' => 'nullable|string',
                'fecha_desde' => 'required|date_format:"Y-m-d H:i"',
                'fecha_hasta' => 'required|date_format:"Y-m-d H:i"',
                'state'  => 'in:A,I',
                'frecuencia' => 'sometimes|numeric|nullable'
            ]);

            $invitation = new Invitation ([
                'serial'=> $input['serial'],
                'placa_vehiculo' => $input['placa_vehiculo'],
                'fecha_desde' => $input['fecha_desde'],
                'fecha_hasta' => $input['fecha_hasta'],
                'state'  => $input['state'],
            ]);

            if($request->has('frecuencia')){
                $invitation->frecuencia_id = $input['frecuencia'];
            }

            $invitado->invitations()->save($invitation);
            
            return response()->json(['success'=>'Invitacion creada correctamente'],200);

         
        }catch(Exception $e){
            return response()->json(['error'=>'error creando invitacion '.  $e->getMessage()],500);

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Invitation  $invitation
     * @return \Illuminate\Http\Response
     */
    public function show(Invitation $invitation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Invitation  $invitation
     * @return \Illuminate\Http\Response
     */
    public function edit(Invitation $invitation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Invitation  $invitation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invitation $invitation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Invitation  $invitation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invitation $invitation)
    {
        //
    }


    public function validarQr(Request $request){

        $input = request()->all();
        
        $request->validate([
                'SERIAL'=> 'required|string',
        ]);

        $datenow = date('Y-m-d H:i');

        
        $invitacion = Invitation::where('serial','=',$input['SERIAL'])
                                ->where('state','=','A')
                                ->where('fecha_desde','<=',$datenow)
                                ->where('fecha_hasta','>=',$datenow)->first();

        if($invitacion != null){
            
            $frecuencia = $invitacion->frecuencia;
            if($frecuencia != null){ 
                if($frecuencia->checkTime()){
                    return response()->json(['response'=>'1', 
                                    'Message' => 'frecuente',
                                    'fecha_sys' => $datenow],200);

                }else{
                    return response()->json(['response'=>'-1', 
                                    'Message' => 'frecuente, fuera de tiempo',
                                    'fecha_sys' => $datenow ],200);

                }
            }else{
                $invitacion->state = 'I';
                $invitacion->save();
            
                return response()->json(['response'=>'1', 
                                    'Message' => 'Esporadico',
                                    'fecha_sys' => $datenow],200);

            }

        }
        
        return response()->json(['response'=>'-1', 
                                 'Message' => 'Invitado fuera del rango fecha, o invitacion inexistente',
                                 'fecha_sys' => $datenow],200);
      

    }


}
