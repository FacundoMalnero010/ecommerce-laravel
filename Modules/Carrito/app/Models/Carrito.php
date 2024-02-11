<?php

namespace Modules\Carrito\app\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    use HasFactory;

    public $table      = 'carritos';
    public $primaryKey = 'id';

    protected $fillable = [
        'id',
        'monto'
    ];
}
