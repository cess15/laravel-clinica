<?php

namespace App\Http\Controllers;

use App\Medico;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class MedicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('medicos.index');
    }

    public function showData()
    {
        $medics = Medico::all();
        return DataTables::of($medics)
            ->editColumn('documento_id', function ($medic) {
                return $medic->tipoDocumento->descripcion;
            })
            ->addColumn('btn','medicos.actions')
            ->rawColumns(['btn'])
            ->make(true);
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
        $medico = new Medico();
        $medico->documento_id = intval(request('documento_id'));
        $medico->apellido = request('apellido');
        $medico->nombre = request('nombre');
        $medico->num_documento = request('num_documento');
        $medico->especialidad = request('especialidad');
        $medico->num_celular = request('num_celular');

        $allMedics = Medico::all();
        $isExist = null;
        $numDocument = null;
        foreach ($allMedics as $medic) {
            $numDocument = $medic->num_documento;
            $isExist = strcmp($numDocument, $medico->num_documento) === 0 ? true : false;
            break;
        }

        if ($isExist) {
            return view('medicos/create', compact('isExist', 'numDocument'));
        } else {
            $medico->save();
            return redirect('/medicos');
        }
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
        $medico = Medico::findOrFail($id);
        return view('medicos.edit', compact('medico'));
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
        $medico = Medico::findOrFail($id);
        $medico->documento_id = $request->get('documento_id');
        $medico->apellido = $request->get('apellido');
        $medico->nombre = $request->get('nombre');
        $medico->num_documento = $request->get('num_documento');
        $medico->especialidad = $request->get('especialidad');
        $medico->num_celular = $request->get('num_celular');
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
        $medico = Medico::findOrFail($id);

        $medico->delete();

        return redirect('/medicos');
    }
}