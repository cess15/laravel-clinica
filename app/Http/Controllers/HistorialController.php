<?php

namespace App\Http\Controllers;

use App\Internacion;
use App\Paciente;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class HistorialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('historial.index');
    }

    public function selectorSearchPatient(Request $request)
    {
        $pacientes = [];

        if ($request->has('q')) {
            $search = $request->q;
            $pacientes = Paciente::select('id', 'nombre', 'apellido')->where('nombre', 'LIKE', "%$search%")->where("esta_internado", "=", 1)->get();
        }
        return response()->json($pacientes);
    }

    public function show(Request $request)
    {
        $paciente = Paciente::findOrFail(intval(request('paciente_id')));
        $internaciones = Internacion::where('paciente_id', '=', $paciente->id)->get();
        $monthYear=null;
        foreach ($internaciones as $internacion) {
            setLocale(LC_ALL, 'spanish_ecuador.utf-8');
            $myDate = $internacion->created_at;
            $myDate = str_replace("/", "-", $myDate);
            $newDate = date('d-m-Y H:i:s', strtotime($myDate));
            $monthYear = strftime('%A, %d de %B de %T %p', strtotime($newDate));
        }
        return view('historial.registros', compact('internaciones','paciente','monthYear'));
    }
}
