<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PRODUCTO extends Model
{
    use HasFactory;

    protected $table= "PRODUCTOS";
    protected $fillable =['nombre','descripcion','cantidad','estado',];
}
