<?php

namespace App\Http\Controllers;

use App\Habitacion;
use App\Http\Requests\FormRequestHabitacion;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class HabitacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('habitaciones.index');
    }

    public function showData()
    {
        $habitaciones = Habitacion::all();
        return DataTables::of($habitaciones)
            ->editColumn('piso_id', function ($habitacion) {
                return $habitacion->pisos->descripcion;
            })
            ->editColumn('tipo_id', function ($habitacion) {
                return $habitacion->tipoHabitacion->descripcion;
            })
            ->editColumn('genero_id', function ($habitacion) {
                return $habitacion->genero->descripcion;
            })
            ->editColumn('estado_id', function ($habitacion) {
                return $habitacion->estadoHabitacion->descripcion;
            })
            ->addColumn('btn', 'habitaciones.actions')
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
        return view('habitaciones.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormRequestHabitacion $request)
    {
        $habitacion = new Habitacion();
        $habitacion->piso_id = intval(request('piso_id'));
        $habitacion->estado_id = intval(request('estado_id'));
        $habitacion->tipo_id = intval(request('tipo_id'));
        $habitacion->genero_id = intval(request('genero_id'));
        $habitacion->numero = request('numero');

        $habitacion->save();
        return redirect('/habitaciones');
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
        $habitacion = Habitacion::findOrFail($id);
        return view('habitaciones.edit', compact('habitacion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FormRequestHabitacion $request, $id)
    {
        $habitacion = Habitacion::findOrFail($id);
        $habitacion->piso_id = $request->get('piso_id');
        $habitacion->estado_id = $request->get('estado_id');
        $habitacion->tipo_id = $request->get('tipo_id');
        $habitacion->genero_id = $request->get('genero_id');
        $habitacion->numero = $request->get('numero');

        $habitacion->update();
        return redirect('/habitaciones');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $habitacion = Habitacion::findOrFail($id);
        $habitacion->delete();
        return redirect('/habitaciones');
    }
}
