<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormRequestUser extends FormRequest
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
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $this->route('usuario'),
        ];
    }
    public function attributes()
    {
        return[
            'name'=>'el nombre del usuario',
            'email'=>'correo electrónico',
        ];
    }
    public function messages()
    {
        return[
            'name.required'=>'El :attribute es obligatorio',
            'email.required'=>'El :attribute es obligatorio',
            'email.unique'=>'El :attribute ya esta en uso',
        ];
    }
}
