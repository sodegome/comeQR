<?php

namespace App\Http\Controllers;

use App\Invitado;
use App\Invitation;
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
                'serialQR'=> 'required|string',
                'placa_vehiculo' => 'nullable|string',
                'fecha_desde' => 'required|date_format:"Y-m-d"',
                'fecha_hasta' => 'required|date_format:"Y-m-d"',
                'hora_desde' => 'required|date_format:"H:i"',
                'hora_hasta' => 'required|date_format:"H:i"',
                'state'  => 'in:AC,IC,IN,SA',
            ]);

            $invitation = new Invitation ([
                'serialQR'=> $input['serialQR'],
                'placa_vehiculo' => $input['placa_vehiculo'],
                'fecha_desde' => $input['fecha_desde'],
                'fecha_hasta' => $input['fecha_hasta'],
                'hora_desde' => $input['hora_desde'],
                'hora_hasta' => $input['hora_hasta'],
                'state'  => $input['state']
            ]);

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

        $datenow = date('Y-m-d');
        $horanow = date('H:i');

        $invitacion = Invitation::where('serialQR','=',$input['SERIAL'])
                                ->where('state','=','AC')
                                ->where('fecha_desde','<=',$datenow)
                                ->where('fecha_hasta','>=',$datenow)
                                ->whereTime('hora_desde','<=',$horanow)
                                ->whereTime('hora_hasta','>=',$horanow)->first();



        if($invitacion==null){
            return response()->json(['response'=>'-1', 
                                     'fecha_sys' => $datenow , 
                                     'hora_sys' => $horanow ],400);
        }else{

            $invitacion->state = 'IN';
            $invitacion->save();
            
            return response()->json(['response'=>'1', 
                                    'fecha_sys' => $datenow, 
                                    'hora_sys' => $horanow ],200);
        }

    }


}
