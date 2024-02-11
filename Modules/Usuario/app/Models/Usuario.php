<?php

namespace Modules\Usuario\app\Models;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Modules\Carrito\app\Models\Carrito;

class Usuario extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'id',
        'nombre',
        'email',
        'password'
    ];

    protected $hidden = [
        'password',
        'remember_token'
    ];

    /**
     * Creates a cart for the current user
     * @return bool
     * @throws Exception
     */
    public function createCart(): bool
    {
        try {
            $cart = new Carrito(['id' => $this->id,'monto' => 0]);
            return $cart->save();
        } catch (Exception $e) {
            throw new Exception('No se ha podido crear el carrito', 409);
        }
    }

    /**
     * Returns a user's cart
     * @return HasOne
     * @throws Exception
     */
    public function cart(): HasOne
    {
        try {
            return $this->hasOne(Carrito::class,'id','id');
        } catch (Exception $e) {
            throw new Exception('No se ha podido obtener el carrito del usuario', 409);
        }
    }

}
