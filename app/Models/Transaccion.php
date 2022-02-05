<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaccion extends Model
{
    use HasFactory;
    protected $fillable = [
        'cantidad',
        'producto_id',
        'comprador_id',
        'estado'
    ];

    public function producto()
    {
        return $this->hasOne('Productos');
    }
}
