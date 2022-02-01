<?php

namespace App\Models;

use App\Models\Categoria;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Producto extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'descripcion',
        'cantidad',
        'estado',
        'id_vendedor',
    ];
    public function categorias()
    {
        return $this->belongsToMany(Categoria::class, 'categoria_producto', 'id_producto', 'id_categoria')
            ->withTimestamps();
    }
}
