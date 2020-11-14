<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormRequestHabitacion extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'piso_id' => 'required',
            'estado_id' => 'required',
            'tipo_id' => 'required',
            'genero_id' => 'required',
            'numero' => 'required|unique:habitaciones,numero,' . $this->route('habitacione'),
        ];
    }
    public function attributes()
    {
        return [
            'piso_id' => 'piso',
            'estado_id' => 'estado',
            'tipo_id' => 'tipo',
            'genero_id' => 'genero',
            'numero' => 'número',
        ];
    }
    public function messages()
    {
        return [
            'piso_id.required' => 'Por favor, seleccione un :attribute',
            'estado_id.required' => 'Por favor, seleccione un :attribute',
            'tipo_id.required' => 'Por favor, seleccione un :attribute',
            'genero_id.required' => 'Por favor, seleccione un :attribute',
            'numero.required' => 'El :attribute de la habitación es obligatorio',
            'numero.unique' => 'El :attribute de la habitación ya existe',
        ];
    }
}
