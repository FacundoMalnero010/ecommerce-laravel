<?php

namespace Modules\Usuario\app\Http\Requests;

use App\Validation\Api\ApiRequest;

class UsuarioFindRequest extends ApiRequest
{

    public function attributes(): array
    {
        return [
            'id' => 'ID del usuario'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'id'   => 'required|integer|exists:usuarios',
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
            'id.exists' => 'No se ha podido encontrar al usuario'
        ];
    }
}
