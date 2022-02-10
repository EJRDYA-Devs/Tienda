<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria_Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'categoria_id',
        'producto_id',
    ];

    public function productos()
    {
        return $this->hasMany(Productos::class);
    }

    public function categorias()
    {
        return $this->hasMany(Categorias::class);
    }
}
