<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestUser;
use App\User;
use Yajra\Datatables\Datatables;

class UserController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('usuarios.index');
    }

    public function showData()
    {
        $users = User::all();
        return DataTables::of($users)
            ->editColumn('created_at', function ($user) {
                setLocale(LC_ALL, 'spanish_ecuador.utf-8');
                $myDate = $user->created_at;
                $myDate = str_replace("/", "-", $myDate);
                $newDate = date('d-m-Y H:i:s', strtotime($myDate));
                $monthYear = strftime('%A, %d de %B de %T %p', strtotime($newDate));
                return $monthYear;
            })
            ->editColumn('updated_at', function ($user) {
                setLocale(LC_ALL, 'spanish_ecuador.utf-8');
                $myDate = $user->updated_at;
                $myDate = str_replace("/", "-", $myDate);
                $newDate = date('d-m-Y H:i:s', strtotime($myDate));
                $monthYear = strftime('%A, %d de %B de %T %p', strtotime($newDate));
                return $monthYear;
            })
            ->make(true);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        return view('editar', ['user' => User::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FormRequestUser $request, $id)
    {
        $usuario = User::findOrFail($id);

        $usuario->name = $request->get('name');
        $usuario->email = $request->get('email');
        $usuario->update();
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = User::findOrFail($id);

        $usuario->delete();

        return redirect('/login');
    }
}
