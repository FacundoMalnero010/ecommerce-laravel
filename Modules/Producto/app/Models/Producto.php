<?php

namespace Modules\Producto\app\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Modules\Carrito\app\Models\Carrito;

class Producto extends Model
{
    use HasFactory;

    public $table      = 'productos';
    public $primaryKey = 'id';

    protected $fillable = [
        'id',
        'nombre',
        'descripcion',
        'categorias',
        'precio',
        'stock'
    ];

    /**
     * Returns all carts where the product is
     * @return BelongsToMany
     * @throws Exception
     */
    public function carts(): BelongsToMany
    {
        try {
            return $this->belongsToMany(
                Carrito::class,
                'carritos_x_productos',
                'carrito_id',
                'producto_id'
            );
        } catch (Exception $e) {
            throw new Exception('No se ha podido detectar en qué carritos se encuentra el producto', 409);
        }
    }
}
