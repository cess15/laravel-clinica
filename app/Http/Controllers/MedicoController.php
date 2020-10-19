<?php

namespace App\Http\Controllers;

use App\Medico;
use App\TipoDocumento;
use Illuminate\Http\Request;

class MedicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medics = Medico::all();        

        return view('medicos.index',compact('medics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('medicos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $medico=new Medico();
        $medico->documento_id=intval(request('documento_id'));
        $medico->apellido=request('apellido');
        $medico->nombre=request('nombre');
        $medico->num_documento=request('num_documento');
        $medico->especialidad=request('especialidad');
        $medico->num_celular=request('num_celular');

        $medico->save();
        return redirect('/medicos');
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
        $medico=Medico::findOrFail($id);
        return view('medicos.edit',compact('medico'));
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
        $medico=Medico::findOrFail($id);
        $medico->documento_id=$request->get('documento_id');
        $medico->apellido=$request->get('apellido');
        $medico->nombre=$request->get('nombre');
        $medico->num_documento=$request->get('num_documento');
        $medico->especialidad=$request->get('especialidad');
        $medico->num_celular=$request->get('num_celular');
        $medico->update();
        return redirect('/medicos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd($id);

        $medico=Medico::findOrFail($id);

        $medico->delete();

        return redirect('/medicos');
    }
}
