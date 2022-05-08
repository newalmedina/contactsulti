<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'email' => ['required', 'email'],
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'phone' => ['required', 'string'],
            'gender' => ['required'],
            'password' => 'nullable|confirmed|min:6'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return array(
            'email.required' => 'El campo Email es obligatorio.',
            'email.email' => 'El campo Email tiene formato incorrecto.',
            'first_name.required' => 'El campo Nombre es obligatorio.',
            'last_name.required' => 'El campo Apellidos es obligatorio.',
            'phone.required' => 'El campo Teléfono es obligatorio.',
            'gender.required' => 'El campo Género es obligatorio.',
            'password.min' => 'El campo Contraseña debe tener al menos 6 caracteres.',
            'password.confirmed' => 'El campo Contraseña  y repetir contraseña no coinciden.',
        );
    }
}
