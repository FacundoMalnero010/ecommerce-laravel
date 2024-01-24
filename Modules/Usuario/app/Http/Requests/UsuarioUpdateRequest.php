<?php

namespace Modules\Usuario\app\Http\Requests;

use App\Validation\Api\ApiRequest;

class UsuarioUpdateRequest extends ApiRequest
{

    public function attributes(): array
    {
        return [
            'id'       => 'ID del usuario',
            'nombre'   => 'Nombre del usuario',
            'email'    => 'Email del usuario',
            'password' => 'Password del usuario'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'id'       => 'required|integer|exists:usuarios',
            'nombre'   => 'nullable|string|min:3|max:255|regex:/^[a-zA-ZáéíóúÁÉÍÓÚüÜ\s]+$/',
            'email'    => 'nullable|email|unique:usuarios,email|max:255|regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
            'password' => 'nullable|string|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/'
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Retorna mensajes personalizados para las validaciones elegidas
     */
    public function messages(): array
    {
        return [
            'id.exists'      => 'No se ha podido encontrar al usuario',
            'email.regex'    => 'El email ingresado no posee un formato correspondiente',
            'password.regex' => 'El password debe tener al menos 8 caracteres, una mayúscula, una minúscula y un número'
        ];
    }
}
