<?php

namespace Modules\Carrito\app\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Modules\Producto\app\Models\Producto;
use Modules\Usuario\app\Models\Usuario;

class Carrito extends Model
{
    use HasFactory;

    public $table      = 'carritos';
    public $primaryKey = 'id';

    protected $fillable = [
        'id',
        'monto'
    ];

    /**
     * Returns the cart's user
     * @return BelongsTo
     * @throws Exception
     */
    public function user(): BelongsTo
    {
        try {
            return $this->belongsTo(
                Usuario::class,
                'id',
                'id'
            );
        } catch (Exception $e) {
            throw new Exception('No se ha podido obtener el usuario', 409);
        }
    }

    /**
     * Returns the products in the cart
     * @return BelongsToMany
     * @throws Exception
     */
    public function products(): BelongsToMany
    {
        try {
            return $this->belongsToMany(
                Producto::class,
                'carritos_x_productos',
                'producto_id',
                'carrito_id'
            );
        } catch (Exception $e) {
            throw new Exception('No se ha podido obtener los productos del carrito', 409);
        }
    }
}
