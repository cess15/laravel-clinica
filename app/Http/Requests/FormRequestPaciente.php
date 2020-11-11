<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormRequestPaciente extends FormRequest
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
            'nombre' => 'required',
            'apellido' => 'required',
            'documento_id' => 'required',
            'num_documento' => 'required|unique:medicos|unique:pacientes,num_documento,' . $this->route('paciente'), '|min:10',
            'domicilio' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'nombre' => 'nombre del paciente',
            'apellido' => 'apellido del paciente',
            'documento_id' => 'seleccione una opción',
            'num_documento' => 'número de documento',
            'domicilio' => 'el domicilio',
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El :attribute es obligatorio',
            'apellido.required' => 'El :attribute es obligatorio',
            'documento_id.required' => 'Por favor, :attribute',
            'num_documento.required' => 'El :attribute es obligatorio',
            'num_documento.unique' => 'El :attribute ya existe',
            'num_documento.min' => 'El :attribute debe tener 10 dígitos',
            'domicilio.required' => 'Por favor, específique :attribute',
        ];
    }
}
