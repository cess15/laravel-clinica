<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormRequestInternacion extends FormRequest
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
            'paciente_id'=>'required',
            'medico_id'=>'required',
            'motivo'=>'required',
            'habitacion_id'=>'required',
        ];
    }
    public function attributes()
    {
        return [
            'paciente_id'=>'paciente',
            'medico_id'=>'médico',
            'motivo'=>'motivo',
            'habitacion_id'=>'habitación',
        ];
    }
    public function messages()
    {
        return[
            'paciente_id.required'=>'Por favor, seleccione un :attribute',
            'medico_id.required'=>'Por favor, seleccione un :attribute',
            'motivo.required'=>'Por favor, detalle el :attribute',
            'habitacion_id.required'=>'No se encontro ninguna :attribute seleccionada de la tabla',
        ];
    }
}
