<?php

namespace Modules\Carrito\app\Http\Requests;

use App\Validation\Api\ApiRequest;

class CarritoUpdateRequest extends ApiRequest
{

    public function attributes(): array
    {
        return [
            'id'    => 'ID del usuario asociado al carrito',
            'monto' => 'Monto a pagar'
        ];
    }

    /**
     * Get the vaidation rules that apply to the request
     */
    public function rules(): array
    {
        return [
            'id'    => 'required|integer|exists:carritos',
            'monto' => 'required|float|min:0'
        ];
    }

    /**
     * Determine if the user is authorized to make this request
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
            'id.exists' => 'No se ha podido encontrar el carrito'
        ];
    }
}
