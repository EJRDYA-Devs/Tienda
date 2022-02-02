<?php

namespace App\Models;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categoria extends Model
{
    use HasFactory, SoftDeletes;
    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'categoria_producto', 'id_categoria', 'id_producto')
            ->withTimestamps();
    }
}
