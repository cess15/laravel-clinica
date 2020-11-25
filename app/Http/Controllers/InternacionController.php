<?php

namespace App\Http\Controllers;

use App\Habitacion;
use App\Http\Requests\FormRequestInternacion;
use App\Internacion;
use App\Medico;
use App\Paciente;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class InternacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('internaciones.index');
    }

    public function selectorSearchPatient(Request $request){
        $pacientes=[];

        if($request->has('q')){
            $search=$request->q;
            $pacientes=Paciente::select('id', 'nombre','apellido')->where('nombre','LIKE',"%$search%")->where("esta_internado","=",0)->get();
        }
        return response()->json($pacientes);
    }

    public function selectorSearchMedic(Request $request){
        $medicos=[];

        if($request->has('q')){
            $search=$request->q;
            $medicos=Medico::select('id', 'nombre','apellido')->where('nombre','LIKE',"%$search%")->get();
        }
        return response()->json($medicos);
    }

    public function showDataRooms()
    {
        $habitaciones = Habitacion::where('estado_id','=',1)->get();
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
            ->make(true);
    }

    public function showDataInternments()
    {
        $internaciones = Internacion::all();
        return DataTables::of($internaciones)
            ->editColumn('paciente_id', function ($internacion) {
                return $internacion->pacientes->nombre.' '.$internacion->pacientes->apellido;
            })
            ->editColumn('medico_id', function ($internacion) {
                return $internacion->medicos->nombre.' '.$internacion->medicos->apellido;
            })
            ->editColumn('habitacion_id', function($internacion){
                return $internacion->habitaciones->pisos->descripcion;
            })
            ->addColumn('numero', function($internacion){
                return $internacion->habitaciones->numero;
            })
            ->editColumn('created_at', function ($internacion) {
                setLocale(LC_ALL, 'spanish_ecuador.utf-8');
                $myDate = $internacion->created_at;
                $myDate = str_replace("/", "-", $myDate);
                $newDate = date('d-m-Y H:i:s', strtotime($myDate));
                $monthYear = strftime('%A, %d de %B de %T %p', strtotime($newDate));
                return $monthYear;
            })
            ->editColumn('estado_id', function ($internacion) {
                return $internacion->estadoInternacion->descripcion;
            })
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('internaciones.create');
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormRequestInternacion $request)
    {
        $internacion = new Internacion();
        $internacion->paciente_id=intval(request('paciente_id'));
        $internacion->medico_id=intval(request('medico_id'));
        $internacion->motivo=request('motivo');
        $internacion->habitacion_id=intval(request('habitacion_id'));

        $internacion->estado_id=1;
        $internacion->save();
        
        $medico=Medico::findOrFail($internacion->medico_id);
        
        $paciente=Paciente::findOrFail($internacion->paciente_id);
        $paciente->medico_id=$medico->id;
        $paciente->esta_internado=1;
        $paciente->update();
        
        $habitacion=Habitacion::findOrFail($internacion->habitacion_id);
        $habitacion->hay_paciente=1;
        $habitacion->estado_id=2;
        $habitacion->update();
        

        return redirect('/internaciones');
    }
}
