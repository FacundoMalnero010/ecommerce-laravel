<?php

namespace Modules\Usuario\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

}
