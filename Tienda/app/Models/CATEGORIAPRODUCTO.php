<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CATEGORIAPRODUCTO extends Model
{
    protected $table= "CATEGORIA_PRODUCTO";
    protected $fillable =['id_categoria','id_producto'];
    use HasFactory;
}
