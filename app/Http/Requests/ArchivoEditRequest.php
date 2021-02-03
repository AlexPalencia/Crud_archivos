<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArchivoEditRequest extends FormRequest
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
            "email" => "required",
            "nombre" => "alpha",
            "apellido" => "alpha",
            "codigo" => "required|numeric"
        ];
    }

    public function messages()
    {
        return [
            "email.required" => "El email es obligatorio",
            "nombre.alpha" => "El nombre debe contener solo letras sin espacios",
            "apellido.alpha" => "El apellido debe contener solo letras sin espacios",
            "codigo.required" => "El codigo es obligatorio",
            "codigo.numeric" => "El codigo debe ser numérico"
        ];
    }
}
