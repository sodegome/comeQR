<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserResidenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $residentes = User::where('rol_id','1')->paginate(15);
        return view('residente.index', compact('residentes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('residente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['username'=>'required',
                                    'name'=>'required',
                                    'last_name'=>'required',
                                    'email'=>'required',
                                    'password'=>'required',
                                    'casa_id'=>'required',
                                    'identification'=>'required',
                                    'type_id'=>'required',
                                    'cell'=>'required']);

        $input = $request->all();

        User::create(['username'=>$input['username'],
                      'name'=>$input['name'],
                      'last_name'=>$input['last_name'],
                      'email'=>$input['email'],
                      'password'=>Hash::make($input['password']),
                      'casa_id'=>$input['casa_id'],
                      'identification'=>$input['identification'],
                      'type_id'=>$input['type_id'],
                      'cell'=>$input['cell'],
                      'rol_id'=>'1',
                      'state'=>'A']);

        return redirect('residentes')->with('success','Registro Almacenado Satisfactoriamente');
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
    public function edit(User $residente)
    {
        return view('residente.edit', compact('residente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $residente)
    {
        $this->validate($request, ['username'=>'required',
                                    'name'=>'required',
                                    'last_name'=>'required',
                                    'email'=>'required',
                                    'casa_id'=>'required',
                                    'identification'=>'required',
                                    'type_id'=>'required',
                                    'cell'=>'required',
                                    'state'=>'required']);

        $residente->update($request->all());
        return redirect('residentes')->with('success','Registro Actualizado Satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $residente)
    {
        $residente->delete();
        return redirect('residentes')->with('success','Registro Eliminado Satisfactoriamente');
    }
}
