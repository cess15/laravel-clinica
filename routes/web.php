<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::resource('usuarios', 'UserController')->middleware('auth');

Route::resource('medicos', 'MedicoController')->middleware('auth');

Route::resource('pacientes', 'PacienteController')->middleware('auth');

Route::resource('habitaciones', 'HabitacionController')->middleware('auth');

Route::get('user-data','UserController@showData')->name('data')->middleware('auth');

Route::get('medic-data','MedicoController@showData')->name('dataMedic')->middleware('auth');

Route::get('patient-data','PacienteController@showData')->name('dataPatient')->middleware('auth');

Route::get('room-data','HabitacionController@showData')->name('dataRoom')->middleware('auth');
