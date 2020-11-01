<?php

namespace App\Http\Controllers;

use App\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('search'));
            $patients = Paciente::where('nombre', 'LIKE', '%' . $query . '%')
                ->orderBY('id', 'asc')
                ->paginate(10);
            return view('pacientes.index', compact('patients', 'query'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pacientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $paciente = new Paciente();
        $paciente->documento_id = intval(request('documento_id'));
        $paciente->apellido = request('apellido');
        $paciente->nombre = request('nombre');
        $paciente->num_documento = request('num_documento');
        $paciente->domicilio = request('domicilio');

        $paciente->save();
        return redirect('/pacientes');
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
        $paciente = Paciente::findOrFail($id);
        return view('pacientes.edit', compact('paciente'));
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
        $paciente = Paciente::findOrFail($id);
        $paciente->documento_id = $request->get('documento_id');
        $paciente->apellido = $request->get('apellido');
        $paciente->nombre = $request->get('nombre');
        $paciente->num_documento = $request->get('num_documento');
        $paciente->domicilio = $request->get('domicilio');

        $paciente->update();
        return redirect('/pacientes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $paciente = Paciente::findOrFail($id);

        $paciente->delete();

        return redirect('/pacientes');
    }
}
