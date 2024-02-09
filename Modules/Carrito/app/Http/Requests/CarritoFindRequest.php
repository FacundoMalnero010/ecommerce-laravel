<?php

namespace Modules\Carrito\app\Http\Requests;

use App\Validation\Api\ApiRequest;

class CarritoFindRequest extends ApiRequest
{

    public function attributes(): array
    {
        return [
            'id' => 'ID del usuario asociado al carrito'
        ];
    }

    /**
     * Get the validation rules that apply to the request
     */
    public function rules(): array
    {
        return [
            'id' => 'required|integer|exists:carritos'
        ];
    }

    /**
     * Determines if the user is authorized to make this request
     */
    public function authorize(): bool
    {
        return true;
    }


    /**
     * Retorna mensajes personalizados para las validacioens elegidas
     */
    public function messages(): array
    {
        return [
            'id.exists' => 'No se ha podido encontrar el carrito'
        ];
    }
}
