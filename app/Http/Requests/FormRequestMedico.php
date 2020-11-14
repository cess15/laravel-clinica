<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormRequestMedico extends FormRequest
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
            'num_documento' => 'required|unique:pacientes|unique:medicos,num_documento,' . $this->route('medico'), '|min:10',
            'especialidad' => 'required',
            'num_celular' => 'required|min:10|numeric'
        ];
    }

    public function attributes()
    {
        return [
            'nombre' => 'nombre del médico',
            'apellido' => 'apellido del médico',
            'documento_id' => 'seleccione una opción',
            'num_documento' => 'número de documento',
            'especialidad' => 'la especialidad',
            'num_celular' => 'número de celular',
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
            'num_documento.numeric' => 'El :attribute debe contener sólo números',
            'especialidad.required' => 'Por favor, específique :attribute',
            'num_celular.required' => 'El :attribute es obligatorio',
            'num_celular.min' => 'El :attribute debe tener 10 dígitos',
            'num_celular.numeric' => 'El :attribute debe contener sólo números',
        ];
    }
}
